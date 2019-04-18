<?php

// Author: Subrat 
// Date: Apr 17, 2019
//
// POST api/create-token
// To create a Token for a given room, name, role
//
// Parameter: None 
// Raw Body: Yes
// Return: Returns Token 
// 
 
require("../config.php");
require("../error.php");

header("Content-type: application/json");

if($_SERVER['REQUEST_METHOD'] != 'POST') {
	$error = $ARR_ERROR["5001"];					// JSON Format issues
	$error["desc"] = "HTTP POST Requests only";
	$error = json_encode($error);
	print $error;
	exit;
}

/* RAW Body Parsing  */



$data = file_get_contents("php://input");

if (!$data)
{	
	$error = json_encode($ARR_ERROR["4001"]);		// JAW JSON Body missing
	print $error;
	exit;
}

$data = json_decode($data);
$json_error = json_last_error();

if ($json_error)	
{	$error = $ARR_ERROR["4003"];					// JSON Format issues
	$error["desc"] = getJSONError($json_error);
	$error = json_encode($error);
	print $error;
	exit;
}

 
if ($data->name && $data->role && $data->roomId)
{	
	$ret = CreateToken($data);
	if ($ret)
	{	print $ret;
		exit;
	}	
}
else
{	 		
	$error = $ARR_ERROR["4004"];					// Required JSON Key missing
	$error["desc"] = "JSON keys missing: name, role or roomId";	
	$error = json_encode($error);
	print $error;
	exit;
}
 

function  CreateToken($data)
{	GLOBAL $ARR_ERROR;

	/* Create Token Payload */

    $Token = Array(
		"name"			=> $data->name,
		"role"			=> $data->role,
		"user_ref"		=> $data->user_ref
		);
	 

	$Token_Payload = json_encode($Token);

	
	/* Prepare HTTP Post Request */

	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
	);

	/* CURL POST Request */

	$ch = curl_init(API_URL."/rooms/". $data->roomId . "/tokens");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $Token_Payload);
	$response = curl_exec($ch);

	curl_close($ch);
	 
	return $response;

}

?> 