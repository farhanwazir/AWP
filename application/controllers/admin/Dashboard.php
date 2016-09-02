<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
    }


	public function index()
	{
        if ( ! $this->auricell_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['current_airtime_balance'] = '';
            $this->data['current_chips_stock'] = '';
            $this->data['today_airtime_sales'] = '';
            $this->data['today_chip_sales'] = '';

            /* Load Template */
            $this->template->admin_render('admin/dashboard/index', $this->data);
        }
	}
}
