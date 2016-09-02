<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/companies');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/reports/company');
    }


	public function index()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_sales_report'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_sales_report'), 'admin/report/sales');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/report/sales/ajax';

        /* Companies */
        $this->load->model('admin/companies');
        $companies = $this->companies->getData();
        $this->data['companies_option'] = '';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';
        }

        /* Load Template */
        $this->template->admin_render('admin/reports/custom/sales', $this->data);
	}

    public function getRawData(){
        $data = $_REQUEST;
        $data = $this->company->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }
}
