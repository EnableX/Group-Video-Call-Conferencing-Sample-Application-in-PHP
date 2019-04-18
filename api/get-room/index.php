<?php

// Author: Subrat 
// Date: Apr 17, 2019
//
// GET api/get-room/#ROOM_ID#
// To get information of a given room
//
// URL Pattern: ROOM-ID appended at the end of URL   
// Raw Body: No
// Return: Returns Room Meta 
// 
 
require("../config.php");
require("../error.php");

header("Content-type: application/json");

if($_SERVER['REQUEST_METHOD'] != 'GET') {
	$error = $ARR_ERROR["5001"];					// JSON Format issues
	$error["desc"] = "HTTP GET Requests only";
	$error = json_encode($error);
	print $error;
	exit;
}


/* Process Query String */
 
$roomId		= $_GET['roomId'];
 
if ($roomId)
{	
	$ret = GetRoom($roomId);
	if ($ret)
	{	print $ret;
		exit;
	}	
}
else
{	 		
	$error = $ARR_ERROR["4004"];					// Required JSON Key missing
	$error["desc"] = "Failed to get roomId from URL";	
	$error = json_encode($error);
	print $error;
	exit;
}
 

function  GetRoom($roomId)
{	GLOBAL $ARR_ERROR;

	 
	
	/* Prepare HTTP Post Request */

	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
	);

	/* CURL POST Request */

	$ch = curl_init(API_URL."/rooms/". $roomId );
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, false);
	$response = curl_exec($ch);

	curl_close($ch);
	 
	return $response;

}

?> 