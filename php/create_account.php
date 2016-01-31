<html>
   
   <head>
      <title>Create Account</title>
	  <style>
		body{
			background-color: skyblue;
			background-image: url("clouds.jpg");
		}
		p.heading{
			background-color: white;
			width: 400px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
		table.polls{
			background-color: white;
			width: 425px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
	  </style>
   </head>
   
   <body>
      <?php 
         if(isset($_POST['submit']))
         {
		include("connect.php");
            
		if($_POST['password'] === $_POST['confirmpassword'] && $_POST['password'] != ''){ // if two password fields match AND password is not null
            		if(! get_magic_quotes_gpc() ){
               			$username = addslashes ($_POST['username']);
               			$password = addslashes ($_POST['password']);
               			$email = addslashes ($_POST['email']);
            		} else {
               			$username = $_POST['username'];
               			$password = $_POST['password'];
               			$email = $_POST['email'];
            		}

			$sql1 = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $sql1);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount >0) {	// if username is taken
				header('refresh:3;url=create_account.php');
    				echo "Username already taken. You will be redirected in 3 seconds";
			} else {
    		
            		$sql = "INSERT INTO users (username,pass,email) VALUES ('$username','$password','$email')";
               
            		mysqli_select_db($conn, $dbname);
            			if (mysqli_query($conn, $sql)) {
    					echo "New account created successfully. You will be redirected in 3 seconds";
					include('login.php');	//run login script to login user that just created account
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
    			} 
		} else {
			header('refresh:3;url=create_account.php');
			echo "Passwords do not match. You will be redirected in 3 seconds.";
		}
        	//mysqli_close($conn); 
	} else {?>
		<p class = heading>
		<font size = '20'>
		<strong> Create Account </strong>
		</font>
		</p>
            
               <form action="<?php $_PHP_SELF ?>" method="post">
                  <table class = polls width="400" border="0" cellspacing="1" cellpadding="2">
                  
                     <tr>
                        <td width="100">Userame</td>
                        <td><input name="username" type="text" id="username"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Password</td>
                        <td><input name="password" type="password" id="password"></td>
                     </tr>

                     <tr>
                        <td width="100">Confirm Password</td>
                        <td><input name="confirmpassword" type="password" id="confirmpassword"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Email</td>
                        <td><input name="email" type="text" id="email"></td>
                     </tr>
                  
                     <tr>
                        <td width="100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width="100"> </td>
                        <td>
                           <input name="submit" type="submit" id="submit" value="Register">
			<a href="profile.php">
			Login
			</a>
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>