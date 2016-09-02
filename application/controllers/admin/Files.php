<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_report_portability'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_report_portability'), 'admin/report/portability');

        if ( ! $this->auricell_auth->logged_in())
            redirect('auth/login', 'refresh');

        $this->load->model('report_portability');

    }


	public function index()
	{

	}
}
