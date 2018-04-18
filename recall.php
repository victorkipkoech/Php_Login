<?php
$data['message']='Dialog Idea mart 
Welcome...';
$data["applicationId"]=$input["applicationId"];
$data["password"]="password";
$data["version"]="1.0";
$data["sessionId"]=$input["sessionId"];
$data["ussdOperation"]="mt-cont";
$data["destinationAddress"]=$input["sourceAddress"];
$data["encoding"]="440";
$data["chargingAmount"]="5";

$json_string =json_encode($data);
$ideamartURL ="http://localhost:7000/ussd/send";

$ch =curl_init($ideamartURL);

$option =array(
CURLOPT_RETURNTRANSFER=>true,
CURLOPT_HTTPHEADER=>array('Content-type: application/json');
CURLOPT_POSTFIELDS=>$json_string
);
curl_setopt($ch, $option);
$result =curl_exec($ch);
?>