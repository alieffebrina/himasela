<?php defined('BASEPATH') OR exit('No direct script access allowed');
{
    $key='5fa0891178423f215b2b5c082522b61d617adab5e8a2969b'; //this is demo key please change with your own key
    $url='http://116.203.92.59/api/send_message';
    $data = array(
      "phone_no"=> '+6283857913752',
      "key"     =>$key,
      "message" =>'DEMO AKUN WOOWA. tes woowa api v3.0 mohon di abaikan'
    );
    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 360);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string))
    );
    echo $res=curl_exec($ch);
    curl_close($ch);
    ?>