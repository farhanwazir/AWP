<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if ($error) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4"><h4><?= lang('common_report_filter'); ?></h4>
                                <form method="get" id="report-filter-form">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="input-group"><select name="filters[outlet_id]" class="form-control">                                                        <?= $outlets_option ?>                                                    </select>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <script>
                                    outlet_id = 0;
                                    function set_params(params) {
                                        params.<?php if($user_data->user_type == 'a'): ?>company_id<?php else: ?>outlet_id<?php endif; ?> = outlet_id;
                                        return params;
                                    };
                                    function refresh_table() {
                                        data_url = "<?=base_url()?><?=$table_data_ajax_path; ?>";
                                        $('#report-table').bootstrapTable('refresh', {
                                            query: {<?php if($user_data->user_type == 'a'): ?>company_id<?php else: ?>outlet_id<?php endif; ?>: outlet_id},
                                            url: data_url
                                        });
                                    };

                                    $(document).ready(function () {
                                    /*if form will submit*/
                                        $('#report-filter-form').on('submit', function (e) {
                                            e.preventDefault();
                                            refresh_table();
                                        });
                                        $('[name="filters[outlet_id]"]').on('change', function (e) {
                                            outlet_id = $('[name="filters[outlet_id]"]').val();
                                            refresh_table();
                                        });
                                        outlet_id = $('[name="filters[outlet_id]"]').val();
                                        refresh_table();
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Content table -->
                                <table id="report-table"
                                       class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table"
                                       data-query-params="set_params"
                                       data-pagination="true"
                                       data-side-pagination="server"
                                       data-data-field="data"
                                       data-show-columns="true"
                                       data-show-export="true"
                                       data-sort-order="desc">
                                    <thead>
                                    <th data-field="email"><?= lang('common_email'); ?></th>
                                    <th data-field="name" data-sortable="true"><?= lang('common_name'); ?></th>
                                    <th data-field="telephone"><?= lang('common_telephone'); ?></th>
                                    <th data-field="age"><?= lang('users_age'); ?></th>
                                    <th data-field="address"><?= lang('common_address'); ?></th>
                                    <th data-field="user_type_definition" data-sortable="true"><?= lang('common_type'); ?></th>
                                    <?php if ($user_data->user_type == 'dc'): ?>
                                        <th data-field="company" data-sortable="true"><?= lang('users_company'); ?></th>
                                        <th data-field="outlet" data-sortable="true"><?= lang('users_outlet'); ?></th>
                                    <?php endif; ?>
                                    <th data-field="created_at" data-sortable="true" data-order="desc"><?= lang('common_created_at'); ?></th>
                                    <th data-field="actions_col" data-formatter="add_actions" data-events="add_actions_events"></th>
                                    </thead>
                                </table>

                                <script>
                                    function add_actions(value, row, index) {
                                        return ['<a class="btn btn-warning btn-xs edit" href="javascript:void(0)" title="Edit">', '<i class="glyphicon glyphicon-pencil"></i>', '</a>  '/*,                                             '<a class="btn btn-danger btn-xs delete" href="javascript:void(0)" title="Delete">',                                             '<i class="glyphicon glyphicon-remove"></i>',                                             '</a>'*/].join('');
                                    }

                                    window.add_actions_events = {
                                        'click .edit': function (e, value, row, index) {
                                            post('<?=base_url().$edit_url;?>', row, 'post');
                                        }, 'click .delete': function (e, value, row, index) {
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
