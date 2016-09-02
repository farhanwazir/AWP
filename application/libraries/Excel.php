<?php /* */

/**
 * Created by PhpStorm.
 * User: Seejee
 * Date: 8/11/2016
 * Time: 1:45 AM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . "/third_party/PHPExcel/PHPExcel.php";

class Excel extends PHPExcel
{
    public function __construct()
    {
        parent::__construct();
    }
}