<?php /* */

/**
 * Created by PhpStorm.
 * User: Seejee
 * Date: 8/4/2016
 * Time: 5:42 PM
 */

require_once(APPPATH . 'libraries/auricell/Auricell_service.php');

class Api_model extends Auricell_service
{

    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function insert($endpoint = NULL, $data = NULL)
    {
        return !$this->get($endpoint, $data) ? false : true;
    }

    public function get($endpoint = NULL, $data = [])
    {
        if ($endpoint == NULL) return false;
        $token = $this->CI->session->secret ? $this->CI->session->secret : false;

        $pagination_param = $this->checkIfPagination($data);
        $endpoint = $endpoint . $pagination_param;

        $call = parent::call($endpoint, $data, $token);

        if ($call->status == 1)
            return $call->result;

        $this->CI->session->set_flashdata('message', $call->message);

        if (isset($call->errors)) $this->CI->session->set_flashdata('errors', $call->errors);

        return false;

    }

    private function checkIfPagination($data)
    {
        $page = 0;
        if (isset($data['offset'])) $page = ($data['offset'] / $data['limit']) + 1;
        return ($page == 0) ? '?' : '?page=' . $page;
    }

    public function update($endpoint = NULL, $data = NULL)
    {
        return !$this->get($endpoint, $data) ? false : true;
    }

    public function delete($endpoint = NULL, $data = NULL)
    {
        return !$this->get($endpoint, $data) ? false : true;
    }
}