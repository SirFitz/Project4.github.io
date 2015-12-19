<?php
	$conn = mysqli_connect("localhost","root","");

	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_select_db($conn, "CheapoMail");
	

	$id = $_REQUEST['id'];
	$firname = $_REQUEST['firname'];
	$lasname = $_REQUEST['lasname'];
	$pass = $_REQUEST['pass'];
	$uname = $_REQUEST['uname'];
	
	if (((strlen($pass)) < 8) && (!preg_match("/[A-Z]+.[0-9]+.[a-z]+/", $pass))) 
	{
		echo "False";
	} else {
	// Create database
		$sql = "INSERT INTO User (id, first_name, last_name, password, username) VALUES ('$id','$firname', '$lasname', '$pass', '$uname')";
		$query = mysqli_query($conn, $sql);

		if (!$query) {
			echo "False";
		} else {
			echo "True";
		}
	}
	mysqli_close($conn);
?>