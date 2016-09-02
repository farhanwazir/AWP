<?php /* */

/**
 * Created by PhpStorm.
 * User: Seejee
 * Date: 8/4/2016
 * Time: 2:58 AM
 */
class Auricell_service
{

    public function __construct()
    {
        //
    }

    public function call($endpoint = NULL, $fields, $auth_token = NULL, $response_callback = false, $error_callback = false)
    {
        if ($auth_token === NULL) return 0;

        $fields_string = '';

        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        $request = ['data' => $fields_string, 'header' => [
            "authorization: Bearer " . $auth_token,
            "cache-control: no-cache"
        ], 'length' => count($fields)];

        $response = $this->do_api_call($this->create_api_endpoint($endpoint), $request);

        $result = $this->transform_response($response['body']);


        if ($response['header'] == 200) {
            //if call successful and server reject request then it return as error
            if (isset($result->status) && $result->status == 0)
                if (is_callable($error_callback)) {
                    $error_callback([$result->message]);
                    return false;
                }

            $callback_result = $result->result;
            if (is_callable($response_callback)) {
                $response_callback($callback_result);
                return true;
            }

        } else {
            if (is_callable($error_callback)) {
                $error_callback($result);
                return false;
            }
        }

        return $result;
    }

    private function do_api_call($endpoint = NULL, $request = [], $response_callback = false, $error_callback = false)
    {

        if (!($request = is_array($request) ? array_merge(
            ['data' => NULL, 'header' => NULL, 'post' => true, 'return' => true, 'timeout' => 25, 'length' => 0],
            $request) : false)
        ) return $request;

        $ch = curl_init($endpoint);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $request['return']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $request['timeout']);
        curl_setopt($ch, CURLOPT_POST, $request['length']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request['data']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request['header']);
        $result = curl_exec($ch);

        if (!$result) {
            $error = curl_error($ch);
            curl_close($ch);
            if (is_callable($error_callback)) {
                $error_callback($error);
                return false;
            }
            /*TODO change array to string because it will giving error to decode in json*/
            return ['header' => 0, 'body' => '{"status": 0, "errors": [' . $error . ']}'];
        }
        curl_close($ch);

        if (is_callable($response_callback)) {
            $response_callback($result);
            return true;
        }

        return ['header' => 200, 'body' => $result];
    }

    public function create_api_endpoint($suffix = false)
    {
        if (!$suffix) return false;
        $CI = &get_instance();
        $host = $CI->config->item('api_endpoint');
        return $host . $suffix;
    }

    private function transform_response($response)
    {
        return json_decode($response);
    }

    public function set_host($host)
    {
        $this->host;
    }

    public function get_host()
    {
        return $this->host;
    }

    private function get_error_massage($err_code)
    {
        return array_key_exists($err_code, auricell_all_errors()) ? auricell_get_error_code($err_code) : false;
    }

    private function all_errors()
    {
        return [
            0 => 'Authentication token required',
            1 => 'End point should not be null',
        ];
    }

    private function get_error_code($code)
    {
        return auricell_all_errors()[$code];
    }

}