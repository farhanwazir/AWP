<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">    <?php /* */ /*?>  <section class="content-header">                    <?php /* */
    "title" ?>                    <?php /* */ ?> </section><?php /* */
    */ ?>
    <form action="#" method="post" role="form">
        <section class="content">
            <div class="row width-sixty">
                <div class="login-logo"><a href="#"><b>Register-outlet</b> User-Form</a></div>
                <div class="col-md-6">
                    <div class="form-group"><label for="name">Name</label> <input type="text" class="form-control"
                                                                                  required name="name"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><label for="company_id">Email (required)</label> <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="company_id"
                                                                                                    name="email"
                                                                                                    required></div>
                </div>
            </div>
            <div class="row width-sixty">
                <div class="col-md-6">
                    <div class="form-group"><label for="password">Password (required)</label> <input type="text"
                                                                                                     class="form-control"
                                                                                                     id="company_id"
                                                                                                     name="password"
                                                                                                     required></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><label for="telephone">Telephone (required)</label> <input type="text"
                                                                                                       class="form-control"
                                                                                                       name="telephone"
                                                                                                       required></div>
                </div>
            </div>
            <div class="row width-sixty">
                <div class="col-md-6">
                    <div class="form-group"><label for="outlet_id">Outlet ID (required)</label> <input type="text"
                                                                                                       class="form-control"
                                                                                                       required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><label for="Age">Age</label> <input type="text" class="form-control"
                                                                                id="company_id" name="age"></div>
                </div>
            </div>
            <div class="row width-sixty">
                <div class="col-md-12">
                    <div class="form-group"><label for="addres">Adress</label> <textarea class="form-control" rows="5"
                                                                                         name="address"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="submit" class="btn btn-default btn-lg"/>
</div></form></div></section></div>
