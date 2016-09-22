<?php

defined('BASEPATH') OR exit('No direct script access allowed');



?>



<div class="content-wrapper">

    <section class="content-header">

        <?php echo $pagetitle; ?>

        <?php echo $breadcrumb; ?>

    </section>



    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <?php if($error) echo '<div class="alert alert-danger">'. $error .'</div>';?>



                <div class="box">

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-12">

                                <!-- Content table -->
                                <table id="report-table"
                                       class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table"
                                       data-url="<?=base_url()?><?=$table_data_ajax_path; ?>"
                                       data-pagination="true"
                                       data-side-pagination="server"
                                       data-data-field="data"
                                       data-show-columns="true"
                                       data-show-export="true"
                                       data-sort-order="desc"
                                       data-search="true"
                                       data-search-on-enter-key="true"
                                       data-query-params="add_custom_search_params">
                                    <!--data-toolbar="#custom-filters-report-table"-->

                                    <thead>

                                    <th data-field="cicdn"><?=lang('product_cicdn');?></th>

                                    <th data-field="category"><?=lang('common_type');?></th>

                                    <th data-field="bar_code"><?=lang('common_barcode');?></th>

                                    <th data-field="created_at"><?=lang('common_created_at');?></th>

                                    <th data-field="sold" data-formatter="is_sold"><?=lang('product_sold');?></th>

                                    <th data-field="actions_col" data-formatter="add_actions" data-events="add_actions_events"></th>

                                    </thead>

                                </table>



                                <script>
                                    custom_search_toolbar_injected = false;
                                    $(document).ready(function () {
                                        $('.bs-tbl').on('post-header.bs.table', function (data) {
                                            if (!custom_search_toolbar_injected) {
                                                search_container = $('.bootstrap-table .search').html();
                                                $('.bootstrap-table .search').addClass('input-group');
                                                custom_search_toolbar = '<span class="input-group-addon"><?=lang('product_sold');?> ' +
                                                    '<label><input type="radio" name="filters[sold]" value="1"> <?=lang('product_chips_sold_yes');?></label> &nbsp;' +
                                                    '<label><input type="radio" name="filters[sold]" value="0"> <?=lang('product_chips_sold_no');?></label> &nbsp;' +
                                                    '<label><input type="radio" name="filters[sold]" value="" checked> <?=lang('common_all');?></label> ' +
                                                    '</span>';
                                                $('.bootstrap-table .search').prepend(custom_search_toolbar);
                                                $('.bootstrap-table .search').css('max-width', '450px');
                                                custom_search_toolbar_injected = true;

                                                $('[name="filters[sold]"]').click(function () {
                                                    $('#report-table').bootstrapTable('refresh', {silent: true});
                                                });
                                            }
                                        });
                                    });

                                    function add_custom_search_params(params) {
                                        if ($('[name="filters[sold]"]:checked').length > 0 && $('[name="filters[sold]"]:checked').val() != "") {
                                            params.sold = $('[name="filters[sold]"]:checked').val();
                                        }
                                        return params;
                                    }

                                    function is_sold(value, row, index){

                                        var sold = '<?=lang('product_chips_sold_no');?>';

                                        if (value == 1 || value == '1') sold = '<?=lang('product_chips_sold_yes');?>';

                                        return sold;

                                    }

                                    function add_actions(value, row, index){

                                        return [

                                            '<a class="btn btn-warning btn-xs edit" href="javascript:void(0)" title="Edit">',

                                            '<i class="glyphicon glyphicon-pencil"></i>',

                                            '</a>  '/*,

                                            '<a class="btn btn-danger btn-xs delete" href="javascript:void(0)" title="Delete">',

                                            '<i class="glyphicon glyphicon-remove"></i>',

                                            '</a>'*/

                                        ].join('');

                                    }



                                    window.add_actions_events = {

                                        'click .edit': function (e, value, row, index) {

                                            /*//alert('You click like action, row: ' + JSON.stringify(row));*/

                                            post('<?=base_url().$edit_url;?>', row, 'post');

                                        },

                                        'click .delete': function (e, value, row, index) {

                                            $('#report-table').bootstrapTable('remove', {

                                                field: 'id',

                                                values: [row.id]

                                            });

                                        }

                                    };

                                </script>



                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </section>

</div>

