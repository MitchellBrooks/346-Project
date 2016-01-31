<?php include('session.php');
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'userregistration';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(!isset($login_session)){	// if user is not logged in
		mysqli_close($conn); // Closing connection
		header('Location: index.php'); // Redirecting to home page		
	}
	    $sql = "SELECT poll_id FROM polls ORDER BY poll_id DESC"; // sql statement
		$result = mysqli_query($conn, $sql);			// query database
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);	// fetch
		$newest_id = $resAr[0];	
	    $poll_id = $newest_id;
	

		$sql = "SELECT * FROM polls WHERE poll_id=" . $poll_id;	// get info about poll from database
		$result = mysqli_query($conn, $sql);
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$title = $resAr[1];
		$choice_one = $resAr[3];
		$choice_two = $resAr[4];
		$one_votes = $resAr[6];
		$two_votes = $resAr[7];
	?>
<!DOCTYPE html>
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
			width: 600px;
			padding: 10px;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid navy;
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
	<title>Your Home Page</title>
	</head>
	<body>
	<div id="profile">
	<b id="welcome">Welcome : &nbsp <i><?php echo $login_session; ?></i></b>
	<br>
	<b id="logout"><a href="logout.php">Log Out</a></b>
	
	<DIV class = links style="position: absolute; top:0px; right:10px; width:200px; height:25px">
	<a href="create_poll.php">Create Poll</a>
	&nbsp;
	<a href="browse_polls.php">Browse Polls</a>
	</DIV>	
	</div>
	
		<p class = heading>
		<font size = '20'>
		<strong> Newest Poll </strong>
		</font>
		</p>
		<p align = "center">
		<br>
		<br>
		<br>
		<font size = '20'>
		<strong> <?php echo $title; ?> </strong>
		</font>
		</p>
		
		<br>


		
		

		<p  align = "center">
	
		<br>
		<br>
		<br>


		<img src=get.php?id=<?php echo $poll_id ?>  height = "222">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src=get2.php?id=<?php echo $poll_id ?>  height = "222">
		</p>

		
		<DIV align = "center">
	
		<p class = dataBox>
		<?php echo $choice_one; ?> votes: <?php echo $one_votes; ?>
		<br>
		<?php echo $choice_two; ?> votes: <?php echo $two_votes; ?> <br>
		Total votes: <?php echo $one_votes + $two_votes;?>
		</p>
		
		</DIV>
		
		<Div align = "center">
	        <strong>
		<section id="box1"> </section>
		<section id="box2"> </section>
		<section id="box3"> </section>
		</strong>
		<br>
		
		</Div>

		<br><br><br><br>
	
	
	</body>
</html>