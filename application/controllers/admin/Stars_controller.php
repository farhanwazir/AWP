<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stars_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/users');
        $this->lang->load('admin/stars');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/stars');
    }


	public function index()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('star_all_stars'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('star_all_stars'), 'admin/client/stars');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/client/stars/ajax';
        $this->data['edit_url'] = 'admin/client/star/edit';

        /* Load Template */
        $this->template->admin_render('admin/stars/index', $this->data);
	}

    public function getRawData_all(){
        $data = $_REQUEST;
        $data = $this->stars->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function add()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('star_register'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('star_register'), 'admin/client/star/add');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/star/store';


        /* Load Template */
        $this->template->admin_render('admin/stars/add', $this->data);

    }

    public function store(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
        else {
            $data = $_REQUEST;
            $this->stars->store($data);
            redirect('admin/client/stars', 'location', 301);
        }
    }

    public function edit()
    {
        /* Title Page :: Common */
        $this->page_title->push(lang('star_edit'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('star_edit'), 'admin/client/star/edit');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['form_url'] = 'admin/client/star/update';


        /* Load Template */
        $this->template->admin_render('admin/stars/edit', $this->data);

    }

    public function update(){
        /* Load form helper */
        $this->load->helper(array('form'));

        /* Load form validation library */
        $this->load->library('form_validation');

        /* Set validation rule for name field in the form */
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');

        if ($this->form_validation->run() == FALSE) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $data = $_REQUEST;
            $this->outlets->change($data);
            redirect('admin/client/stars', 'location', 301);
        }
    }
}
