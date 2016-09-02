<?php

/** * CodeIgniter * * An open source application development framework for PHP * * This content is released under the MIT License (MIT) * * Copyright (c) 2014 - 2015, British Columbia Institute of Technology * * Permission is hereby granted, free of charge, to any person obtaining a copy * of this software and associated documentation files (the "Software"), to deal * in the Software without restriction, including without limitation the rights * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell * copies of the Software, and to permit persons to whom the Software is * furnished to do so, subject to the following conditions: * * The above copyright notice and this permission notice shall be included in * all copies or substantial portions of the Software. * * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN * THE SOFTWARE. * * @package    CodeIgniter * @author    EllisLab Dev Team * @copyright    Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/) * @copyright    Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/) * @license    http://opensource.org/licenses/MIT	MIT License * @link    http://codeigniter.com * @since    Version 1.0.0 * @filesource */

defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'auth/login';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/dashboard';


/* AURICELL */


/*Portability*/

$route['admin/report/portability'] = 'admin/reports/portability_controller/index';

$route['admin/report/portability/ajax'] = 'admin/reports/portability_controller/getRawData';

/*//Chips sales*/

$route['admin/report/chips/sales'] = 'admin/reports/chips_controller/index';

$route['admin/report/chips/sales/ajax'] = 'admin/reports/chips_controller/getRawData';

$route['admin/product/chips/master/stock'] = 'admin/chips_controller/getMasterStock'; /* Get current stock admin*/

$route['admin/report/chips/company/conciliation'] = 'admin/reports/chips_controller/index_company_conciliation';

$route['admin/report/chips/company/conciliation/ajax'] = 'admin/reports/chips_controller/getRawData_company_conciliation';


$route['admin/product/chips/company/history/ajax'] = 'admin/chips_controller/getRawData_company_history'; /* Assign chips */

$route['admin/product/chips/company/assign'] = 'admin/chips_controller/index_assign'; /* Assign to company form */

$route['admin/product/chips/company/stock'] = 'admin/chips_controller/getCompanyMasterStock'; /* Get current stock company*/

$route['admin/product/chips/company/store'] = 'admin/chips_controller/addToCompanyMasterStock'; /* Assign to company */


$route['admin/product/chips/outlet/history/ajax'] = 'admin/chips_controller/getRawData_outlet_history'; /* Assign chips */

$route['admin/product/chips/outlet/stock'] = 'admin/chips_controller/getOutletMasterStock'; /* Get current stock company*/

$route['admin/product/chips/outlet/store'] = 'admin/chips_controller/addToOutletMasterStock'; /* Assign to company *//*//Airtime sales*/


$route['admin/report/airtime/sales'] = 'admin/reports/airtime_controller/index';

$route['admin/report/airtime/sales/ajax'] = 'admin/reports/airtime_controller/getRawData';

$route['admin/report/airtime/stock/history'] = 'admin/reports/airtime_controller/index_stock';

$route['admin/report/airtime/stock/history/ajax'] = 'admin/reports/airtime_controller/getRawData_stock';


$route['admin/setup/master/airtime'] = 'admin/airtime_controller/index';

$route['admin/setup/master/airtime/ajax'] = 'admin/airtime_controller/getRawData_all';

$route['admin/setup/master/airtime/add/balance'] = 'admin/airtime_controller/addToMasterBalance';


$route['admin/report/airtime/star/conciliation'] = 'admin/reports/airtime_controller/index_star_conciliation';

$route['admin/report/airtime/star/conciliation/ajax'] = 'admin/reports/airtime_controller/getRawData_star_conciliation';


$route['admin/report/airtime/company/conciliation'] = 'admin/reports/airtime_controller/index_company_conciliation';

$route['admin/report/airtime/company/conciliation/ajax'] = 'admin/reports/airtime_controller/getRawData_company_conciliation';

$route['admin/service/airtime/company/history/ajax'] = 'admin/airtime_controller/getRawData_company_history'; /* Assign airtime */

$route['admin/service/airtime/company/assign'] = 'admin/airtime_controller/index_assign'; /* Assign to company form */

$route['admin/service/airtime/company/balance'] = 'admin/airtime_controller/getCompanyMasterBalance'; /* Get current balance company*/

$route['admin/service/airtime/company/store'] = 'admin/airtime_controller/addToCompanyMasterBalance'; /* Assign to company */


$route['admin/service/airtime/outlet/history/ajax'] = 'admin/airtime_controller/getRawData_outlet_history'; /* Assign airtime */

$route['admin/service/airtime/outlet/balance'] = 'admin/airtime_controller/getOutletMasterBalance'; /* Get current balance company*/

