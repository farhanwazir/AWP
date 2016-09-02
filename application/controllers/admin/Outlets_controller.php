<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlets_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/companies');
        $this->lang->load('admin/outlets');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/outlets');
        $this->load->model('admin/companies');
    }


	public function index()
	{

        /*Check if user is company*/
        if($this->data['user_data']->user_type == 'dc'){
            $this->index_company();
            return;
        }

        /* Title Page :: Common */
        $this->page_title->push(lang('outlet_all_outlets'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('outlet_all_outlets'), 'admin/client/company/outlets');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/client/company/outlets/ajax';
        $this->data['edit_url'] = 'admin/client/company/outlet/edit';

        /* Companies */
        $companies = $this->companies->getData();
        $this->data['companies_option'] = '';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';
        }

        /* Load Template */
        $this->template->admin_render('admin/companies/outlets/index', $this->data);
	}

    public function getRawData_all(){
        $data = $_REQUEST;
        $data = $this->outlets->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function add()
    {
        /*Check if user is company*/
        if($this->data['user_data']->user_type == 'dc'){
            $this->add_company();
            return;
        }

        /* Title Page :: Common */
        $this->page_title->push(lang('outlet_register'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('outlet_register'), 'admin/client/company/outlet/add');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/company/outlet/store';

        /* Companies */
        $companies = $this->companies->getData();
        $this->data['companies_option'] = '';
        foreach($companies[0]->data as $company){
            $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';
        }


        /* Load Template */
        $this->template->admin_render('admin/companies/outlets/add', $this->data);

    }

    public function store(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('outlet_id', 'Outlet ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->outlets->store($data);
            redirect('admin/client/company/outlets', 'location', 301);
        }
    }

    public function edit()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('outlet_edit'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('outlet_edit'), 'admin/client/company/outlet/edit');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/company/outlet/update';


        /* Load Template */
        $this->template->admin_render('admin/companies/outlets/edit', $this->data);

    }

    public function update(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $data = $_REQUEST;
            $this->outlets->change($data);
            redirect('admin/client/company/outlets', 'location', 301);
        }
    }

    public function index_company()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('outlet_all_outlets'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('outlet_all_outlets'), 'admin/client/company/outlets');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/client/company/outlets/ajax';
        $this->data['edit_url'] = 'admin/client/company/outlet/edit';

        /* Load Template */
        $this->template->admin_render('admin/companies/outlets/index', $this->data);
    }

    public function add_company()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('outlet_register'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('outlet_register'), 'admin/client/company/outlet/add');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/company/outlet/store';

        /* Load Template */
        $this->template->admin_render('admin/companies/outlets/add', $this->data);

    }
}
