<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <form action="<?= base_url() . $form_url; ?>" method="post" role="form" id="user-edit-form">
        <div class="row">
            <div class="col-md-12">                <?php /* */
                echo $error; ?>                <?php /* */
                echo validation_errors(); ?>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">                                <?php /* */
                                $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : ''; ?>

                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="name"><?= lang('common_name'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="name"
                                                       value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                                            </div>
                                        </div> <?php /* */
                                        if ($user_type == 'r') { ?>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="email"><?= lang('common_email'); ?></label> <input
                                                        type="text" class="form-control" name="email"
                                                        value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                                                </div>
                                            </div>                                        <?php /* */
                                        } else { ?>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="telephone"><?= lang('common_telephone'); ?></label> <input
                                                        type="text" class="form-control" name="telephone"
                                                        value="<?= isset($_POST['telephone']) ? $_POST['telephone'] : ''; ?>">
                                                </div>
                                            </div>                                        <?php /* */
                                        } ?>                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="age"><?= lang('users_age'); ?></label>
                                                <input type="text" class="form-control" name="age"
                                                       value="<?= isset($_POST['age']) ? $_POST['age'] : ''; ?>"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="address"><?= lang('common_address'); ?></label> <input
                                                    type="text" class="form-control" name="address"
                                                    value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                                            </div>
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
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= lang('users_change_password'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="row width-sixty">
                                <div class="col-md-4">
                                    <div class="form-group"><label
                                            for="admin_password"><?= lang('users_admin_password'); ?></label>
                                        <input type="password" class="form-control" name="admin_password"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label
                                            for="password"><?= lang('users_change_password'); ?></label> <input
                                            type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label
                                            for="password_confirmation"><?= lang('common_confirm_password'); ?></label>
                                        <input
                                            type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <script
                                    src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
                                <script>
                                    $(document).ready(function () {
                                        $(':password').not('[name="admin_password"]').not('[name="password_confirmation"]').pwstrength({
                                            ui: {
                                                showVerdictsInsideProgressBar: true,
                                                progressBarExtraCssClasses: 'pwstrength-progressbar'
                                            },
                                            common: {
                                                minChar: 4
                                            }
                                        });

                                        $('[name="password"]').keyup(function (e) {
                                            if ($(this).length > 0 &&
                                                $('[name="password_confirmation"]').val() != $(this).val()) {
                                                $('[name="admin_password"]').attr('required', 'required');
                                                $('[type="submit"]').prop('disabled', true);
                                            } else {
                                                $('[name="admin_password"]').removeAttr('required');
                                                $('[type="submit"]').prop('disabled', false);
                                            }
                                        });

                                        $('[name="password_confirmation"]').keyup(function (e) {
                                            if ($('[name="password"]').length > 0 && $('[name="password"]').val() != $(this).val()) {
                                                $('[type="submit"]').prop('disabled', true);
                                            } else {
                                                $('[name="admin_password"]').removeAttr('required');
                                                $('[type="submit"]').prop('disabled', false);
                                            }
                                        });

                                        $('#user-edit-form').submit(function (e) {
                                            e.preventDefault();
                                            if ($('[name="password"]').val().length > 0) {
                                                if ($('[name="admin_password"]').val() != '') {
                                                    this.submit();
                                                }
                                                /*else {
                                                 alert('Admin password missing');
                                                 }*/
                                            } else {
                                                this.submit();
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php /* */
                    if ($user_type == lang('users_type_code_star')) : ?>
                        <input type="hidden" name="telephone"
                               value="<?= $_POST['telephone']; ?>">                                        <?php /* */
                    endif; ?>                                    <?php /* */
                    if ($user_type != lang('users_type_code_star')) : ?>
                        <input type="hidden" name="email"
                               value="<?= $_POST['email']; ?>">                                        <?php /* */
                    endif; ?> <input type="hidden" name="user_type" value="<?= $user_type; ?>"> <input
                        type="submit" value="<?= lang('common_update'); ?>"
                        class="btn btn-default btn-lg"/>
                </div>
            </div>
        </form>
    </section>
</div>
