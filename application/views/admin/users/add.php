<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">                <?php /* */
                echo $error; ?>                <?php /* */
                echo validation_errors(); ?>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url() . $form_url; ?>" method="post" role="form"
                                      id="registration-form">
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="name"><?= lang('common_name'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="name"
                                                       value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="email"><?= lang('common_email'); ?></label> <input type="text"
                                                                                                            class="form-control"
                                                                                                            name="email"
                                                                                                            value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="telephone"><?= lang('common_telephone'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="telephone"
                                                       value="<?= isset($_POST['telephone']) ? $_POST['telephone'] : ''; ?>">
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
                                                    for="password"><?= lang('common_password'); ?> <?= lang('common_required'); ?></label>
                                                <input type="password" class="form-control" name="password"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="password_confirmation"><?= lang('common_confirm_password'); ?></label>
                                                <input type="password" class="form-control"
                                                       name="password_confirmation"></div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="age"><?= lang('users_age'); ?></label>
                                                <input type="text" class="form-control" name="age"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="user_type"><?= lang('users_type') ?></label>

                                                <div>                                                    <?php /* */
                                                    if ($user_data->user_type == 'a'): ?><input type="radio"
                                                                                                class="form-control iCheckOff"
                                                                                                name="user_type"
                                                                                                value="<?= lang('users_type_code_admin') ?>"
                                                                                                data-label-text="<?= lang('users_type_admin') ?>"
                                                                                                data-size="normal" <?= (isset($_POST['user_type']) && $_POST['user_type'] == lang('users_type_code_admin')) ? 'checked' : ''; ?>> &nbsp;                                                    <?php endif; ?>
                        <input type="radio" class="form-control iCheckOff"
                                         name="user_type"
                                         value="<?= lang('users_type_code_company') ?>"
                                         data-label-text="<?= lang('users_type_company') ?>"
                                         data-size="normal"
                            <?= (isset($_POST['user_type']) && $_POST['user_type'] == lang('users_type_code_company')) ?
                                'checked' : ''; ?>>
                                                    &nbsp;
                                                    <!--<input type="radio" class="form-control iCheckOff"
                                                           name="user_type"
                                                           value="<?/*= lang('users_type_code_outlet') */?>"
                                                           data-label-text="<?/*= lang('users_type_outlet') */?>"
                                                           data-size="normal"
                                                        <?/*= (isset($_POST['user_type']) && $_POST['user_type'] == lang('users_type_code_outlet')) ? 'checked' : ''; */?>>
                                                    &nbsp; <?php /* */
                                                    if ($user_data->user_type == 'a'): ?>
                                                        <input type="radio" class="form-control iCheckOff"
                                                               name="user_type"
                                                               value="<?= lang('users_type_code_star') ?>"
                                                               data-label-text="<?= lang('users_type_star') ?>"
                                                               data-size="normal" <?= (isset($_POST['user_type']) && $_POST['user_type'] == lang('users_type_code_star')) ? 'checked' : ''; ?>>     -->                                               <?php /* */
                                                    endif; ?>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty" id="registration-extra-data">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="age"><?php /* */
                                                    if ($user_data->user_type == 'a'): ?><?= lang('users_company'); ?><?php /* */ else: ?><?= lang('users_outlet') ?><?php /* */
                                                    endif; ?></label> <select name="<?php /* */
                                                if ($user_data->user_type == 'dc'): ?>outlet_id<?php /* */ else: ?>company_id<?php /* */
                                                endif; ?>" id="company-id"
                                                                              class="form-control">                                                    <?= $companies_option ?>                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">                                            <?php /* */
                                            if ($user_data->user_type == 'a'): ?>
                                                <div class="form-group" id="registration-extra-outlet-data"
                                                     style="display: none;"><label
                                                        for="user_type"><?= lang('users_outlet') ?></label> <select
                                                        name="outlet_id" id="outlet-id" class="form-control"> </select>
                                                </div>                                            <?php /* */
                                            endif; ?>                                        </div>
                                    </div>
                                    <input type="submit" value="<?= lang('common_submit'); ?>"
                                           class="btn btn-default btn-lg"/></form>
                                <script>                                    user_type = '';
                                    $(document).ready(function () {
                                        $('#registration-extra-data').hide();
                                        $("[name='user_type']").bootstrapSwitch();
                                        $("[name='user_type']").on('switchChange.bootstrapSwitch', function (event, state) {
                                            console.log($(this).val());
                                            user_type = $(this).val();
                                            if (<?php /* */ if($user_data->user_type == 'a'): ?>$(this).val() == 'dc' || <?php /* */ endif; ?>$(this).val() == 'do') {
                                                $("#registration-extra-data").show();
                                                <?php /* */ if($user_data->user_type == 'a'): ?>
                                                $("#registration-extra-outlet-data").hide();
                                                <?php /* */ endif; ?>
                                            } else {
                                                $("#registration-extra-data").hide();
                                            }
                                        });
                                        <?php /* */ if($user_data->user_type == 'a'): ?>
                                        $("#company-id").on('change', function (e) {
                                            if (user_type == 'do') {
                                                $("#registration-extra-outlet-data").show();
                                                $('#outlet-id').html('<option>None</option>');
                                                getOutlets($('#company-id').val());
                                            } else {
                                                $("#registration-extra-outlet-data").hide();
                                            }
                                        });
                                        <?php /* */ endif; ?>
                                        $("#registration-form").submit(function (e) {
                                            e.preventDefault();
                                            <?php /* */ if($user_data->user_type == 'a'): ?>
                                            if (user_type == 'dc' && $('#company-id').val() == 'None') {
                                                alert("Select company.");
                                            } else <?php /* */ endif; ?>if (user_type == 'do' && $('#<?php /* */ if($user_data->user_type == 'a'): ?>outlet<?php /* */ else: ?>company<?php /* */ endif; ?>-id').val() == 'None') {
                                                alert("Select outlet.");
                                            } else {
                                                this.submit();
                                            }
                                        });
                                    });
                                    function getOutlets(company_id) {
                                        ajaxRequest("<?=base_url()?>form/control/company/outlets", {company_id: company_id}, {
                                            success: function (data) {
                                                $("#registration-extra-outlet-data").show();
                                                $('#outlet-id').html(data);
                                            }, error: function () {
                                                $("#registration-extra-outlet-data").hide();
                                                $('#outlet-id').html('<option>None</option>');
                                            }
                                        }, false);
                                    }                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>