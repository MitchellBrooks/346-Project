<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Login </title>
	<style>
		body{
			background-color: skyblue;
			background-image: url("clouds.jpg");
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
		table.boxes{
			background-color: white;
			width:100px;
			height: 100px;
			padding: 10px;
			border: 1px solid navy;
			margin: auto;
		}
	</style>
	</head>
	<body>
	<p class = heading>
	<font size = '20'>
	<strong> Login </strong>
	</font>
	</p>
 
	<form action="login.php" method="post">
	<table class = boxes width="100" border="0" cellspacing="1" cellpadding="2">
				<tr>
                        <td width="100">Userame</td>
                        <td><input name="username" type="text" id="username"></td>
                </tr>
                <tr>
                        <td width="100">Password</td>
                        <td><input name="password" type="password" id="password"></td>
                </tr>
                <td width="100"> </td>
		<td>
                <input name="submit" type="submit" id="submit" value="Login">
		<a href="create_account.php"> Sign up </a>
                </td>
		</table>
        </form>
	</body>
</html>