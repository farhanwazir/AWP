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

                                <table id="report-table" class="table table-bordered table-responsive bs-tbl" data-toggle="table"

                                       data-url="<?=base_url()?><?=$table_data_ajax_path; ?>"

                                       data-pagination="true"

                                       data-side-pagination="server"

                                       data-data-field="data"

                                       data-show-columns="true"

                                       data-show-export="true"
                                       data-sort-order="desc">

                                    <thead>

                                    <th data-field="company_id"><?=lang('company_code');?></th>

                                    <!--<th data-field="customer_type"><?/*=lang('company_customer_type');*/?></th>-->

                                    <th data-field="name"><?=lang('common_name');?></th>

                                    <th data-field="email"><?=lang('common_email');?></th>

                                    <th data-field="telephone"><?=lang('common_telephone');?></th>

                                    <th data-field="contact"><?=lang('common_contact');?></th>

                                    <th data-field="address"><?=lang('common_address');?></th>

                                    <th data-field="created_at"
                                        data-sortable="true"
                                        data-order="desc"><?= lang('common_created_at'); ?></th>

                                    <th data-field="actions_col" data-formatter="add_actions" data-events="add_actions_events"></th>

                                    </thead>

                                </table>



                                <script>

                                    function add_actions(value, row, index){

                                        return [

                                            '<a class="btn btn-warning btn-xs edit" href="javascript:void(0)" title="Edit">',

                                            '<i class="glyphicon glyphicon-pencil"></i>',

                                            '</a>  ',

                                            '<a class="btn btn-danger btn-xs delete" href="javascript:void(0)" title="Deactivate">',

                                            '<i class="glyphicon glyphicon-remove"></i>',

                                            '</a>'
                                        ].join('');

                                    }



                                    window.add_actions_events = {

                                        'click .edit': function (e, value, row, index) {

                                            /*//alert('You click like action, row: ' + JSON.stringify(row));*/

                                            post('<?=base_url().$edit_url;?>', row, 'post');

                                        },

                                        'click .delete': function (e, value, row, index) {

                                            post('<?=base_url().$delete_url;?>', {"company_id": row.company_id}, 'post');

                                        }

                                    };

                                </script>



                            </div>

                        </div>

                    </div>

                </div>



                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Deactivated Companies</h3>

                    </div>

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-12">

                                <!-- Content table -->

                                <table id="report-table" class="table table-bordered table-responsive bs-tbl" data-toggle="table"

                                       data-url="<?=base_url()?><?=$table_trashed_data_ajax_path; ?>"

                                       data-pagination="true"

                                       data-side-pagination="server"

                                       data-data-field="data"

                                       data-show-columns="true"

                                       data-show-export="true"
                                       data-sort-order="desc">

                                    <thead>

                                    <th data-field="company_id"><?=lang('company_code');?></th>

                                    <!--<th data-field="customer_type"><?/*=lang('company_customer_type');*/?></th>-->

                                    <th data-field="name"><?=lang('common_name');?></th>

                                    <th data-field="email"><?=lang('common_email');?></th>

                                    <th data-field="telephone"><?=lang('common_telephone');?></th>

                                    <th data-field="contact"><?=lang('common_contact');?></th>

                                    <th data-field="address"><?=lang('common_address');?></th>

                                    <th data-field="created_at"
                                        data-sortable="true"
                                        data-order="desc"><?= lang('common_created_at'); ?></th>

                                    <th data-field="actions_col" data-formatter="add_actions_restore" data-events="add_actions_restore_events"></th>

                                    </thead>

                                </table>



                                <script>

                                    function add_actions_restore(value, row, index){

                                        return [

                                            '<a class="btn btn-warning btn-xs edit" href="javascript:void(0)" title="Edit">',

                                            '<i class="glyphicon glyphicon-pencil"></i>',

                                            '</a>  ',

                                            '<a class="btn btn-info btn-xs restore" href="javascript:void(0)" title="Reactivate">',

                                            '<i class="glyphicon glyphicon-refresh"></i>',

                                            '</a>'

                                        ].join('');

                                    }



                                    window.add_actions_restore_events = {

                                        'click .edit': function (e, value, row, index) {

                                            /*//alert('You click like action, row: ' + JSON.stringify(row));*/

                                            post('<?=base_url().$edit_url;?>', row, 'post');

                                        },

                                        'click .restore': function (e, value, row, index) {

                                            post('<?=base_url().$restore_url;?>', {"company_id": row.company_id}, 'post');

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

