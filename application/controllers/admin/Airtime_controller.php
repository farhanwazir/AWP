<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airtime_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/services');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/reports/airtime');
    }


	public function index()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_airtime_setup'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_airtime_setup'), 'admin/setup/master/airtime');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/setup/master/airtime/ajax';
        $this->data['form_url'] = 'admin/setup/master/airtime/add/balance';

        $this->data['balance'] = $this->airtime->getMasterBalance(['bar_code' => '900000']);

        /* Load Template */
        $this->template->admin_render('admin/services/airtime/index', $this->data);
	}

    public function getRawData_all(){
        $data = $_REQUEST;
        $data = $this->airtime->getMasterHistory($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function addToMasterBalance(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('bar_code', 'Barcode', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->airtime->addToMasterBalance($data);
            redirect('admin/setup/master/airtime', 'location', 301);
        }
    }

    public function index_assign()
    {

        /*Check if user is company*/
        if($this->data['user_data']->user_type == 'dc'){
            $this->index_company_assign();
            return;
        }

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_client_assign_balance'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_client_assign_balance'), 'admin/service/airtime/company/assign');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/service/airtime/company/history/ajax';
        $this->data['form_url'] = 'admin/service/airtime/company/store';
        $this->data['current_balance_url'] = 'admin/service/airtime/company/balance';
        $this->data['airtime_barcode'] = '900000';

        $this->data['balance'] = $this->airtime->getMasterBalance(['bar_code' => '900000']);

        /* Companies */
        $this->load->model('admin/companies');
        $companies = $this->companies->getData();
        $this->data['companies_option'] = '<option>None</option>';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';
        }

        /* Load Template */
        $this->template->admin_render('admin/services/airtime/assign', $this->data);
    }

    public function getRawData_company_history(){
        $data = $_REQUEST;
        $data = $this->airtime->getCompanyMasterHistory($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getCompanyMasterBalance(){
        $data = $_REQUEST;
        $data = $this->airtime->getCompanyMasterBalance($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(number_format($data->balance, 2)));
    }


    public function addToCompanyMasterBalance(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('bar_code', 'Barcode', 'required');
        $this->form_validation->set_rules('company_id', 'Company Code', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->airtime->addToCompanyMasterBalance($data);
            redirect('admin/service/airtime/company/assign', 'location', 301);
        }
    }

//    company assign to outlet
    public function index_company_assign()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_client_assign_balance'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_client_assign_balance'), 'admin/service/airtime/company/assign');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/service/airtime/outlet/history/ajax';
        $this->data['form_url'] = 'admin/service/airtime/outlet/store';
        $this->data['current_balance_url'] = 'admin/service/airtime/outlet/balance';
        $this->data['airtime_barcode'] = '900000';

        $this->data['balance'] = $this->airtime->getMasterBalance(['bar_code' => '900000']);

        /* Companies */
        $this->load->model('admin/outlets');
        $companies = $this->outlets->getData();
        $this->data['companies_option'] = '<option>None</option>';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->outlet_id .'">'. $company->outlet_id .' -- '. $company->name .'</option>';
        }

        /* Load Template */
        $this->template->admin_render('admin/services/airtime/assign', $this->data);
    }

    public function getRawData_outlet_history(){
        $data = $_REQUEST;
        $data = $this->airtime->getOutletMasterHistory($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getOutletMasterBalance(){
        $data = $_REQUEST;
        $data = $this->airtime->getOutletMasterBalance($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(number_format($data->balance, 2)));
    }


    public function addToOutletMasterBalance(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('bar_code', 'Barcode', 'required');
        $this->form_validation->set_rules('outlet_id', 'Outlet Code', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->airtime->addToOutletMasterBalance($data);
            redirect('admin/service/airtime/company/assign', 'location', 301);
        }
    }

}
