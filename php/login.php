<!--login script. starts session and sets $login_session variable-->
<html>

<style>
	  body{
		  background-color: skyblue;
		  background-image: url("clouds.gif");
	  }
	  p.heading{
		background-color: white;
		width: 250px;
		padding: 10px;
		margin-left: auto;
		margin-right: auto;
		border: 1px solid navy;
		padding-left: auto;
		padding-right: auto;
		text-align: center;
	  }
	  table.polls{
		background-color: white;
		width:100px;
		height: 100px;
		padding: 10px;
		border: 1px solid navy;
		margin: auto;
	  }
	  </style>
	<body class = body>
	
      	<?php session_start();
         if(isset($_POST['submit'])){
            	include("connect.php");
            
            	if(! get_magic_quotes_gpc() ){
               		$username = addslashes ($_POST['username']);	// protects from sql injection
               		$password = addslashes ($_POST['password']);
            	} else {
               		$username = $_POST['username'];
               		$password = $_POST['password'];
            	}
            
            	$sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
                $result = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($result);
		if ($rows==1) {
			$_SESSION['login_user']=$username; // Initializing session
			header("refresh:3;url=profile.php"); // Redirecting to other page
			echo "Login successful. You will be redirected in 3 seconds";
		} else {
			header('refresh:3;url=index.php');
			echo "Invalid login. You will be redirected in 3 seconds";
		}
            	mysqli_select_db($conn, $dbname);            
            	mysqli_close($conn);
	}?>
	</body>

</html>	
