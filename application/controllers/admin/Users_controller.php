<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Users_controller extends Admin_Controller
{


    public function __construct()

    {

        parent::__construct();

        $this->lang->load('common');

        $this->lang->load('admin/reports/common');

        $this->lang->load('admin/users');


        if (!$this->auricell_auth->logged_in()) redirect('auth/login', 'refresh');



        $this->load->model('admin/users');

    }


    public function index()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('users_all_users'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('users_all_users'), 'admin/users');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/users/ajax';

        $this->data['edit_url'] = 'admin/user/edit';



        /* Load Template */

        $this->template->admin_render('admin/users/index', $this->data);

    }


    public function getRawData_all()
    {

        $data = $_REQUEST;

        $data = $this->users->getData($data);

        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data[0]));

    }



    public function index_client()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('users_all_client_users'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('users_all_client_users'), 'admin/client/users');



        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();



        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/client/users/ajax';
        $this->data['table_trashed_data_ajax_path'] = 'admin/client/users/trashed/ajax';

        $this->data['edit_url'] = 'admin/user/edit';
        $this->data['deactivate_url'] = 'admin/user/deactivate';
        $this->data['reactivate_url'] = 'admin/user/reactivate';


        if ($this->data['user_data']->user_type == 'dc') {

            $this->load->model('admin/outlets');

            $outlets_options = $this->outlets->getData();

            $this->data['outlets_option'] = '';

            foreach ($outlets_options[0]->data as $outlet) {

                $this->data['outlets_option'] .= '<option value="' . $outlet->outlet_id . '">' . $outlet->outlet_id . ' - ' . $outlet->name . '</option>';

            }

        } else {

            $this->load->model('admin/companies');

            $outlets_options = $this->companies->getData();

            $this->data['outlets_option'] = '';

            foreach ($outlets_options[0]->data as $outlet) {

                $this->data['outlets_option'] .= '<option value="' . $outlet->company_id . '">' . $outlet->company_id . ' - ' . $outlet->name . '</option>';

            }

        }



        /* Load Template */

        $this->template->admin_render('admin/users/index', $this->data);

    }


    public function getRawData_all_client()
    {

        $data = $_REQUEST;

        //if it is dc then its clients are outlets users, so type should be do

        if ($this->data['user_data']->user_type == 'a') $data['user_type'] = 'dc';

        if ($this->data['user_data']->user_type == 'dc') $data['user_type'] = 'do';

        $data = $this->users->getData($data);

        $this->output->set_content_type('application/json')

            ->set_output(json_encode($data[0]));

    }

    public function getRawData_all_client_deactivated()
    {

        $data = $_REQUEST;

        //if it is dc then its clients are outlets users, so type should be do

        if ($this->data['user_data']->user_type == 'a') $data['user_type'] = 'dc';

        if ($this->data['user_data']->user_type == 'dc') $data['user_type'] = 'do';

        $data = $this->users->getDeletedUsersCompany($data);

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));

    }



    public function index_admin()

    {



        /* Title Page :: Common */

        $this->page_title->push(lang('users_all_admin_users'));

        $this->data['pagetitle'] = $this->page_title->show();



        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('users_all_admin_users'), 'admin/system/users');


        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['table_data_ajax_path'] = 'admin/system/users/ajax';

        $this->data['table_trashed_data_ajax_path'] = 'admin/system/users/trashed/ajax';

        $this->data['edit_url'] = 'admin/user/edit';
        $this->data['deactivate_url'] = 'admin/user/deactivate';
        $this->data['reactivate_url'] = 'admin/user/reactivate';

        $this->data['admin_email'] = $this->data['user_data']->email;


        /* Load Template */

        $this->template->admin_render('admin/users/admin/index', $this->data);

    }


    public function getRawData_all_admin()
    {

        $data = $_REQUEST;

        $data['user_type'] = $this->data['user_data']->user_type;

        $data = $this->users->getData($data);

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));

    }

    public function getRawData_all_admin_deactivated()
    {

        $data = $_REQUEST;

        $data['user_type'] = $this->data['user_data']->user_type;

        $data = $this->users->getDeletedUsersAdmin($data);

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data[0]));

    }


    public function add()

    {

        $this->load->model('admin/companies');

        /* Title Page :: Common */

        $this->page_title->push(lang('users_register'));

        $this->data['pagetitle'] = $this->page_title->show();


        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('users_register'), 'admin/client/user/add');


        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/user/store';


        if ($this->data['user_data']->user_type == 'a'):

            /* Companies */

            $companies = $this->companies->getData();

            $this->data['companies_option'] = '<option>None</option>';

            foreach ($companies[0]->data as $company) {

                $this->data['companies_option'] .= '<option value="' . $company->company_id . '">' . $company->company_id . ' -- ' . $company->name . '</option>';

            }

        else:

            /* Outlets */

            $this->load->model('admin/outlets');

            $companies = $this->outlets->getData();

            $this->data['companies_option'] = '<option>None</option>';

            foreach ($companies[0]->data as $company) {

                $this->data['companies_option'] .= '<option value="' . $company->outlet_id . '">' . $company->outlet_id . ' -- ' . $company->name . '</option>';

            }

        endif;

        /* Load Template */

        $this->template->admin_render('admin/users/add', $this->data);

    }


    public function store()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->users->store($data);

            redirect('admin/client/users', 'location', 301);

        }

    }


    public function edit()

    {

        /* Title Page :: Common */

        $this->page_title->push(lang('users_edit_user'));

        $this->data['pagetitle'] = $this->page_title->show();


        /* Breadcrumbs :: Common */

        $this->breadcrumbs->unshift(1, lang('users_edit_user'), 'admin/client/user/edit');


        /* Breadcrumbs */

        $this->data['breadcrumb'] = $this->breadcrumbs->show();


        /* Data */

        $this->data['error'] = NULL;

        $this->data['charset'] = 'utf-8';

        $this->data['form_url'] = 'admin/user/update';


        /* Load Template */

        $this->template->admin_render('admin/users/edit', $this->data);

    }


    public function update()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;

        } else {

            $data = $_REQUEST;
            $this->users->change($data);
            if ($data['user_type'] == 'a') redirect('admin/system/users', 'location', 301);
            else redirect('admin/client/users', 'location', 301);
        }

    }

    public function inactive_user()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('user_id', 'User', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->users->trash($data);

            redirect(isset($_REQUEST['admin']) ? 'admin/system/users' : 'admin/client/users', 'location', 301);

        }

    }

    public function reactive_user()
    {

        /* Load form helper */

        $this->load->helper(array('form'));


        /* Load form validation library */

        $this->load->library('form_validation');


        /* Set validation rule for name field in the form */

        $this->form_validation->set_rules('user_id', 'User', 'required');


        if ($this->form_validation->run() == FALSE) {

            header("Location: {$_SERVER['HTTP_REFERER']}");

            exit;

        } else {

            $data = $_REQUEST;

            $this->users->restore($data);

            redirect(isset($_REQUEST['admin']) ? 'admin/system/users' : 'admin/client/users', 'location', 301);

        }

    }


    //get company outlets

    public function getOutlets()
    {

        $this->load->model('admin/outlets');


        $data = $_REQUEST;

        /* Companies */

        $outlets = $this->outlets->getDataAllOptions($data);

        $data = '<option>None</option>';

        foreach ($outlets[0] as $outlet) {

            $data .= '<option value="' . $outlet->outlet_id . '">' . $outlet->outlet_id . ' -- ' . $outlet->name . '</option>';

        }


        $this->output->set_content_type('application/html')
            ->set_output($data);

    }

}

