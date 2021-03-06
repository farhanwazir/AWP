<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Products_controller extends Admin_Controller
{


    public function __construct()

    {

        parent::__construct();

        $this->lang->load('common');

        $this->lang->load('admin/reports/common');

        $this->lang->load('admin/products');


        if (!$this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');



        $this->load->model('admin/products');

        $this->load->model('admin/categories');

    }


    public function index()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_products_list'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_products_list'), 'admin/setup/products');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = $this->session->flashdata('errors');

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/setup/products/ajax';

        $this->data['edit_url'] = 'admin/setup/product/edit';



        /* Load Template */

        $this->template->admin_render('admin/products/index', $this->data);

    }


    public function getRawData_all()
    {

        $data = $_REQUEST;

        $data = $this->products->getData($data);

        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data[0]));

    }



    public function add()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_products_add'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_products_add'), 'admin/setup/products/add');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = $this->session->flashdata('errors');

        $this->data['message'] = isset($_GET['uploaded']) ? $this->session->flashdata('message') : NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/setup/product/store';

        $this->data['form_products_upload_url'] = 'admin/setup/product/store/bulk';



        $categories = $this->categories->getData();

        $this->data['categories_option'] = '';


        foreach ($categories[0]->data as $category) {

            if ($category->parent == 0) $this->data['categories_option'] .= '<optgroup label="' . $category->title . '"></optgroup>';

            else $this->data['categories_option'] .= '<option value="' . $category->bar_code . '">' . $category->bar_code . ' -- ' . $category->title . '</option>';

        }


        /* Load Template */

        $this->template->admin_render('admin/products/add', $this->data);



    }


    public function store()
    {

        /* Load form helper */

        $this->load->helper(array('form'));



        /* Load form validation library */

        $this->load->library('form_validation');



        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('cicdn', 'CICDN', 'required');



        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->products->store($data);

            redirect('admin/setup/product/add?uploaded', 'location', 301);

        }

    }


    public function store_bulk()
    {

        if (isset($_FILES['products_file']) && $_FILES['products_file']['size'] > 0) {

            $file_name = $_FILES['products_file']['name'] . '_' . time() . '_' . rand(10, 9999);

            $config['upload_path'] = './upload/products_files';

            $config['file_name'] = $file_name;

            //$config['allowed_types']        = 'xls';

            //$config['max_size']             = 1000;

            $this->load->library('upload', $config);

            $this->upload->set_allowed_types('*');


            $field_name = "products_file";


            if (!$this->upload->do_upload($field_name)) {

                $error = array('errors' => $this->upload->display_errors());


                $this->session->set_flashdata('error', $this->upload->display_errors());


                redirect('admin/setup/product/add', 'location', 301);

            } else {

                $this->load->library('excel');

                //read file from path

                $objPHPExcel = PHPExcel_IOFactory::load($this->upload->data()['full_path']);

                //get only the Cell Collection

                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

                //extract to a PHP readable array format

                foreach ($cell_collection as $cell) {

                    $column = ($objPHPExcel->getActiveSheet()->getCell($cell)->getColumn() == 'A') ? 'bar_code' : 'cicdn';

                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();

                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                    //header will should be in row 1 only.

                    if ($row == 1) {

                        $header[$row][$column] = $data_value;

                    } else {

                        $arr_data[$row][$column] = $data_value;

                    }

                }


                $data['products'] = json_encode($arr_data);

                $output = $this->products->storeBulk($data);



                /*foreach ($arr_data as $data) {

                    $this->products->store($data);

                }*/


                redirect('admin/setup/product/add', 'location', 301);

            }

        }

    }


    public function edit()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('menu_products_add'));

        $this->data['pagetitle'] = $this->page_title->show();


        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('menu_products_add'), 'admin/setup/product/edit');


        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/setup/product/update';


        /* Load Template */

        $this->template->admin_render('admin/products/edit', $this->data);


    }


    public function update()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('cicdn', 'CICDN', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->products->change($data);

            redirect('admin/setup/products', 'location', 301);

        }

    }

}

