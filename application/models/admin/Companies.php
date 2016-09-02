<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/Api_model.php');

class Companies extends Api_model {

    private $endpoint, $endpoint_store, $endpoint_update;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/admin/list/companies';
        $this->endpoint_trashed = 'api/admin/list/companies/trashed';
        $this->endpoint_store = 'api/admin/register/company';
        $this->endpoint_update = 'api/edit/company';
        $this->endpoint_delete = 'api/delete/company';
        $this->endpoint_restore = 'api/restore/deleted/company';
    }


    public function getData($data = []){
        return $this->get($this->endpoint, $data);
    }

    public function getTrashed($data = []){
        return $this->get($this->endpoint_trashed, $data);
    }

    public function store($data = []){
        return $this->insert($this->endpoint_store, $data);
    }

    public function change($data = []){
        return $this->update($this->endpoint_update, $data);
    }

    public function remove($data = []){
        return $this->get($this->endpoint_delete, $data);
    }

    public function reactive($data = []){
        return $this->get($this->endpoint_restore, $data);
    }

}
