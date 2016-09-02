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
                            <div class="col-md-12">                                <?php /* */
                                $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : ''; ?>
                                <form action="<?= base_url() . $form_url; ?>" method="post" role="form"
                                      id="registration-form">
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
                                    </div> <?php /* */
                                    if ($user_type == lang('users_type_code_star')) : ?>
                                        <input type="hidden" name="telephone"
                                               value="<?= $_POST['telephone']; ?>">                                        <?php /* */
                                    endif; ?>                                    <?php /* */
                                    if ($user_type != lang('users_type_code_star')) : ?>
                                        <input type="hidden" name="email"
                                               value="<?= $_POST['email']; ?>">                                        <?php /* */
                                    endif; ?> <input type="hidden" name="user_type" value="<?= $user_type; ?>"> <input
                                        type="submit" value="<?= lang('common_submit'); ?>"
                                        class="btn btn-default btn-lg"/></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
