<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chips_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/reports/chips');
        $this->lang->load('admin/services');
        $this->lang->load('admin/products');

        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/reports/chips');
    }


	public function index_assign()
	{
        /*Check if user is company*/
        if($this->data['user_data']->user_type == 'dc'){
            $this->index_company_assign();
            return;
        }

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_client_assign_chip'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_client_assign_chip'), 'admin/service/airtime/company/assign');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/product/chips/company/history/ajax';
        $this->data['form_url'] = 'admin/product/chips/company/store';
        $this->data['master_current_balance_url'] = 'admin/product/chips/master/stock';
        $this->data['company_current_balance_url'] = 'admin/product/chips/company/stock';

        /* Companies */
        $this->load->model('admin/companies');
        $companies = $this->companies->getData();
        $this->data['companies_option'] = '<option>None</option>';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';
        }

        /* Categories */
        $this->load->model('admin/categories');
        $categories = $this->categories->getData();
        $this->data['categories_option'] = '';
        foreach($categories[0]->data as $category){
            if($category->type == 'chip'){
                if ($category->parent == 0) $this->data['categories_option'] .= '<optgroup label="' . $category->title . '"></optgroup>';
                else $this->data['categories_option'] .= '<option value="' . $category->bar_code . '">' . $category->bar_code . ' -- ' . $category->title . '</option>';
            }
        }

        /* Load Template */
        $this->template->admin_render('admin/products/chips/assign', $this->data);

	}

    public function getMasterStock(){
        $data = $_REQUEST;
        $data = $this->chips->getMasterStock($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(number_format($data->stock, 0)));
    }

    public function getRawData_company_history(){
        $data = $_REQUEST;
        $data = $this->chips->getCompanyMasterHistory($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getCompanyMasterStock(){
        $data = $_REQUEST;
        $data = $this->chips->getCompanyMasterStock($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(number_format($data->stock, 0)));
    }


    public function addToCompanyMasterStock(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('bar_code', 'Barcode', 'required');
        $this->form_validation->set_rules('company_id', 'Company Code', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->chips->addToCompanyMasterStock($data);
            redirect('admin/product/chips/company/assign', 'location', 301);
        }
    }

    public function index_company_assign()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_client_assign_chip'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_client_assign_chip'), 'admin/service/airtime/company/assign');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/product/chips/outlet/history/ajax';
        $this->data['form_url'] = 'admin/product/chips/outlet/store';
        $this->data['master_current_balance_url'] = 'admin/product/chips/master/stock';
        $this->data['company_current_balance_url'] = 'admin/product/chips/outlet/stock';

        /* Companies */
        $this->load->model('admin/outlets');
        $companies = $this->outlets->getData();
        $this->data['companies_option'] = '<option>None</option>';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->outlet_id .'">'. $company->outlet_id .' -- '. $company->name .'</option>';
        }

        /* Categories */
        $this->load->model('admin/categories');
        $categories = $this->categories->getData();
        $this->data['categories_option'] = '';
        foreach($categories[0]->data as $category){
            if($category->type == 'chip'){
                if ($category->parent == 0) $this->data['categories_option'] .= '<optgroup label="' . $category->title . '"></optgroup>';
                else $this->data['categories_option'] .= '<option value="' . $category->bar_code . '">' . $category->bar_code . ' -- ' . $category->title . '</option>';
            }
        }

        /* Load Template */
        $this->template->admin_render('admin/products/chips/assign', $this->data);

    }

    public function getRawData_outlet_history(){
        $data = $_REQUEST;
        $data = $this->chips->getOutletMasterHistory($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getOutletMasterStock(){
        $data = $_REQUEST;
        $data = $this->chips->getOutletMasterStock($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode(number_format($data->stock, 0)));
    }


    public function addToOutletMasterStock(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('bar_code', 'Barcode', 'required');
        $this->form_validation->set_rules('outlet_id', 'Outlet Code', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->chips->addToOutletMasterStock($data);
            redirect('admin/product/chips/company/assign', 'location', 301);
        }
    }
}
