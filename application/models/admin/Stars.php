<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Stars extends Api_model
{
    private $endpoint, $endpoint_store, $endpoint_update;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/admin/list/stars';
        $this->endpoint_store = 'api/admin/register/star';
        $this->endpoint_update = 'api/edit/star';
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
}
