<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stars_controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('common');
        $this->lang->load('admin/reports/common');
        $this->lang->load('admin/reports/stars');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');

        $this->load->model('admin/reports/stars');
    }


	public function index_report_all()
	{
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_reports_all_stars_sale'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_reports_all_stars_sale'), 'admin/report/all/stars/sales');

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $this->data['error'] = NULL;
        $this->data['charset'] = 'utf-8';
        $this->data['table_data_ajax_path'] = 'admin/report/all/stars/sales/ajax';

        $data = [];
        if(isset($_REQUEST['start_date'])) list($data['start_date'], $data['end_date']) = [$_REQUEST['start_date'], isset($_REQUEST['end_date'])? $_REQUEST['end_date'] : $_REQUEST['start_date']];
        $this->data['data'] = $this->stars->getData($data);
        $this->data['token'] = $this->session->secret;

        /* Load Template */
        $this->template->admin_render('admin/reports/stars/sales', $this->data);

	}

    public function getRawData_report_all(){
        $data = $_REQUEST;
        $data = $this->stars->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

    public function getRawData_report_star(){
        $data = $_REQUEST;
        $data = $this->stars->getData($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }
}
