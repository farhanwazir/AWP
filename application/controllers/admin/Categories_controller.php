<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Categories_controller extends Admin_Controller
{


    public function __construct()

    {

        parent::__construct();

        $this->lang->load('common');

        $this->lang->load('admin/reports/common');

        $this->lang->load('admin/categories');


        if (!$this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');



        $this->load->model('admin/categories');

        $this->load->library('session');

    }


    public function index()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_categories_list'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_categories_list'), 'admin/setup/categories');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/setup/categories/ajax';

        $this->data['edit_url'] = 'admin/setup/category/edit';



        /* Load Template */

        $this->template->admin_render('admin/categories/index', $this->data);


    }


    public function getRawData_all()
    {

        $data = $_REQUEST;

        $data = $this->categories->getData($data);

        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data[0]));

    }



    public function add()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_categories_add'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_categories_add'), 'admin/setup/category/add');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = $this->session->message ? $this->session->message : NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/setup/category/store';



        $data = [];

        $categories = $this->categories->getData($data);

        $this->data['categories_option'] = '<option value="0">NONE</option>';


        foreach ($categories[0]->data as $category) {

            if ($category->parent == 0) $this->data['categories_option'] .= '<option value="' . $category->bar_code . '">' . $category->title . '</option>';

        }


        /* Load Template */

        $this->template->admin_render('admin/categories/add', $this->data);


    }


    public function store()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('title', 'Title', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->categories->store($data);

            redirect('admin/setup/categories', 'location', 301);

        }

    }


    public function edit()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_categories_add'));

        $this->data['pagetitle'] = $this->page_title->show();


        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_categories_add'), 'admin/setup/category/add');


        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = $this->session->message ? $this->session->message : NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/setup/category/update';


        $data = [];

        $categories = $this->categories->getData($data);

        $this->data['categories_option'] = '<option value="0">NONE</option>';


        foreach ($categories[0]->data as $category) {

            if ($category->parent == 0) $this->data['categories_option'] .= '<option value="' . $category->bar_code . '">' . $category->title . '</option>';

        }


        /* Load Template */

        $this->template->admin_render('admin/categories/edit', $this->data);


    }


    public function update()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('title', 'Title', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->categories->change($data);

            redirect('admin/setup/categories', 'location', 301);

        }

    }

}

