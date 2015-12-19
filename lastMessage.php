<?php
	$conn = mysqli_connect("localhost","root","");

	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_select_db($conn, "CheapoMail");
	
	$searchID = 25559;
	
	$query = "SELECT * FROM Message";
	$sql = mysqli_query($conn, $query);
	
	$tempBody = array();
	$tempSubject = array(); 
	$tempUID = array();
	$tempRecip  = array();
	$IDs = array();
	$temp = array();
	
	while ($row = mysqli_fetch_array($sql)){
		$tempBody[] = $row['body'];
		$tempSubject[] = $row['subject'];
		$tempUID[] = $row['user_id'];
		$tempRecip[] = $row['recipient_ids'];
	}
	
	
	$j = 0;
	
	$count = count($tempRecip);
	
	for ($i = 0; $i < count($tempRecip); $i++){
		$IDs = explode(",", $tempRecip[$i]);
		
		$count = count($IDs)-1;
		
		while ($j < $count){
			if ($searchID == $IDs[$j]){
				$qry = "SELECT username FROM User WHERE id='".$tempUID[$i]."'";
				$search = mysqli_query($conn, $qry);
	
				$row = mysqli_fetch_array($search);
	
				$UserName = $row['username'];
				echo "<li> From:". $UserName. "</li>";
				echo "<p> Body:" . $tempBody[$i]. "</li>";
				echo "<p> Subject:" . $tempSubject[$i] . "</p>";
			} 
			$j++;
		}
	}
	
	mysqli_close($conn);
?>
	
