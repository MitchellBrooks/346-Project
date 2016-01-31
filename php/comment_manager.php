<?php include('session.php');
include("connect.php");
$getquery=mysqli_query($conn,"SELECT comment_id FROM comments");
while($rows=mysqli_fetch_assoc($getquery)){
$id=$rows['comment_id'];
}
echo $id;
header("Location: vote_page.php?id=$id");
	
?>