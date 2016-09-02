<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Users extends Api_model
{
    private $endpoint, $endpoint_store, $endpoint_update;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/list/all/users';
        $this->endpoint_admin_users = 'api/admin/list/admin/users';
        $this->endpoint_company_users = 'api/admin/list/company/users';
        $this->endpoint_outlet_users = 'api/admin/list/outlet/users';
        $this->endpoint_star_users = 'api/admin/list/stars';
        $this->endpoint_admin_user_store = 'api/admin/register';
        $this->endpoint_admin_user_update = 'api/edit/admin/user';
        $this->endpoint_company_user_store = 'api/admin/register/company/user';
        $this->endpoint_company_user_update = 'api/edit/company/user';
        $this->endpoint_outlet_user_store = 'api/register/outlet/user';
        $this->endpoint_outlet_user_update = 'api/edit/outlet/user';
        $this->endpoint_star_user_store = 'api/admin/register/company/user';
        $this->endpoint_star_user_update = 'api/edit/company/user';
    }

    public function getData($data = [])
    {
        return $this->get($this->getEndPoint($data), $data);
    }

    public function getEndPoint($data = [])
    {
        if (isset($data['user_type']) && $data['user_type'] == 'dc') $output = $this->endpoint_company_users; elseif (isset($data['user_type']) && $data['user_type'] == 'do') $output = $this->endpoint_outlet_users;
        elseif (isset($data['user_type']) && $data['user_type'] == 'r') $output = $this->endpoint_star_users;
        elseif (isset($data['user_type']) && $data['user_type'] == 'a') $output = $this->endpoint_admin_users;
        else $output = $this->endpoint;
        return $output;
    }

    public function store($data = [])
    {
        return $this->insert($this->getStoreEndPoint($data), $data);
    }

    public function getStoreEndPoint($data = [])
    {
        if (isset($data['user_type']) && $data['user_type'] == 'dc') $output = $this->endpoint_company_user_store; elseif (isset($data['user_type']) && $data['user_type'] == 'do') $output = $this->endpoint_outlet_user_store;
        elseif (isset($data['user_type']) && $data['user_type'] == 'r') $output = $this->endpoint_star_user_store;
        elseif (isset($data['user_type']) && $data['user_type'] == 'a') $output = $this->endpoint_admin_user_store;
        return $output;
    }

    public function change($data = [])
    {
        return $this->update($this->getChangeEndPoint($data), $data);
    }

    public function getChangeEndPoint($data = [])
    {
        if (isset($data['user_type']) && $data['user_type'] == 'dc') $output = $this->endpoint_company_user_update; elseif (isset($data['user_type']) && $data['user_type'] == 'do') $output = $this->endpoint_outlet_user_update;
        elseif (isset($data['user_type']) && $data['user_type'] == 'r') $output = $this->endpoint_star_user_update;
        elseif (isset($data['user_type']) && $data['user_type'] == 'a') $output = $this->endpoint_admin_user_update;
        return $output;
    }
}
