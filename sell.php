<?php
	session_start();
    $conn = oci_connect("merius", "password", "//localhost/orcl");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	}
	else {
		$title=$_POST['title'];
		$price=$_POST['price'];
		$id=$_SESSION['user_id'];
		$sql = "BEGIN DELETESTOCK('$title', $price, $id); END;";
		$query = oci_parse($conn, $sql);
		$response = oci_execute($query);
		if (!$response) {
			$error = oci_error($query);
			$parse1 = explode('ORA-', $error['message']);
			$parse2 = explode(':', $parse1[1]);
			$_SESSION['msj']=$parse2[1];
		}
	}
	oci_close($conn);
	header("Location: portofolio.php");
?>