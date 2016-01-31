<?php		// Script that verifies session
$conn = mysqli_connect("localhost", "root", ""); // Establishing connection with server
$db = mysqli_select_db($conn,"userregistration"); // Selecting database
session_start();	//Storing session
if(isset($_SESSION['login_user'])){
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysqli_query($conn,"SELECT username FROM users WHERE username='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['username'];
}
if(!isset($login_session)){ //if session is not set
	mysqli_close($connection); // Closing connection
	header('Location: index.php'); // Redirecting to home page
}
?>