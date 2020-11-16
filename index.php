<?php
session_start();
//connect to DB
$conn = oci_connect("merius", "password", "//localhost/orcl");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
	//query
	$sql = "select user_id, money from user_db";
	$query = oci_parse($conn, $sql);
	$response = oci_execute($query);
	if (!$response) {
		$error = oci_error($conn);
		echo "Could not log you in." . $error['message'];
		exit;	
	}
	//functie de afisare in UI
	$count = oci_fetch_all($query, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
	/*for ($i = 0; $i < $count; $i++) {
		echo  '' . $result[$i]['MONEY'] . ' ';
	}
	*/
	$_SESSION['user_id']=$result[0]['USER_ID'];
	$_SESSION['money']=$result[0]['MONEY'];
}
oci_close($conn);
?>