<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Chips_controller extends Admin_Controller {



    public function __construct()

    {

        parent::__construct();

        $this->lang->load('common');

        $this->lang->load('admin/reports/common');

        $this->lang->load('admin/reports/chips');


        if(! $this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');



        $this->load->model('admin/reports/chips');

    }





	public function index()

	{

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_reports_chips_sale'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_reports_chips_sale'), 'admin/report/portability');

        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/report/chips/sales/ajax';



        $data = [];

        if(isset($_REQUEST['start_date'])) list($data['start_date'], $data['end_date']) = [$_REQUEST['start_date'], isset($_REQUEST['end_date'])? $_REQUEST['end_date'] : $_REQUEST['start_date']];

        $this->data['data'] = $this->chips->getData($data);

        $this->data['token'] = $this->session->secret;



        /* Companies */

        if($this->data['user_data']->user_type == 'a'):

            $this->load->model('admin/companies');

            $companies = $this->companies->getData();

            $this->data['companies_option'] = '';

            foreach($companies[0]->data as $company){

                $this->data['companies_option'] .= '<option value="'. $company->company_id .'">'. $company->company_id .' -- '. $company->name .'</option>';

            }

        endif;



        /* Load Template */

        $this->template->admin_render('admin/reports/chips/sales', $this->data);



	}



    public function getRawData(){

        $data = $_REQUEST;



        if(isset($_REQUEST['start_date'])) list($data['start_date'], $data['end_date']) = [$_REQUEST['start_date'], isset($_REQUEST['end_date'])? $_REQUEST['end_date'] : $_REQUEST['start_date']];

        $data = $this->chips->getData($data);

        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data[0]));

    }

    public function index_company_conciliation()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_reports_company_chips_conciliation'));

        $this->data['pagetitle'] = $this->page_title->show();


        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_reports_company_chips_conciliation'), 'admin/report/chips/company/conciliation');

        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/report/chips/company/conciliation/ajax';


        if ($this->data['user_data']->user_type == 'a'):
            /* Companies */

            $this->load->model('admin/companies');

            $companies = $this->companies->getData();

            $this->data['companies_option'] = '';

            foreach ($companies[0]->data as $company) {

                $this->data['companies_option'] .= '<option value="' . $company->company_id . '">' . $company->company_id . ' -- ' . $company->name . '</option>';

            }
        endif;


        /* Load Template */

        $this->template->admin_render('admin/reports/chips/conciliation', $this->data);


    }


    public function getRawData_company_conciliation()
    {
        $data = $_REQUEST;
        $data = $this->chips->getCompanyConciliation($data);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));
    }

}

