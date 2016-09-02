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
                                                <input type="text" class="form-control" required name="title"
                                                       value="<?= isset($_POST['title']) ? str_replace('-- ', '', $_POST['title']) : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="bar_code"><?= lang('common_barcode'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="bar_code" required
                                                       value="<?= isset($_POST['bar_code']) ? $_POST['bar_code'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="parent_cat"><?= lang('category_parent_category'); ?></label>
                                                <select name="parent"
                                                        class="form-control">                                                    <?= $categories_option; ?>                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="cost"><?= lang('common_price'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="cost" required="required"
                                                       value="<?= isset($_POST['cost']) ? $_POST['cost'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="prof-fraction"><?= lang('common_report_col_profit_fraction'); ?> <?= lang('common_required'); ?></label>
                                                <input type="text" class="form-control" name="prof_fraction"
                                                       required="required"
                                                       value="<?= isset($_POST['prof_fraction']) ? $_POST['prof_fraction'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label
                                                    for="type"><?= lang('common_type'); ?></label> <select name="type"
                                                                                                           id=""
                                                                                                           class="form-control">
                                                    <optgroup label="Services"></optgroup>
                                                    <option value="service">Service</option>
                                                    <option value="airtime">-- Airtime</option>
                                                    <option value="portability">-- Portability</option>
                                                    <optgroup label="Products"></optgroup>
                                                    <option value="product">Products</option>
                                                    <option value="chip">-- Chip</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="row width-sixty">
                                        <div class="col-md-12">
                                            <div class="form-group"><label
                                                    for="description"><?= lang('common_description'); ?></label>
                                                <textarea class="form-control" rows="5"
                                                          name="description">                                                        <?= isset($_POST['description']) ? $_POST['description'] : ''; ?>                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-default btn-lg"/></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
