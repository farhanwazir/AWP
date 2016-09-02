<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Outlets extends Api_model
{
    private $endpoint, $endpoint_store, $endpoint_update, $endpoint_all_for_options;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/list/company/outlets';
        $this->endpoint_store = 'api/register/outlet';
        $this->endpoint_update = 'api/edit/outlet';
        $this->endpoint_all_for_options = 'api/list/company/outlets/no/paging';
    }

    public function getData($data = [])
    {
        return $this->get($this->endpoint, $data);
    }

    public function store($data = [])
    {
        return $this->insert($this->endpoint_store, $data);
    }

    public function change($data = [])
    {
        return $this->update($this->endpoint_update, $data);
    }

    public function getDataAllOptions($data = [])
    {
        return $this->get($this->endpoint_all_for_options, $data);
    }
}
