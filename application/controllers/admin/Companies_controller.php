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

        $this->load->model('admin/companies');
    }


	public function index()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('company_all_companies'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('company_all_companies'), 'admin/client/companies');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/client/companies/ajax';
        $this->data['table_trashed_data_ajax_path'] = 'admin/client/companies/trashed/ajax';
        $this->data['edit_url'] = 'admin/client/company/edit';
        $this->data['delete_url'] = 'admin/client/company/delete';
        $this->data['restore_url'] = 'admin/client/company/restore';

        /* Load Template */
        $this->template->admin_render('admin/companies/index', $this->data);
	}

    public function getRawData_all(){
        $data = $_REQUEST;
        $data = $this->companies->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getRawData_trashed_all(){
        $data = $_REQUEST;
        $data = $this->companies->getTrashed($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function delete(){
        $data = $_REQUEST;
        $data = $this->companies->remove($data);
        redirect('admin/client/companies', 'location', 301);
    }

    public function restore(){
        $data = $_REQUEST;
        $data = $this->companies->reactive($data);
        redirect('admin/client/companies', 'location', 301);
    }

    public function add()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('company_register'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('company_register'), 'admin/client/company/add');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/company/store';


        /* Load Template */
        $this->template->admin_render('admin/companies/add', $this->data);

    }

    public function store(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company_id', 'Company ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->companies->store($data);
            redirect('admin/client/companies', 'location', 301);
        }
    }

    public function edit()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('company_edit'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('company_edit'), 'admin/client/company/edit');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/company/update';


        /* Load Template */
        $this->template->admin_render('admin/companies/edit', $this->data);

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
            $this->companies->change($data);
            redirect('admin/client/companies', 'location', 301);
        }
    }
}
