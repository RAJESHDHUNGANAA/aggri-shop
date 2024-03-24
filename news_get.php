<?php
/*********************

**** CPanel ******************
*********/


/* Following code will retrieve table values */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';
	
// connecting to db

	
// get all jobs
$result = mysqli_query($conn,"SELECT * FROM news_list");

if (mysqli_num_rows($result))
{
	$response["clients"] = array();
	while($Allclients = mysqli_fetch_array($result))
	{
		// temp user array
		$clients = array();
		$clients["client_id"] = $Allclients["client_id"];
		$clients["cname"] = $Allclients["cname"];
		$clients["cimage"] = $Allclients["cimage"];
		$clients["category"] = $Allclients["category"];
		array_push($response["clients"],$clients);
	}	
	$response["success"] = 1;
	echo json_encode($response);
} 
else
{
	$response["success"] = 0;
	echo json_encode($response);
}
?>