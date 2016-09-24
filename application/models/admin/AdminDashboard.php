<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class AdminDashboard extends Api_model
{
    private $endpoint_airtime_stats, $endpoint_airtime_master_current, $endpoint_airtime_server_current;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint_airtime_stats = 'api/get/consumed/available';
        $this->endpoint_airtime_master_current = 'api/admin/master/balance';
        $this->endpoint_airtime_server_current = 'api/admin/server/balance'; //It is for AT&T balance
    }

    public function getAirtimeStats($data = [])
    {
        return $this->get($this->endpoint_airtime_stats, $data);
    }

    public function getMasterBalance($data = [])
    {
        return $this->get($this->endpoint_airtime_master_current, $data);
    }

    public function getServerBalance($data = [])
    {
        return $this->get($this->endpoint_airtime_server_current, $data);
    }
}
