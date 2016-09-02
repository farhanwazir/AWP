<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content">
        <form action="#" method="post" role="form">
            <div class="row width-sixty">
                <div class="col-md-6">
                    <div class="form-group"><label for="company_id">Company Id (required)</label> <input type="text"
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
                    <div class="form-group"><label for="addres">Amount (required)</label> <input type="text"
                                                                                                 name="amount" required
                                                                                                 class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" value="login" class="btn btn-default btn-lg"/></form>
    </section>
</div>
