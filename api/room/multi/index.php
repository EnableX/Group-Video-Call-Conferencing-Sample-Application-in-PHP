<?php
// Author: Subrat
// Date: Apr 17, 2019
//
// POST api/create-room
// To create a Conference Room in EnableX - using contact Room Infomration.
// You can update it to accept RAW body input to process Room request with variable information
//
// Parameter: None
// Raw Body: None
// Return: Returns result code with room-meta of newly created room
//

require("../../config.php");
require("../../error.php");

header("Content-type: application/json");

if($_SERVER['REQUEST_METHOD'] != 'POST') {
	$error = $ARR_ERROR["5001"];					// JSON Format issues
	$error["desc"] = "HTTP POST Requests only";
	$error = json_encode($error);
	print $error;
	exit;
}

/* In case you want to take RAW Body input - use this section */

/*
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

if ($data->owner_ref)
{
	$ret = SomeMethodToCreateRoomWithPassedJSON($data);
	if ($ret)
	{	print $ret;
		exit;
	}
}
else
{
	$error = $ARR_ERROR["4004"];					// Required JSON Key missing
	$error["desc"] = "JSON keys missing: username, password or usertype";
	$error = json_encode($error);
	print $error;
	exit;
}

*/

$ret = CreateRoom();
if ($ret)
{	print $ret;
	exit;
}



function  CreateRoom()
{	GLOBAL $ARR_ERROR;

	$random_name = rand(100000, 999999);


	/* Create Room Meta */
    $Room = [
		"name"			=> "Sample Room: ". $random_name,
		"owner_ref"		=> $random_name,
		"settings"		=> [
			"quality"		=> "SD",
			"moderators"	=> "1",
			"participants"	=> "5",
			"duration"		=> "30",
			"scheduled"		=> false,
			"auto_recording"=> false,
			"adhoc"			=> false
		]
	];

	$Room_Meta = json_encode($Room);


	/* Prepare HTTP Post Request */

	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
	);

	/* CURL POST Request */

	$ch = curl_init(API_URL."/rooms");

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $Room_Meta);
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;

}

?>
