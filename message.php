<?php
	$conn = mysqli_connect("localhost","root","");
	
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_select_db($conn, "CheapoMail");
	
	
	$sql = "SELECT id FROM Message";
	$qry = mysqli_query($conn, $sql);
	
	$num = mysqli_num_rows($qry);
	
	$id = 1000 + $num;
	$body = "Hungry and wanting some pizza, Wanna come?";
	$subject = "Pizza";
	$user = "PennyPPPP";
	
	$splitRecip = array("Dennis123","HakunaMatata", "SassyCat", "Magney","OriginalBolt");
	
	
	$query = "SELECT username, id FROM User WHERE username='".$user."'";
	$sqlQuery = mysqli_query($conn, $query);
	
	$row = mysqli_fetch_array($sqlQuery);
	
	$userID = $row['id'];
	
	
	$newQuery = "SELECT username, id FROM User";
	$newSql = mysqli_query($conn, $newQuery);
	
	
	$recipIDs = '';
	$tempUNs = array();
	$tempIDs = array();
	
	while ($row2 = mysqli_fetch_array($newSql)){
		$tempUNs[] = $row2['username'];
		$tempIDs[] = $row2['id'];
	}
	
	for ($x = 0; $x < count($splitRecip); $x++){
		for ($k = 0; $k < count($tempIDs); $k++){
			if ((strcmp($tempUNs[$k],$splitRecip[$x])) == 0 ) {
				$recipIDs = $recipIDs . $tempIDs[$k] . ",";
			}
		}
	}
	
	
	echo $recipIDs;
	
	$update = "INSERT INTO Message (id, body, subject, user_id, recipient_ids) VALUES ('$id','$body', '$subject', '$userID', '$recipIDs')";
	$updateQuery = mysqli_query($conn, $update);

	if (!$query) {
		echo "False";
	} else {
		echo "True";
	}
	
	
	mysqli_close($conn);
?>