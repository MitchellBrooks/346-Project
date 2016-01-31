<?php include ('session.php');
	        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
	        $dbname = 'userregistration';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(!isset($login_session)){
		mysqli_close($conn); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}?>
<html>
   
   <head>
      <title>Add Poll </title>
	  
	  <link rel="stylesheet" type="text/css" href="mystyle.css">
	  
   </head>
   
   <body>
      <?php
         if(isset($_POST['add']))
         {
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
            
            	if(! get_magic_quotes_gpc() )
            	{
               		$poll_title = addslashes ($_POST['poll_title']);
               		$choice_one = addslashes ($_POST['choice_one']);
               		$choice_two = addslashes ($_POST['choice_two']);
            	}
            	else
            	{
               		$poll_title = $_POST['poll_title'];
               		$choice_one = $_POST['choice_one'];
               		$choice_two = $_POST['choice_two'];
            	}
				
		 
		 $file = $_FILES['image']['tmp_name'];
		 
		 if(!isset($file))
			 echo "Please select an image.";
		 else{
			 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			 $image_name = addslashes($_FILES['image']['name']);
			 $image_size = getimagesize($_FILES['image']['tmp_name']);
			 	 }
		 if($image_size==FALSE){
			header("Location: create_poll.php");
		 }
		 
		 $file = $_FILES['image_two']['tmp_name'];
		 
		 if(!isset($file)){
			header("Location: create_poll.php");
		 }
		 else{
			 $image_two = addslashes(file_get_contents($_FILES['image_two']['tmp_name']));
			 $image_name_two = addslashes($_FILES['image_two']['name']);
			 $image_size = getimagesize($_FILES['image_two']['tmp_name']);
			 	 }
		 if($image_size==FALSE){;
			 header("Location: create_poll.php");
		 }
	
			 
		 
		 if(!$poll_title || !$choice_one || !$choice_two || !$image || !$image_two){
			 header("refresh:3;url=create_poll.php");
			 echo "Error: please fill out all forms";			
		 }
		 else{
			  $sql = "INSERT INTO polls (poll_title,poll_author,poll_choice_one,poll_choice_two,image,name,image_two, name_two) VALUES ('$poll_title','$login_session','$choice_one','$choice_two','$image','$image_name','$image_two', '$image_name_two')";
		 
		 	
            
               
            mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT poll_id FROM polls WHERE poll_title='$poll_title'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$poll_id = $resAr[0];
		header("refresh:3;url=vote_page.php?id=" . $poll_id);
    		echo "New poll created successfully. You will be redirected in 3 seconds"; 
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}
		 }
            mysqli_close($conn);
	}
         else
         {
            ?>
            	<p class = heading>
		<font size = 20>
		<strong> Create Poll </strong>
		</font>
		</p>
               <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
                  <table class = polls width="100" border="0" cellspacing="1" cellpadding="2">
                  
                     <tr>
                        <td width="100">Poll Title</td>
                        <td><input name="poll_title" type="text" id="poll_title" size="40"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Option 1</td>
                        <td><input name="choice_one" type="text" id="choice_one" size="40"></td>								
                     </tr>
					 
					 <tr>
					 <td width = "100">Image 1 <td><input type="file" name="image"> </td>
					 </tr>
                  
                     <tr>
                        <td width="100">Option 2</td>
                        <td><input name="choice_two" type="text" id="choice_two" size="40"></td>
						
                     </tr>
                  
				     <tr>
						<td width = "100">Image 2 <td><input type="file" name="image_two"></td>
					 </tr>
				  

                  
                  </table>
				  
				  <p align = "center">
				        <input name="add" type="submit" id="add" value="Create Poll">
                        <a href="logout.php"> Logout </a>
				  </p>
				  
				  
            
            <?php
         }
      ?>
   
   </body>
</html>