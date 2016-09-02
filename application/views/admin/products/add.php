<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo $error; ?>
                <?php echo validation_errors(); ?>
                <?php if ($message) echo '<div class="alert alert-info">' . $message . '</div>'; ?>


                <!--<div class="box">

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-12">



                                <form action="<? /*=base_url().$form_url;*/ ?>" method="post" role="form">

                                    <div class="row width-sixty">

                                        <div class="col-md-6">



                                            <div class="form-group">

                                                <label for="title"><? /*=lang('common_title');*/ ?></label>

                                                <input type="text" class="form-control" name="name" >

                                            </div></div>



                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="bar_code"><? /*=lang('product_cicdn');*/ ?> <? /*=lang('common_required');*/ ?></label>

                                                <input type="text" class="form-control"  name="cicdn" required="required">

                                            </div>

                                        </div>

                                    </div>





                                    <div class="row width-sixty">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="parent_cat"><? /*=lang('product_category');*/ ?> <? /*=lang('common_required');*/ ?></label>

                                                <select name="bar_code" id="category" class="form-control">

                                                <? /*=$categories_option;*/ ?>

                                                </select>

                                            </div>

                                        </div>

                                    </div>



                                    <input type="submit" value="submit" class="btn btn-default btn-lg"/>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>-->


                <!-- Upload form -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= lang('product_add_bulk'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url() . $form_products_upload_url; ?>" method="post" role="form"
                                      enctype="multipart/form-data">
                                    <div class="row width-sixty">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title"><?= lang('product_file_upload'); ?></label>
                                                <input type="file" id="products_file" name="products_file"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="submit" class="btn btn-default btn-lg"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
