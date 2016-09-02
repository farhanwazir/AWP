<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/services');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/services');
        $this->load->model('admin/categories');
    }


	public function index()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_services_list'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_services_list'), 'admin/setup/services');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/setup/services/ajax';
        $this->data['edit_url'] = 'admin/setup/service/edit';

        /* Load Template */
        $this->template->admin_render('admin/services/index', $this->data);
	}

    public function getRawData_all(){
        $data = $_REQUEST;
        $data = $this->services->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function add()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_services_add'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_services_add'), 'admin/setup/service/add');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/setup/service/store';

        $categories = $this->categories->getData();
        $this->data['categories_option'] = '';

        foreach($categories[0]->data as $category){
            if($category->parent == 0) $this->data['categories_option'] .= '<optgroup label="'.$category->title.'"></optgroup>';
            else $this->data['categories_option'] .= '<option value="'.$category->bar_code.'">'.$category->bar_code .' -- '. $category->title.'</option>';
        }


        /* Load Template */
        $this->template->admin_render('admin/services/add', $this->data);

    }

    public function store(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->services->store($data);
            redirect('admin/setup/services', 'location', 301);
        }
    }

    public function edit()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_services_edit'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_services_edit'), 'admin/setup/service/edit');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/setup/service/update';


        /* Load Template */
        $this->template->admin_render('admin/services/edit', $this->data);

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
            $this->services->change($data);
            redirect('admin/setup/services', 'location', 301);
        }
    }
}
