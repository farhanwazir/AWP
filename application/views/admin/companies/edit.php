<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php /* */
                echo $error; ?>
                <?php /* */
                echo validation_errors(); ?>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url() . $form_url; ?>" method="post" role="form">
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="name"><?= lang('common_name'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" required name="name"
                                                       value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="company_id"><?= lang('company_company_code'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" required name="company_id"
                                                       value="<?= isset($_POST['company_id']) ? $_POST['company_id'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="email"><?= lang('common_email'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" required name="email"
                                                       value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="address"><?= lang('common_address'); ?></label> <input
                                                    type="text" class="form-control" name="address"
                                                    value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="telephone"><?= lang('common_telephone'); ?></label> <input
                                                    type="text" class="form-control" name="telephone"
                                                    value="<?= isset($_POST['telephone']) ? $_POST['telephone'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="contact"><?= lang('common_contact'); ?></label> <input
                                                    type="text" class="form-control" name="contact"
                                                    value="<?= isset($_POST['contact']) ? $_POST['contact'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="rfc"><?= lang('company_rfc'); ?></label>
                                                <input type="text" class="form-control" name="rfc"
                                                       value="<?= isset($_POST['rfc']) ? $_POST['rfc'] : ''; ?>"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="rfc_type"><?= lang('company_rfc_type'); ?></label>

                                                <div><input type="radio" class="form-control iCheckOff" name="rfc_type"
                                                            value="<?= lang('company_rfc_type_moral_code') ?>"
                                                            data-label-text="<?= lang('company_rfc_type_moral') ?>"
                                                            data-size="normal" <?= (isset($_POST['rfc_type']) && $_POST['rfc_type'] == lang('company_rfc_type_moral_code')) ? 'checked' : ''; ?>>
                                                    &nbsp; <input type="radio" class="form-control iCheckOff"
                                                                  name="rfc_type"
                                                                  value="<?= lang('company_rfc_type_physical_code') ?>"
                                                                  data-label-text="<?= lang('company_rfc_type_physical') ?>"
                                                                  data-size="normal" <?= (isset($_POST['rfc_type']) && $_POST['rfc_type'] == lang('company_rfc_type_physical_code')) ? 'checked' : ''; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-12">
                                            <div class="form-group"><label
                                                    for="customer_type"><?= lang('company_customer_type'); ?></label>

                                                <div><input type="radio" class="form-control iCheckOff"
                                                            name="customer_type"
                                                            value="<?= lang('company_customer_type_wholesale_code') ?>"
                                                            data-label-text="<?= lang('company_customer_type_wholesale') ?>"
                                                            data-size="normal" <?= (isset($_POST['customer_type']) && $_POST['customer_type'] == lang('company_customer_type_wholesale_code')) ? 'checked' : ''; ?>>
                                                    &nbsp; <input type="radio" class="form-control iCheckOff"
                                                                  name="customer_type"
                                                                  value="<?= lang('company_customer_type_commission_code') ?>"
                                                                  data-label-text="<?= lang('company_customer_type_commission') ?>"
                                                                  data-size="normal" <?= (isset($_POST['customer_type']) && $_POST['customer_type'] == lang('company_customer_type_commission_code')) ? 'checked' : ''; ?>>
                                                    &nbsp; <input type="radio" class="form-control iCheckOff"
                                                                  name="customer_type"
                                                                  value="<?= lang('company_customer_type_direct_code') ?>"
                                                                  data-label-text="<?= lang('company_customer_type_direct') ?>"
                                                                  data-size="normal" <?= (isset($_POST['customer_type']) && $_POST['customer_type'] == lang('company_customer_type_direct_code')) ? 'checked' : ''; ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="old_company_id"
                                           value="<?= isset($_POST['company_id']) ? $_POST['company_id'] : ''; ?>">
                                    <input type="submit" value="<?= lang('common_update'); ?>"
                                           class="btn btn-default btn-lg"/></form>
                                <script>                                    $(document).ready(function () {
                                        $("[name='customer_type']").bootstrapSwitch({
                                            'onText': '<?=lang('common_switch_on_label') ?>',
                                            'offText': '<?=lang('common_switch_off_label') ?>'
                                        });
                                        $("[name='rfc_type']").bootstrapSwitch({
                                            'onText': '<?=lang('common_switch_on_label') ?>',
                                            'offText': '<?=lang('common_switch_off_label') ?>'
                                        });
                                    });                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
