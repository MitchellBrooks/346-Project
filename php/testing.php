<?php
	include ("connect.php");
	echo "The purpose of this application is to provide testing of database checking, insertion, and retrieval for C346 website project. <br>";
	echo "<br>";
	echo "Functionalities to be tested include:";
	echo "<br> - Creating user accounts";
	echo "<br> - Creating new polls";
	echo "<br> - Voting";
	echo "<br> - Poll retrieval";
	echo "<br><br><br>";
	
	echo "--------------------------------------------------Testing Account Creation---------------------------------------------------<br>";

	
	echo "Creating 10 new user accounts with the password \"password\"...";
	echo "<br><br>";
	$password = "password";
	$email = "\"\" ";
	for($i = 0; $i < 10; $i++){
			$username = "user" . $i;
			$sql1 = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $sql1);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount >0) {
    				echo "Error: Username " . $username . " already taken. <br>";
			} else {
    		
            		$sql = "INSERT INTO users (username,pass,email) VALUES ('$username','$password','$email')";
               
            		mysqli_select_db($conn, $dbname);
            			if (mysqli_query($conn, $sql)) {
    					echo "New account created successfully. <br>";
						echo "username = " . $username . ", password = " . $password . ", email = " . $email;
						echo "<br><br>";
						}
			}						
	}
	echo "<br><br>";
	echo "Creating 3 new user accounts with existing usernames... <br><br>";
		for($i = 0; $i < 3; $i++){
			$username = "user" . $i;
			$sql1 = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $sql1);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount >0) {	// if username is taken
    				echo "Error: Username " . $username . " already taken. <br>";
			} else {
    		
            		$sql = "INSERT INTO users (username,pass,email) VALUES ('$username','$password','$email')";
               
            		mysqli_select_db($conn, $dbname);
            			if (mysqli_query($conn, $sql)) {
    					echo "New account created successfully. <br>";
						echo "username = " . $username . ", password = " . $password . ", email = " . $email;
						echo "<br><br>";
						}
			}						
	}
	
		echo "----------------------------------------------------------------------------------------------------------------------------------<br>";
		echo "<br>";
		echo "--------------------------------------------------Testing Poll Creation------------------------------------------------------<br>";
		echo "Note: Tests that text fields are completed.";	
		echo "<br>";
		echo "<br>";
		echo "With all fields completed: <br>";
		$title = "title";
		$option1 = "option 1";
		$option2 = "option 2";
		$author  = "author";
		
		if($title != "" && $option1 != "" && $option2 != "" && $author != "")
		{
			$sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two) VALUES ('$title','$author','$option1','$option2')";
		            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
    		echo "New poll created successfully.<br>";
			echo "Title = " . $title . ", author =  " . $author . ", Option 1 = " . $option1 . ", Option 2 = " . $option2 . "<br>";
			
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}			
		}else{
			echo "Error: Missing required field(s).";
		}
		
		echo "<br>";
		echo "With Title absent:<br>";		
		$title = "";
		$option1 = "option 1";
		$option2 = "option 2";
		$author  = "author";
		
		if($title != "" && $option1 != "" && $option2 != "" && $author != "")
		{
			$sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two) VALUES ('$title','$author','$option1','$option2')";
		            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
    		echo "New poll created successfully.<br>";
			echo "Title = " . $title . ", author =  " . $author . ", Option 1 = " . $option1 . ", Option 2 = " . $option2 . "<br>";
			
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}			
		}else{
			echo "Error: Missing required field(s).";
		}
		
		
		echo "<br><br>";
		echo "With Option 1 absent:<br>";		
		$title = "title";
		$option1 = "";
		$option2 = "option 2";
		$author  = "author";
		
		if($title != "" && $option1 != "" && $option2 != "" && $author != "")
		{
			$sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two) VALUES ('$title','$author','$option1','$option2')";
		            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
    		echo "New poll created successfully.<br>";
			echo "Title = " . $title . ", author =  " . $author . ", Option 1 = " . $option1 . ", Option 2 = " . $option2 . "<br>";
			
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}			
		}else{
			echo "Error: Missing required field(s).";
		}
		
		echo "<br><br>";
		echo "With Option 2 absent:<br>";		
		$title = "title";
		$option1 = "option1";
		$option2 = "";
		$author  = "author";
		
		if($title != "" && $option1 != "" && $option2 != "" && $author != "")
		{
			$sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two) VALUES ('$title','$author','$option1','$option2')";
		            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
    		echo "New poll created successfully.<br>";
			echo "Title = " . $title . ", author =  " . $author . ", Option 1 = " . $option1 . ", Option 2 = " . $option2 . "<br>";
			
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}			
		}else{
			echo "Error: Missing required field(s).";
		}
		
		echo "<br><br>";
		echo "With  Author absent:<br>";		
		$title = "title";
		$option1 = "option1";
		$option2 = "option2";
		$author  = "";
		
		if($title != "" && $option1 != "" && $option2 != "" && $author != "")
		{
			$sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two) VALUES ('$title','$author','$option1','$option2')";
		            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
    		echo "New poll created successfully.<br>";
			echo "Title = " . $title . ", author =  " . $author . ", Option 1 = " . $option1 . ", Option 2 = " . $option2 . "<br>";
			
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}			
		}else{
			echo "Error: Missing required field(s).";
		}
		echo "<br>";
		echo "----------------------------------------------------------------------------------------------------------------------------------<br>";
		echo "<br>";
		echo "--------------------------------------------------Testing Voting--------------------------------------------------------------<br>";
			echo "User votes on option 1 of a poll...<br>";
			$newId = "user1";
			$sql = "SELECT * FROM votes WHERE poll_id='$poll_id' and username_id='$newId'";	//sql checks if user has voted on this poll
			$result = mysqli_query($conn, $sql);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount > 0) {	
    				echo "User already voted";
			} else {
				$sql = "INSERT INTO votes (poll_id,username_id) VALUES ('$poll_id','$newId')";
					$sql1 = "UPDATE polls SET poll_choice_one_votes = poll_choice_one_votes + 1 WHERE poll_id='$poll_id'";
				if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
    					echo "Voted successfully";
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
			}
			echo "<br><br>";
			echo "User votes on option 2 of the same poll...<br>";
			$newId = "user1";
			$sql = "SELECT * FROM votes WHERE poll_id='$poll_id' and username_id='$newId'";	//sql checks if user has voted on this poll
			$result = mysqli_query($conn, $sql);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount > 0) {	
    				echo "User already voted";
			} else {
				$sql = "INSERT INTO votes (poll_id,username_id) VALUES ('$poll_id','$newId')";
					$sql1 = "UPDATE polls SET poll_choice_two_votes = poll_choice_two_votes + 1 WHERE poll_id='$poll_id'";
				if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
    					echo "Voted successfully";
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
			}
			echo "<br><br>";
			echo "New user votes on option 1 of a poll...<br>";
			$newId = "user2";
			$sql = "SELECT * FROM votes WHERE poll_id='$poll_id' and username_id='$newId'";	//sql checks if user has voted on this poll
			$result = mysqli_query($conn, $sql);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount > 0) {	
    				echo "User already voted";
			} else {
				$sql = "INSERT INTO votes (poll_id,username_id) VALUES ('$poll_id','$newId')";
					$sql1 = "UPDATE polls SET poll_choice_one_votes = poll_choice_one_votes + 1 WHERE poll_id='$poll_id'";
				if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
    					echo "Voted successfully";
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
			}
			echo "<br><br>";
			echo "Previous user votes on option 2 of the same poll...<br>";
			$newId = "user2";
			$sql = "SELECT * FROM votes WHERE poll_id='$poll_id' and username_id='$newId'";	//sql checks if user has voted on this poll
			$result = mysqli_query($conn, $sql);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount > 0) {	
    				echo "User already voted";
			} else {
				$sql = "INSERT INTO votes (poll_id,username_id) VALUES ('$poll_id','$newId')";
					$sql1 = "UPDATE polls SET poll_choice_two_votes = poll_choice_two_votes + 1 WHERE poll_id='$poll_id'";
				if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
    					echo "Voted successfully";
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
			}
		echo "<br>";
		echo "----------------------------------------------------------------------------------------------------------------------------------<br>";
		echo "<br>";
		echo "--------------------------------------------------Testing Poll retrieval from database-------------------------------------<br>";
		echo "Traversing \"users\" table in database and pulling data to display username and id...";
		echo "<br><br>";
		$counter = 0;
		$getquery=mysqli_query($conn,"SELECT * FROM users");
			while($rows=mysqli_fetch_assoc($getquery)){
			$name=$rows['username'];
			$id=$rows['id'];
			echo "username = " . $name . "    id = " . $id;
			echo "<br>";
			$counter++;			
			}
			echo "<br>";
			echo "Table \"users\" currently holds " . $counter . " users.";

		echo "<br>";
		echo "----------------------------------------------------------------------------------------------------------------------------------<br>";


		
		
		
		
		
		


?>