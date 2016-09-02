<?php /* */ /**/
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<aside class="main-sidebar">
    <section class="sidebar">        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header text-uppercase"><?php /* */
                echo lang('menu_main_navigation'); ?></li>
            <li class="<?= active_link_controller('dashboard') ?>"><a href="<?php /* */
                echo site_url('admin/dashboard'); ?>"> <i class="fa fa-dashboard"></i> <span><?php /* */
                        echo lang('menu_dashboard'); ?></span> </a></li>
            <!-- Client menu -->
            <?php if ($user_data->user_type == 'a'): ?>
            <li class="header text-uppercase"><?php /* */
                echo lang('menu_client'); ?></li>
            <!-- Only admin -->
                <li class="<?= active_link_controller('companies_controller') ?>"><a href="<?php /* */
                    echo site_url('admin/client/companies'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_companies_list'); ?></span> </a></li>            <?php /* */
            endif; ?>
            <?php if ($user_data->user_type == 'dc'): ?>
                <!--<li class="<?/*=active_link_controller('outlets_controller') */?>">
                    <a href="<?/*=site_url('admin/client/company/outlets'); */?>">
                        <i class="fa fa-user"></i>
                        <span><?/*=lang('menu_outlets_list'); */?></span>
                    </a>
                </li>-->
            <?php endif; ?>
            <?php /* */
            if ($user_data->user_type == 'a'): ?>                <!--<li class="<? /*=active_link_controller('stars_controller')*/ ?>">                            <a href="<?php /* */ /*echo site_url('admin/client/stars'); */ ?>">                                <i class="fa fa-user"></i> <span><?php /* */ /*echo lang('menu_stars_list'); */ ?></span>                            </a>                        </li>-->
                <li class="<?= active_link_controller('register_client') ?>"><a href="<?php /* */
                    echo site_url('admin/client/company/add'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_client_register'); ?></span> </a>
                </li>
            <?php /* */ elseif ($user_data->user_type == 'dc'): ?>
                <!--<li class="<?/*=active_link_controller('register_client') */?>">
                    <a href="<?/*=site_url('admin/client/company/outlet/add'); */?>">
                        <i class="fa fa-user"></i>
                        <span><?/*=lang('menu_outlet_register'); */?></span>
                    </a>
                </li>-->            
            <?php endif; ?>
            <?php if ($user_data->user_type == 'a'): ?>
                <li class="<?= active_link_controller('assign_balance') ?>">
                    <a href="<?php echo site_url('admin/service/airtime/company/assign'); ?>">
                        <i class="fa fa-user"></i>
                        <span><?php echo lang('menu_client_assign_balance'); ?></span>
                    </a>
                </li>
                <li class="<?= active_link_controller('assign_chips') ?>">
                    <a href="<?php echo site_url('admin/product/chips/company/assign'); ?>">
                        <i class="fa fa-shield"></i>
                        <span><?php echo lang('menu_client_assign_chip'); ?></span>
                    </a>
                </li>
            <?php elseif ($user_data->user_type == 'nope'): ?>
                <li class="<?= active_link_controller('assign_balance') ?>">
                    <a href="<?php echo site_url('admin/service/airtime/company/assign'); ?>">
                        <i class="fa fa-user"></i>
                        <span><?php echo lang('menu_client_assign_balance'); ?></span>
                    </a>
                </li>
                <li class="<?= active_link_controller('assign_chips') ?>">
                    <a href="<?php echo site_url('admin/product/chips/company/assign'); ?>">
                        <i class="fa fa-shield"></i>
                        <span><?php echo lang('menu_client_assign_chip'); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <!-- Users menu -->
            <li class="header text-uppercase"><?php /* */
                echo lang('menu_users'); ?></li>
            <li class="<?= active_link_controller('users_controller') ?>">
                <a href="<?php /* */
                echo site_url('admin/system/users'); ?>"> <i class="fa fa-shield"></i> <span><?php /* */
                        echo lang('menu_users_admin'); ?></span> </a>
            </li>
            <?php if($user_data->user_type == 'a'): ?>
            <li class="<?= active_link_controller('users_controller') ?>">
                <a href="<?php /* */
                echo site_url('admin/client/users'); ?>"> <i class="fa fa-shield"></i> <span><?php /* */
                        echo ($user_data->user_type == 'a') ? lang('menu_users_clients') : lang('menu_users_outlets'); ?></span>
                </a>
            </li>

            <li class="<?= active_link_controller('client_controller') ?>"><a href="<?php /* */
                echo site_url('admin/user/add'); ?>"> <i class="fa fa-shield"></i> <span><?php /* */
                        echo lang('menu_user_add'); ?></span> </a>
            </li>
            <?php endif; ?>
            <!-- Setup menu --> <?php /* */
            if ($user_data->user_type == 'a'): ?>
                <li class="header text-uppercase"><?php /* */
                    echo lang('menu_setup'); ?></li>
                <li class="treeview <?= active_link_controller('setup_categories') ?>"><a href="#"> <i
                            class="fa fa-cogs"></i> <span><?php /* */
                            echo lang('menu_categories'); ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
                    <ul class="treeview-menu">
                        <li class="<?= active_link_function('categories_list') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/categories'); ?>"><?php /* */
                                echo lang('menu_categories_list'); ?></a></li>
                        <li class="<?= active_link_function('category_add') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/category/add'); ?>"><?php /* */
                                echo lang('menu_categories_add'); ?></a></li>
                    </ul>
                </li>
                <li class="treeview <?= active_link_controller('setup_services') ?>"><a href="#"> <i
                            class="fa fa-cogs"></i> <span><?php /* */
                            echo lang('menu_services'); ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
                    <ul class="treeview-menu">
                        <li class="<?= active_link_function('setup_services_list') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/services'); ?>"><?php /* */
                                echo lang('menu_services_list'); ?></a></li>
                        <li class="<?= active_link_function('setup_service_add') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/service/add'); ?>"><?php /* */
                                echo lang('menu_services_add'); ?></a></li>
                    </ul>
                </li>
                <li class="treeview <?= active_link_controller('setup_products') ?>"><a href="#"> <i
                            class="fa fa-cogs"></i> <span><?php /* */
                            echo lang('menu_products'); ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
                    <ul class="treeview-menu">
                        <li class="<?= active_link_function('setup_products_list') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/products'); ?>"><?php /* */
                                echo lang('menu_products_list'); ?></a></li>
                        <li class="<?= active_link_function('setup_product_add') ?>"><a href="<?php /* */
                            echo site_url('admin/setup/product/add'); ?>"><?php /* */
                                echo lang('menu_products_add'); ?></a></li>
                        <!--<li class="<? /*=active_link_function('setup_products_add_bulk')*/ ?>"><a href="<?php /* */ /*echo site_url('admin/setup/product/add/bulk'); */ ?>"><?php /* */ /*echo lang('menu_products_bulk'); */ ?></a></li>-->
                    </ul>
                </li>
                <li class="<?= active_link_controller('setup_airtime') ?>"><a href="<?php /* */
                    echo site_url('admin/setup/master/airtime'); ?>"> <i class="fa fa-shield"></i> <span><?php /* */
                            echo lang('menu_airtime_setup'); ?></span> </a></li>            <?php /* */
            endif; ?> <!-- Reports menu --> <?php /* */
            if ($user_data->user_type == 'a' || $user_data->user_type == 'dc'): ?>
                <li class="header text-uppercase"><?php /* */
                    echo lang('menu_reports'); ?></li>                <?php /* */
                if ($user_data->user_type == 'a'): ?>
                    <li class="<?= active_link_controller('report_history_airtime') ?>"><a href="<?php /* */
                        echo site_url('admin/report/airtime/stock/history'); ?>"> <i class="fa fa-user"></i>
                            <span><?php /* */
                                echo lang('menu_history_airtime'); ?></span> </a>
                    </li>                    <!--<li class="<? /*=active_link_controller('report_stats')*/ ?>">                            <a href="<?php /* */ /*echo site_url('admin/report/stats'); */ ?>">                                <i class="fa fa-user"></i> <span><?php /* */ /*echo lang('menu_reports_stats'); */ ?></span>                            </a>                        </li>-->
                    <li class="<?= active_link_controller('custom_controller') ?>"><a href="<?php /* */
                        echo site_url('admin/report/sales'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                                echo lang('menu_sales_report'); ?></span> </a></li>                <?php /* */
                endif; ?>
                <li class="<?= active_link_controller('report_conciliation') ?>"><a href="<?php /* */
                    echo site_url('admin/report/airtime/star/conciliation'); ?>"> <i class="fa fa-user"></i>
                        <span><?php /* */
                            echo lang('menu_reports_star_conciliation'); ?></span> </a></li>
                <li class="<?= active_link_controller('report_conciliation') ?>"><a href="<?php /* */
                    echo site_url('admin/report/airtime/company/conciliation'); ?>"> <i class="fa fa-user"></i>
                        <span><?php /* */
                            echo lang('menu_reports_company_conciliation'); ?></span> </a>
                </li>
                <li class="<?= active_link_controller('report_conciliation') ?>">

                    <a href="<?php /* */
                    echo site_url('admin/report/chips/company/conciliation'); ?>">

                        <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_reports_company_chips_conciliation'); ?></span>
                    </a>

                </li>

                <?php /* */
                if ($user_data->user_type == 'a'): ?>
                    <li class="<?= active_link_controller('stars_controller') ?>"><a href="<?php /* */
                        echo site_url('admin/report/all/stars/sales'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                                echo lang('menu_reports_all_stars_sale'); ?></span> </a></li>                <?php /* */
                endif; ?>
                <li class="<?= active_link_controller('airtime_controller') ?>"><a href="<?php /* */
                    echo site_url('admin/report/airtime/sales'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_reports_airtime_sale'); ?></span> </a></li>
                <li class="<?= active_link_controller('chips_controller') ?>"><a href="<?php /* */
                    echo site_url('admin/report/chips/sales'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_reports_chips_sale'); ?></span> </a></li>
                <li class="<?= active_link_controller('portability_controller') ?>"><a href="<?php /* */
                    echo site_url('admin/report/portability'); ?>"> <i class="fa fa-user"></i> <span><?php /* */
                            echo lang('menu_reports_portability'); ?></span> </a></li>            <?php /* */
            endif; ?>        </ul>
    </section>
</aside>