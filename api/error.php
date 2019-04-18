<?php

$ARR_ERROR = Array();

$ARR_ERROR["4001"] = Array("result"=>"4001", "error"=> "Required parameter missing");
$ARR_ERROR["4002"] = Array("result"=>"4002", "error"=> "Required JSON Body missing");
$ARR_ERROR["4003"] = Array("result"=>"4003", "error"=> "JSON Body Error");	
$ARR_ERROR["4004"] = Array("result"=>"4004", "error"=> "Required Key missing in JSON Body");
$ARR_ERROR["4005"] = Array("result"=>"4005", "error"=> "Invalid Key value JSON Body");
$ARR_ERROR["4006"] = Array("result"=>"4006", "error"=> "Forbidden. Not privileged to access data");

$ARR_ERROR["1001"] = Array("result"=>"1001", "error"=> "Authentication failed");
$ARR_ERROR["1002"] = Array("result"=>"1002", "error"=> "Requested Data not found");
$ARR_ERROR["1003"] = Array("result"=>"1003", "error"=> "Mailing Error");
$ARR_ERROR["1004"] = Array("result"=>"1004", "error"=> "Data Error");

$ARR_ERROR["5001"] = Array("result"=>"5001", "error"=> "Invalid HTTP Request");
$ARR_ERROR["5001"] = Array("result"=>"5002", "error"=> "System Settings/DB Setup Issues");
?>