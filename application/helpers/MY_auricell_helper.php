<?php /* */
defined('BASEPATH') OR exit('No direct script access allowed');


function auricell_call($endpoint = NULL, $fields, $auth_token = NULL, $response_callback, $error_callback)
{
    //if($auth_token == NULL || !$auth_token) return 0;

    $fields_string = '';

    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    $request = ['data' => $fields_string, 'header' => [
        "authorization: Bearer " . $auth_token,
        "cache-control: no-cache"
    ], 'length' => count($fields)];

    $response = do_api_call(create_api_endpoint($endpoint), $request);

    if ($response['header'] == 200) {
        //received raw string from api_helper
        $response = auricell_transform_response($response['body']);

        //if call successful and server reject request then it return as error
        if ($response->status == 0)
            if (is_callable($error_callback)) {
                $error_callback([$response->message]);
                return false;
            }

        $result = $response['result'];
        if (is_callable($response_callback)) {
            $response_callback(auricell_transform_response($result));
            return true;
        }

        return auricell_transform_response($result);

    } else {
        $error = [$response['error']];
        if (is_callable($error_callback)) {
            $error_callback($error);
            return false;
        }

        return $error;
    }
}

function create_api_endpoint($suffix = false)
{
    if (!$suffix) return false;
    $CI =& get_instance();
    return $CI->config->item('api_endpoint') . $suffix;
}


function auricell_transform_response($response)
{
    return json_decode($response);
}

function get_error_massage($err_code)
{
    return array_key_exists($err_code, auricell_all_errors()) ? auricell_get_error_code($err_code) : false;
}

function auricell_all_errors()
{
    return [
        0 => 'Authentication token required',
        1 => 'End point should not be null',
    ];
}

function auricell_get_error_code($code)
{
    return auricell_all_errors()[$code];
}

//Example
/*auricell_call('api/authenticate', [
                    'email' => $this->input->post('identity'),
                    'password' => $this->input->post('password')
                ], false, function($response){
                    print_r($response);
                }, function($response){
                    print_r ($response);
                });

                exit();*/