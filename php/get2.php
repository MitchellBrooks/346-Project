<?php
		include("connect.php");

		$poll_id = $_GET["id"]; // get id from URL
		
		$sql = "SELECT * FROM polls WHERE poll_id=" . $poll_id;	// get info about poll from database
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$image = $resAr[10];
		
		header("Content-type: image/jpeg");
		
		echo $image;

?>