<?php /* */

//argument as string
function create_date($date)
{
    $date = date_create(strtotime($date));
    return date_format($date, "d-m-Y");
}
