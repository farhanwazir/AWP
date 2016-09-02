<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Chips extends Api_model
{
    private $endpoint;
    private $endpoint_sales;
    private $endpoint_stock_all;
    private $endpoint_master_history, $endpoint_master_current, $endpoint_master_add_balance;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/admin/list/chip/sales';
        $this->endpoint_master_current = 'api/admin/master/stock';
        $this->endpoint_company_history = 'api/company/master/stock/history';
        $this->endpoint_company_current = 'api/company/master/stock';
        $this->endpoint_company_add_stock = 'api/admin/assign/products/distributor';
        $this->endpoint_outlet_history = 'api/outlet/master/stock/history';
        $this->endpoint_outlet_current = 'api/outlet/master/stock';
        $this->endpoint_outlet_add_stock = 'api/assign/products/outlet';
        $this->endpoint_company_conciliation = 'api/chip/conciliation/report';
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

    public function getMasterStock($data = [])
    {
        return $this->get($this->endpoint_master_current, $data);
    }

    public function getCompanyMasterHistory($data = [])
    {
        return $this->get($this->endpoint_company_history, $this->furnishParameters($data));
    }

    public function getCompanyMasterStock($data = [])
    {
        return $this->get($this->endpoint_company_current, $data);
    }

    public function addToCompanyMasterStock($data = [])
    {
        return $this->insert($this->endpoint_company_add_stock, $data);
    }

    public function getOutletMasterHistory($data = [])
    {
        return $this->get($this->endpoint_outlet_history, $this->furnishParameters($data));
    }

    public function getOutletMasterStock($data = [])
    {
        return $this->get($this->endpoint_outlet_current, $data);
    }

    public function addToOutletMasterStock($data = [])
    {
        return $this->insert($this->endpoint_outlet_add_stock, $data);
    }

    public function getCompanyConciliation($data = [])
    {
        return $this->get($this->endpoint_company_conciliation, $this->furnishParameters($data));

    }
}