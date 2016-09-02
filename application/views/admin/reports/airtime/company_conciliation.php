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
                        <div class="row">
                            <div class="col-md-12">                                <!-- Content table -->
                                <table id="report-table" class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table" data-url="<?= base_url() ?><?= $table_data_ajax_path; ?>"
                                       data-pagination="true" data-side-pagination="server" data-data-field="data"
                                       data-show-columns="true" data-show-export="true" data-query-params="set_params"
                                       data-sort-order="desc">
                                    <thead>
                                    <th data-field="transaction_id"><?= lang('common_report_col_transaction_id'); ?></th>
                                    <th data-field="company_code"><?= lang('common_user_type_company'); ?></th>
                                    <th data-field="outlet_code"><?= lang('common_user_type_outlet'); ?></th>
                                    <th data-field="response_code"><?= lang('common_report_col_response'); ?></th>
                                    <th data-field="star_id"><?= lang('common_user_type_star'); ?></th>
                                    <th data-field="operator"><?= lang('common_report_col_operator'); ?></th>
                                    <th data-field="sale_amount"><?= lang('common_report_col_sale_amount'); ?></th>
                                    <th data-field="profit"><?=lang('common_report_col_profit'); ?></th>
                                    <th data-field="created_at"><?= lang('common_report_col_created_at'); ?></th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>