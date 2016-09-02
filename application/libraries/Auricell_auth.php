<?php /* */

/**
 * Created by PhpStorm.
 * User: Seejee
 * Date: 8/4/2016
 * Time: 3:16 AM
 */
class Auricell_auth
{
    protected $attempts = 0;
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //service library
        $this->CI->load->library('auricell/Auricell_service');
        $this->CI->load->library('session');
    }

    public function login($username, $password, $remember = false)
    {
        $login_attempt = $this->CI->auricell_service->call('api/authenticate', ['email' => $username, 'password' => $password], false);

        if ($login_attempt->status == 1)
            return $this->login_successful($login_attempt->result);


        $this->CI->session->set_flashdata('message', $login_attempt->message);

        return false;
    }

    private function login_successful($result)
    {
        $this->CI->session->set_userdata('secret', $result->token);
        $this->CI->session->set_userdata('user_data', $result->user);
        return true;
    }

    public function logged_in()
    {
        $token = $this->CI->session->secret ? $this->CI->session->secret : false;
        $login_check = $this->CI->auricell_service->call('api/verify', [], $token);

        if (isset($login_check->status) && $login_check->status == 1) return true;


        if (isset($login_check->message)) $this->CI->session->set_flashdata('message', $login_check->message);
        else $this->CI->session->set_flashdata('message', 'Server communication error');

        return false;
    }

    public function logout()
    {
        $this->CI->session->unset_userdata('secret');
        return true;
    }
}