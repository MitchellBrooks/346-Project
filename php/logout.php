<?php
session_start();
if(session_destroy()) // Destroying all sessions
{
header("Location: home.php"); // Redirecting to home page
}
?>