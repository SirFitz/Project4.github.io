<?php
	$conn = mysqli_connect("localhost","root","");
	
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_select_db($conn, "CheapoMail");
	
	$query = "SELECT username FROM User";
	$sql = mysqli_query($conn, $query);
	
	while ($row = mysqli_fetch_array($sql)) {
		echo "<li>".$row['username']."</li>";
	}
	
	mysqli_close($conn);
?>