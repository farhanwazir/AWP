<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">                <?php /* */
                if ($error) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">                                <!-- Content table -->
                                <table id="report-table" class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table" data-url="<?= base_url() . $table_data_ajax_path; ?>"
                                       data-pagination="true" data-side-pagination="server" data-data-field="data"
                                       data-show-columns="true" data-show-export="true" data-sort-order="desc">
                                    <thead>
                                    <th data-field="email"><?= lang('common_email'); ?></th>
                                    <th data-field="name" data-sortable="true"><?= lang('common_name'); ?></th>
                                    <th data-field="telephone"><?= lang('common_telephone'); ?></th>
                                    <th data-field="age"><?= lang('users_age'); ?></th>
                                    <th data-field="address"><?= lang('common_address'); ?></th>
                                    <th data-field="created_at"
                                        data-sortable="true"><?= lang('common_created_at'); ?></th>
                                    <th data-field="actions_col" data-formatter="add_actions"
                                        data-events="add_actions_events"></th>
                                    </thead>
                                </table>
                                <script>                                    function add_actions(value, row, index) {
                                        return ['<a class="btn btn-warning btn-xs edit" href="javascript:void(0)" title="Edit">', '<i class="glyphicon glyphicon-pencil"></i>', '</a>  '/*,                                             '<a class="btn btn-danger btn-xs delete" href="javascript:void(0)" title="Delete">',                                             '<i class="glyphicon glyphicon-remove"></i>',                                             '</a>'*/].join('');
                                    }
                                    window.add_actions_events = {
                                        'click .edit': function (e, value, row, index) {                                            /*//alert('You click like action, row: ' + JSON.stringify(row));*/
                                            post('<?=base_url().$edit_url;?>', row, 'post');
                                        }, 'click .delete': function (e, value, row, index) {
                                            $('#report-table').bootstrapTable('remove', {
                                                field: 'id',
                                                values: [row.id]
                                            });
                                        }
                                    };                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
