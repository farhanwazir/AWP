<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_api_response')) {
    function do_api_call($endpoint = NULL, $request = [], $response_callback = false, $error_callback = false)
    {

        if (!($request = is_array($request) ? array_merge(
            ['data' => NULL, 'header' => NULL, 'post' => true, 'return' => true, 'timeout' => 29, 'length' => 0],
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
            if (is_callable($error_callback)) {
                $error_callback(curl_error($ch));
                return false;
            }
            return ['header' => 0, 'error' => curl_error($ch)];
        }

        curl_close($ch);

        if (is_callable($response_callback)) {
            $response_callback($result);
            return true;
        }

        return ['header' => 200, 'body' => $result];
    }
}

