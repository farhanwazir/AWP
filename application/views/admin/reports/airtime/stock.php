<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">                <?php /* */
                echo $error; ?>
                <div class="box">
                    <div class="box-body">                        <?php /* */
                        if ($user_data->user_type == 'a'): ?><?php /* */
                            $this->load->view('admin/reports/partials/company_report_filters.php'); ?><?php /* */ else: ?><?php /* */
                            $this->load->view('admin/reports/partials/filters.php'); ?><?php /* */
                        endif; ?>
                        <script>
                            function before_load_data(res){
                                console.log(res.summary);
                                $('#consumed-balance-status').html(res.summary.consumed_balance);
                                $('#available-balance-status').html(res.summary.total_available_balance);
                                return res;
                            }
                        </script>
                        <div class="row">
                            <div class="col-md-12">                                <!-- Content table -->
                                <table id="report-table" class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table" data-url="<?= base_url() ?><?= $table_data_ajax_path; ?>"
                                       data-pagination="true" data-side-pagination="server" data-data-field="data"
                                       data-show-columns="true" data-show-export="true" data-query-params="set_params"
                                       data-sort-order="desc" data-response-handler="before_load_data">
                                    <thead>
                                    <th data-field="company_code"><?= lang('common_user_type_company'); ?></th>
                                    <th data-field="old_stock"><?= lang('service_airtime_old_stock'); ?></th>
                                    <th data-field="new_stock"><?= lang('service_airtime_stock'); ?></th>
                                    <th data-field="amount"><?= lang('service_airtime_transaction_amount'); ?></th>
                                    <th data-field="user_name"><?= lang('common_report_col_user'); ?></th>
                                    <th data-field="created_at" data-sortable="true"
                                        data-order="desc"><?= lang('common_created_at'); ?></th>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="callout callout-info lead">
                                    <h4>Consumed balance</h4>
                                    <p id="consumed-balance-status">
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="callout callout-success lead">
                                    <h4>Available balance</h4>
                                    <p id="available-balance-status">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>