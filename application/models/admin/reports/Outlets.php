<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Outlets extends Api_model
{
    private $endpoint; //for all stars    private $endpoint_individual_sales; //for individual star sales    private $endpoint_all_sales; //for all stars sales    public function __construct()    {        parent::__construct();        $this->endpoint = 'api/admin/list/outlets';        $this->endpoint_all_sales = 'api/admin/list/outlets_sales';        $this->endpoint_individual_sales = 'api/admin/list/outlet/sales';    }    public function getData($data = [])    {        if (array_key_exists('start_date', $data)) {            $data['from_date'] = $data['start_date'];            $data['to_date'] = $data['end_date'];            unset($data['star_date']);            unset($data['end_date']);        }        if (array_key_exists('outlet_id', $data)) return $this->get($this->endpoint_individual_sales, $data);        return $this->get($this->endpoint_all_sales, $data);    }    public function getAllStarsList()    {        $data = [];        return $this->get($this->endpoint, $data);    }}
