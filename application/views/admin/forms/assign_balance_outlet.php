<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row width-sixty">
            <div class="login-logo"><a href="#"><b>Assign-Balance to </b> Outlet</a></div>
            <div class="col-md-6">
                <form action="#" method="post" role="form">
                    <div class="form-group"><label for="company_id">Outlet Id (required)</label> <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="company_id"
                                                                                                        name="id"
                                                                                                        required="required">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"><label for="Bar_code">Bar Code (required)</label> <input type="text"
                                                                                                 class="form-control"
                                                                                                 name="Bar_code"
                                                                                                 required="required">
                </div>
            </div>
        </div>
        <div class="row width-sixty">
            <div class="col-md-6">
                <div class="form-group"><label for="addres">Amount (required)</label> <input type="text" name="amount"
                                                                                             required
                                                                                             class="form-control"></div>
            </div>
        </div>
        <input type="submit" value="login" class="btn btn-default btn-lg"/>
</div></form></div></section></div>
