<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Dashboard  extends Api_model
{
    private $endpoint_airtime_stats;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint_airtime_stats = 'api/get/consumed/available';
    }

    public function getAirtimeStats($data = [])
    {
        return $this->get($this->endpoint_airtime_stats, $data);
    }

}