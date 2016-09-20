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
                                                    for="title"><?= lang('common_title'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" required name="name"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="bar_code"><?= lang('common_barcode'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="bar_code"
                                                       required="required"></div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="parent_cat"><?= lang('service_category'); ?> <?= lang('common_required'); ?></label>
                                                <select name="category_bar_code" id="category"
                                                        class="form-control">                                                    <?= $categories_option; ?>                                                </select>
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
