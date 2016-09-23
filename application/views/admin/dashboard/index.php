<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">        <?php /* */
        echo $pagetitle; ?><?php /* */
        echo $breadcrumb; ?>    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"><span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>

                    <div class="info-box-content"><span class="info-box-text">Licencia</span> <span
                            class="info-box-number">Springlabs</span></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"><span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

                    <div class="info-box-content"><span class="info-box-text">Versión</span> <span
                            class="info-box-number">1.2.1</span></div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="callout callout-success lead">
                    <h4><?= lang('service_available_balance') ?></h4>

                    <p id="available-balance-status">
                        <?=$airtime_available_balance;?>
                    </p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="callout callout-info lead">
                    <h4><?= lang('service_consumed_balance') ?></h4>

                    <p id="available-balance-status">
                        <?=$airtime_consumed_balance;?>
                    </p>
                </div>
            </div>

            <!--<div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"><span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios</span>
                        <span class="info-box-number"><?php /*echo 0; */?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box"><span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Grupos de seguridad</span>
                        <span class="info-box-number"><?php /*echo 0; */?></span>
                    </div>
                </div>
            </div>-->
        </div>
    </section>
</div>
