<?php
	$conn = mysqli_connect("localhost","root","");
	
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_select_db($conn, "CheapoMail");
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	if (((strlen($password)) < 8) && (!preg_match("/[A-Z]+.[0-9]+.[a-z]+/", $password))) 
	{
		echo("Incorrect password");
	} else {
		$adminQuery = "SELECT username, password FROM user LIMIT 1";
		$adminResult = mysqli_query($conn, $adminQuery);
		
		$row = mysqli_fetch_array($adminResult);
		
		$adminName = $row['username'];
		$adminPass = $row['password'];
		
		
		if (((strcmp($username, $adminName)) == 0 ) && ((strcmp($password, $adminPass)) == 0)){
			echo 0;
		} else {
			$query = "SELECT username, password FROM user WHERE username='".$username."' AND password='".$password."'";
			$result = mysqli_query($conn, $query);
			
			if (!$result){
				die ("Query Failed". mysqli_error($conn));
			}
			
			$rowNum = mysqli_num_rows($result);
			if ($rowNum == 1){
				echo "True";
			}
			else{
				echo "False";
			}
		}
	}
	mysqli_close($conn);
?>