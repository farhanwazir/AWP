<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Api_model.php');

class Portability extends Api_model
{
    private $endpoint;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = 'api/admin/list/portability/sales';
    }

    public function getData($data = [])
    {
        if (array_key_exists('start_date', $data)) {
            $data['from_date'] = $data['start_date'];
            $data['to_date'] = $data['end_date'];
            unset($data['start_date']);
            unset($data['end_date']);
        }
        return $this->get($this->endpoint, $data);
    }
}
