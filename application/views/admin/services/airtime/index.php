<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?><?php echo $breadcrumb; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if ($error) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><?= lang('service_airtime_master_balance'); ?></span>
                                <span class="info-box-number">$<?= number_format($balance->balance, 2); ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?= lang('service_airtime_add_master_balance'); ?></h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="<?= base_url() . $form_url; ?>" method="post" role="form">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                <input type="text" class="form-control" name="amount">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-flat" type="submit">
                                                        <?= lang('common_submit'); ?>
                                                    </button>
                                                </span>
                                            </div>
                                            <input type="hidden" name="bar_code" value="900000"></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Content table -->
                                <table id="report-table" class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table" data-url="<?= base_url() ?><?= $table_data_ajax_path; ?>"
                                       data-pagination="true" data-side-pagination="server" data-data-field="data"
                                       data-show-columns="true" data-show-export="true" data-sort-order="desc">
                                    <thead>
                                    <th data-field="old_stock"><?= lang('service_airtime_old_stock'); ?></th>
                                    <th data-field="new_stock"><?= lang('service_airtime_stock'); ?></th>
                                    <th data-field="amount"><?= lang('service_airtime_transaction_amount'); ?></th>
                                    <th data-field="admin_name"><?= lang('common_report_col_user'); ?></th>
                                    <th data-field="created_at" data-sortable="true"
                                        data-order="desc"><?= lang('common_created_at'); ?></th>
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
