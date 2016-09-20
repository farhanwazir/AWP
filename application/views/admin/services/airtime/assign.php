<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">                <?php /* */
                if ($error) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box"><!-- Apply any bg-* class to to the icon to color it --> <span
                                class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

                            <div class="info-box-content"><span
                                    class="info-box-text"><?= lang('service_airtime_master_balance'); ?></span> <span
                                    class="info-box-number">$<?= number_format($balance->balance, 2); ?></span></div>
                            <!-- /.info-box-content -->                        </div>
                        <!-- /.info-box -->                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <!-- Apply any bg-* class to to the icon to color it -->
                            <span class="info-box-icon bg-blue-active"><i class="fa fa-money"></i></span>

                            <div class="info-box-content"><span class="info-box-text"><?php /* */
                                    if ($user_data->user_type != 'a'): ?><?= lang('service_airtime_outlet_master_balance'); ?><?php /* */ else: ?><?= lang('service_airtime_company_master_balance'); ?><?php /* */
                                    endif; ?></span> <span class="info-box-number"
                                                           id="company-current-balance"><?php /* */
                                    if ($user_data->user_type != 'a'): ?><?= lang('service_outlet_not_selected'); ?><?php /* */ else: ?><?= lang('service_company_not_selected'); ?><?php /* */
                                    endif; ?></span></div>
                            <!-- /.info-box-content -->                        </div>
                        <!-- /.info-box -->                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border"><h3 class="box-title"><?php /* */
                                    if ($user_data->user_type != 'a'): ?><?= lang('service_airtime_assign_outlet_form'); ?><?php /* */ else: ?><?= lang('service_airtime_assign_form'); ?><?php /* */
                                    endif; ?></h3></div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="get" id="report-filter-form">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group"><select name="filters[company_id]"
                                                                                    class="form-control">                                                            <?= $companies_option ?>                                                        </select>
                                                        <!--<span class="input-group-btn"><button class="btn btn-info"><i class="glyphicon glyphicon-arrow-right"></i></button></span>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script>                                            company_id = 0;
                                            barcode = '<?=$airtime_barcode;?>';
                                            function set_params(params) {
                                                params.<?php /* */ if($user_data->user_type != 'a'): ?>outlet_id<?php /* */ else: ?>company_id<?php /* */ endif; ?> = company_id;
                                                params.bar_code = barcode;
                                                return params;
                                            }
                                            function refresh_table() {
                                                data_url = "<?=base_url()?><?=$table_data_ajax_path; ?>";
                                                if ($('[name="filters[company_id]"]').val() == 'None') {
                                                    $('#report-table').bootstrapTable('removeAll');
                                                    $('#company-current-balance').html('<?php /* */ if($user_data->user_type != 'a'): ?><?=lang('service_outlet_not_selected');?><?php /* */ else: ?><?=lang('service_company_not_selected');?><?php /* */ endif; ?>');
                                                } else {
                                                    $('#report-table').bootstrapTable('refresh', {
                                                        query: {
                                                            <?php /* */ if($user_data->user_type != 'a'): ?>outlet_id<?php /* */ else: ?>company_id<?php /* */ endif; ?>: company_id,
                                                            bar_code: barcode
                                                        }, url: data_url
                                                    });
                                                    getCurrentCompanyBalance();
                                                }
                                            }
                                            function getCurrentCompanyBalance() {
                                                $('#company-current-balance').html('Loading...');
                                                ajaxRequest("<?=base_url().$current_balance_url?>", {
                                                    <?php /* */ if($user_data->user_type != 'a'): ?>outlet_id<?php /* */ else: ?>company_id<?php /* */ endif; ?>: company_id,
                                                    bar_code: barcode
                                                }, {
                                                    success: function (data) {
                                                        $('#company-current-balance').html('$' + data);
                                                    }, error: function () {
                                                        $('#company-current-balance').html('Error loading balance');
                                                        if (company_id == 'None')                                                                $('#company-current-balance').html('<?php /* */ if($user_data->user_type != 'a'): ?><?=lang('service_outlet_not_selected');?><?php /* */ else: ?><?=lang('service_company_not_selected');?><?php /* */ endif; ?>');
                                                    }
                                                }, false);
                                            }
                                            $(document).ready(function () {
                                                company_id = $('[name="filters[company_id]"]').val();
                                                /*if form will submit*/
                                                $('#report-filter-form').on('submit', function (e) {
                                                    e.preventDefault();
                                                    refresh_table();
                                                });
                                                $('[name="filters[company_id]"]').on('change', function (e) {
                                                    company_id = $('[name="filters[company_id]"]').val();
                                                    $('#company-id').val(company_id);
                                                    refresh_table();
                                                });
                                            });                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <?php /* */
                                    if ($user_data->user_type != 'a'): ?>
                                        <?= lang('service_airtime_add_outlet_master_balance'); ?>
                                    <?php /* */ else: ?><?= lang('service_airtime_add_company_master_balance'); ?>
                                    <?php /* */
                                    endif; ?>
                                </h3></div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="<?= base_url() . $form_url; ?>" method="post" role="form">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                <input type="text" class="form-control" name="amount"> <span
                                                    class="input-group-btn">                                                  <button
                                                        class="btn btn-info btn-flat"
                                                        type="submit"><?= lang('common_submit'); ?></button>                                                </span>
                                            </div>
                                            <input type="hidden" name="<?php /* */
                                            if ($user_data->user_type != 'a'): ?>outlet_id<?php /* */ else: ?>company_id<?php /* */
                                            endif; ?>" id="company-id"> <input type="hidden" name="bar_code"
                                                                               value="<?= $airtime_barcode; ?>"></form>
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
                            <div class="col-md-12">                                <!-- Content table -->
                                <table id="report-table" class="table table-bordered table-responsive bs-tbl"
                                       data-toggle="table"
                                       data-pagination="true"
                                       data-side-pagination="server"
                                       data-data-field="data"
                                       data-show-columns="true"
                                       data-show-export="true"
                                       data-sort-order="desc"
                                       data-silent-sort="true">
                                    <thead>
                                    <th data-field="old_stock"><?= lang('service_airtime_old_stock'); ?></th>
                                    <th data-field="new_stock"><?= lang('service_airtime_stock'); ?></th>
                                    <th data-field="amount"><?= lang('service_airtime_transaction_amount'); ?></th>
                                    <th data-field="user_name"><?= lang('common_report_col_user'); ?></th>
                                    <th data-field="created_at"
                                        data-sortable="true"
                                        data-order="desc"><?= lang('common_created_at_transfer'); ?></th>
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
