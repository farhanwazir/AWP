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
                                    <th data-field="star_id"><?= lang('common_report_col_star'); ?></th>
                                    <th data-field="cicdn"><?= lang('chip_col_cicdn'); ?></th>
                                    <th data-field="product_type"><?= lang('chip_col_transaction_type'); ?></th>
                                    <th data-field="sale_amount"><?= lang('common_report_col_item_price'); ?></th>
                                    <th data-field="profit_fraction"><?= lang('common_report_col_profit_fraction'); ?></th>
                                    <th data-field="profit"><?= lang('common_report_col_profit'); ?></th>
                                    <th data-field="created_at"><?= lang('common_report_col_created_at'); ?></th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
