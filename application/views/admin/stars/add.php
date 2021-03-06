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
                                            <div class="form-group"><label
                                                    for="company_id"><?= lang('company_company_id'); ?> <?= lang('common_required'); ?></label>
                                                <select name="company_id" id="company_id"
                                                        class="form-control">                                                    <?= $companies_option ?>                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="outlet_id"><?= lang('outlet_code'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" required name="outlet_id"
                                                       value="<?= isset($_POST['outlet_id']) ? $_POST['outlet_id'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="<?= lang('common_submit'); ?>"
                                           class="btn btn-default btn-lg"/></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
