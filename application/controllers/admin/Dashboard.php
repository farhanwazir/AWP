<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends Admin_Controller
{


    public function __construct()

    {

        parent::__construct();



        /* Load :: Common */

        $this->load->helper('number');

        $this->load->model('admin/adminDashboard');

    }


    public function index()

    {

        if (!$this->auricell_auth->logged_in()) {

            redirect('auth/login', 'refresh');

        } else {

            $this->lang->load('admin/dashboard');
            $this->lang->load('admin/services');

            /* Title Page */

            $this->page_title->push(lang('menu_dashboard'));

            $this->data['pagetitle'] = $this->page_title->show();


            /* Breadcrumbs */

            $this->data['breadcrumb'] = $this->breadcrumbs->show();


            /* Data */
            $data['bar_code'] = 900000;
            $airtime_stats = $this->adminDashboard->getAirtimeStats($data);
            $airtime_master_balance = $this->adminDashboard->getMasterBalance($data);
            $airtime_server_balance = $this->adminDashboard->getServerBalance(); //For AT&T balance

            $this->data['airtime_consumed_balance'] = isset($airtime_stats->consumed_balance) ? $airtime_stats->consumed_balance : 0;

            $this->data['airtime_available_balance'] = isset($airtime_stats->total_available_balance) ? $airtime_stats->total_available_balance : 0;

            $this->data['airtime_master_balance'] = isset($airtime_master_balance->balance) ? $airtime_master_balance->balance : 0;

            $this->data['airtime_server_balance'] = isset($airtime_server_balance->balance) ? $airtime_server_balance->balance : 0;

            $this->data['today_airtime_sales'] = '';

            $this->data['today_chip_sales'] = '';


            /* Load Template */

            $this->template->admin_render('admin/dashboard/index', $this->data);

        }

    }

}

