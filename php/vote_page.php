<?php include('session.php');
	include("connect.php");

	if(!isset($login_session)){
		mysqli_close($conn); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
	$poll_id = $_GET["id"]; // get id from URL
	
	
		if(isset($_POST['one']) || isset($_POST['two'])){	//if either button was pressed
			$sql = "SELECT * FROM votes WHERE poll_id='$poll_id' and username_id='$login_session'";	//sql checks if user has voted on this poll
			$result = mysqli_query($conn, $sql);
			$rowcount = mysqli_num_rows($result);
			if ($rowcount > 0) {	// if rowcount > 0, user and poll_id record exists; user has already voted on this poll
    				echo "User already voted";
			} else {
				$sql = "INSERT INTO votes (poll_id,username_id) VALUES ('$poll_id','$login_session')";
				if(isset($_POST['one'])){	//update the votes int depending on which button was pressed
					$sql1 = "UPDATE polls SET poll_choice_one_votes = poll_choice_one_votes + 1 WHERE poll_id='$poll_id'";
				} else {
					$sql1 = "UPDATE polls SET poll_choice_two_votes = poll_choice_two_votes + 1 WHERE poll_id='$poll_id'";
				}
				if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)) {
    					echo "Voted successfully";
				} else {
    					echo "Error: ". $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		$sql = "SELECT * FROM polls WHERE poll_id=" . $poll_id;	// get info about poll from database
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$title = $resAr[1];
		$author = $resAr[2];
		$choice_one = $resAr[3];
		$choice_two = $resAr[4];
		$one_votes = $resAr[6];
		$two_votes = $resAr[7];
		$image = $resAr[8];
		

		
		
		if(isset($_POST['submit']))
         {
            
            
            	if(! get_magic_quotes_gpc() )
            	{              		
               		$comment = addslashes ($_POST['comment']);
            	}
            	else
            	{
               		$comment = $_POST['comment'];
            	}
				
			 if($comment){			
			 $sql = "INSERT INTO comments (name,comment, comment_id) VALUES ('$login_session','$comment', '$poll_id')";
			 header("Location: comment_manager.php");
			 }
			 
			mysqli_select_db($conn, $dbname);
            if (mysqli_query($conn, $sql)) {
		$sql = "SELECT id FROM comments WHERE comment='$comment'";
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$comment_id = $resAr[0];
		header("url=vote_page.php?id=" . $poll_id);
    		 
		} else {
    		echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}
		 }
	
?>
	
<html>

	<style>
		p.images{
			background-color: white;
			width: 600px;
			height: 300px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
		DIV.links{
			width: 500px;
			padding: 10px;

		}
		p.heading{
			background-color: white;
			width: 240px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
				
				
		p.dataBox{
			background-color: white;
			width: 150px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
		
		
		p.commentBox{
			background-color: white;
			width: 350px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
		}
		p.bottom{
			background-color: white;
			width: auto;
			height: auto;
			border-style: solid;
			border-width: 1px;
		}
		

		a:link{
			color: hotpink
		}
		a:visited{
			color: black
		}
		a:hover{
			color: pink
		}
		a:active{
			color: orange
		}
		body{
		background-color: skyBlue;
		background-image: url("clouds.jpg");
		}
		p{
			font-family: "Times New Roman", Times, serif;
		}
		
	</style>


	<head>
	<p>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<p>
		<font size = '20'>
		<strong> <?php echo $title; ?> </strong>
		</font>
		<br>
		Author: <?php echo $author; ?> 
		<br>
		<a href="profile.php">Home</a>
		</p>
		<br>
		<br>
		<br>
		<br>
		<p align = "center">
		<br>
		<br>
		<br>
		
		
		
		<img src=get.php?id=<?php echo $poll_id ?>  height = "222" width = "222">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src=get2.php?id=<?php echo $poll_id ?>  height = "222" width = "222">
		</p>

		
		
		<form action="<?php $_PHP_SELF ?>" method="post">
		<p align = "center">
		<input name="one" type="submit" id="one" value="<?php echo $choice_one; ?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="two" type="submit" id="two" value="<?php echo $choice_two; ?>">
		</p>
		</form>
		<DIV align = "center">
	
		<p class = dataBox>
		<?php echo $choice_one; ?> votes: <?php echo $one_votes; ?>
		<br>
		<?php echo $choice_two; ?> votes: <?php echo $two_votes; ?> <br>
		Total votes: <?php echo $one_votes + $two_votes;?>
		</p>
		
		
		
		
		
		
		
		<br>
		<br>
		<br>
		<br>

<form action="<?php $_PHP_SELF ?>" method="post">
<table>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>
</body>	

<br><br><br><br><br><br><br><br><br>
<p class = comment_header align = "center">
<font size = "20">
<strong>Comments:</strong>
</font>
</p>



<?php


$getquery=mysqli_query($conn,"SELECT * FROM comments ORDER BY id DESC");

while($rows=mysqli_fetch_assoc($getquery))
{

$comment_id2 = $rows['comment_id'];
if($comment_id2==$poll_id){
echo '<p class = bottom align = "left">';
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo '<strong>' . $name . '</strong>' . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>';
   }
}

echo '</p>';
?>



</body>


</html>	

