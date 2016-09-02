<?php defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'core/Api_model.php');


class Company extends Api_model
{


    private $endpoint, $endpoint_store, $endpoint_update;


    public function __construct()

    {

        parent::__construct();

        $this->endpoint = 'api/company/star/sales/report'; //sales report

    }


    public function getData($data = [])
    {

        return $this->get($this->endpoint, $this->furnishParameters($data));

    }


    public function furnishParameters($data)
    {

        if (array_key_exists('start_date', $data)) {

            $data['from_date'] = $data['start_date'];

            $data['to_date'] = $data['end_date'];

            unset($data['start_date']);

            unset($data['end_date']);

        }

        return $data;

    }


}

