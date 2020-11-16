<?php
	$conn = oci_connect("merius", "password", "//localhost/orcl");
	if (!$conn) {
	   $m = oci_error();
	   echo $m['message'], "\n";
	   exit;
	}
	else {
		$sql = "select stock_name, quantity from inventory";
		$query = oci_parse($conn, $sql);
		$response = oci_execute($query);
		if (!$response) {
			$error = oci_error($conn);
			echo "Could not log you in." . $error['message'];
			exit;	
		}
		$count = oci_fetch_all($query, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
	}
	oci_close($conn);
?>