$route['admin/service/airtime/outlet/store'] = 'admin/airtime_controller/addToOutletMasterBalance'; /* Assign to company */


/*//stars sales*/

$route['admin/report/all/stars/sales'] = 'admin/reports/stars_controller/index_report_all';

$route['admin/report/all/stars/sales/ajax'] = 'admin/reports/stars_controller/getRawData_report_all';


/*//detailed sales*/

$route['admin/report/sales'] = 'admin/reports/companies_controller/index';

$route['admin/report/sales/ajax'] = 'admin/reports/companies_controller/getRawData';


/*//Categories*/

$route['admin/setup/categories'] = 'admin/categories_controller/index';

$route['admin/setup/categories/ajax'] = 'admin/categories_controller/getRawData_all';

$route['admin/setup/category/add'] = 'admin/categories_controller/add';

$route['admin/setup/category/store'] = 'admin/categories_controller/store';

$route['admin/setup/category/edit'] = 'admin/categories_controller/edit';

$route['admin/setup/category/update'] = 'admin/categories_controller/update';


/*//services*/

$route['admin/setup/services'] = 'admin/services_controller/index';

$route['admin/setup/services/ajax'] = 'admin/services_controller/getRawData_all';

$route['admin/setup/service/add'] = 'admin/services_controller/add';

$route['admin/setup/service/store'] = 'admin/services_controller/store';

$route['admin/setup/service/edit'] = 'admin/services_controller/edit';

$route['admin/setup/service/update'] = 'admin/services_controller/update';


/*//products*/

$route['admin/setup/products'] = 'admin/products_controller/index';

$route['admin/setup/products/ajax'] = 'admin/products_controller/getRawData_all';

$route['admin/setup/product/add'] = 'admin/products_controller/add';

$route['admin/setup/product/store'] = 'admin/products_controller/store';

$route['admin/setup/product/store/bulk'] = 'admin/products_controller/store_bulk';

$route['admin/setup/product/edit'] = 'admin/products_controller/edit';

$route['admin/setup/product/update'] = 'admin/products_controller/update';


/*//clients*/

$route['admin/clients'] = 'admin/clients_controller/index';

$route['admin/client/companies'] = 'admin/companies_controller/index';

$route['admin/client/companies/ajax'] = 'admin/companies_controller/getRawData_all';

$route['admin/client/companies/trashed/ajax'] = 'admin/companies_controller/getRawData_trashed_all';

$route['admin/client/company/add'] = 'admin/companies_controller/add';

$route['admin/client/company/store'] = 'admin/companies_controller/store';

$route['admin/client/company/edit'] = 'admin/companies_controller/edit';

$route['admin/client/company/update'] = 'admin/companies_controller/update';

$route['admin/client/company/delete'] = 'admin/companies_controller/delete';

$route['admin/client/company/restore'] = 'admin/companies_controller/restore';


$route['admin/client/company/outlets'] = 'admin/outlets_controller/index';

$route['admin/client/company/outlets/ajax'] = 'admin/outlets_controller/getRawData_all';

$route['admin/client/company/outlet/add'] = 'admin/outlets_controller/add';

$route['admin/client/company/outlet/store'] = 'admin/outlets_controller/store';

$route['admin/client/company/outlet/edit'] = 'admin/outlets_controller/edit';

$route['admin/client/company/outlet/update'] = 'admin/outlets_controller/update';


$route['admin/client/stars'] = 'admin/stars_controller/index';

$route['admin/client/stars/ajax'] = 'admin/stars_controller/getRawData_all';

$route['admin/client/star/add'] = 'admin/stars_controller/add';

$route['admin/client/star/store'] = 'admin/stars_controller/store';

$route['admin/client/star/edit'] = 'admin/stars_controller/edit';

$route['admin/client/star/update'] = 'admin/stars_controller/update';


$route['admin/users'] = 'admin/users_controller/index';

$route['admin/users/ajax'] = 'admin/users_controller/getRawData_all';


$route['admin/system/users'] = 'admin/users_controller/index_admin';

$route['admin/system/users/ajax'] = 'admin/users_controller/getRawData_all_admin';


$route['admin/client/users'] = 'admin/users_controller/index_client';

$route['admin/client/users/ajax'] = 'admin/users_controller/getRawData_all_client';


$route['admin/user/add'] = 'admin/users_controller/add';

$route['admin/user/store'] = 'admin/users_controller/store';

$route['admin/user/edit'] = 'admin/users_controller/edit';

$route['admin/user/update'] = 'admin/users_controller/update';


$route['form/control/company/outlets'] = 'admin/users_controller/getOutlets';