<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');

        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/reports/stars');
        $this->load->model('admin/reports/outlets');
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
        $this->data['table_data_star_ajax_path'] = 'admin/report/sales/star/ajax';
        $this->data['table_data_outlet_ajax_path'] = 'admin/report/sales/outlet/ajax';

        $data = [];
        $this->data['data'] = $this->stars->getData($data);
        $this->data['token'] = $this->session->secret;

        /* Load Template */
        $this->template->admin_render('admin/reports/custom/sales', $this->data);

	}

    public function getRawData_star(){
        $data = $_REQUEST;

        if(isset($_REQUEST['id'])) $data['star_id'] = $_REQUEST['id'];
        $data = $this->stars->getData($data);

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getRawData_outlet(){
        $data = $_REQUEST;

        //if(isset($_REQUEST['id'])) $data['outlet_id'] = $_REQUEST['id'];
        $data = $this->outlets->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
