<?php include('session.php');
	$dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
	$dbname = 'userregistration';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);//Store database info in variables

	if(! $conn ){
               die('Could not connect: ' . mysql_error());
	}
	
	if(!isset($login_session)){  // If user doesn't have valid session
		mysqli_close($conn); // Closing connection
		header('Location: index.php'); // Redirecting to home page
	} else {
		$sql = "SELECT poll_title FROM polls ORDER BY poll_id DESC"; // sql statement
		$result = mysqli_query($conn, $sql);			//query database
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);	//fetch
		$newest = $resAr[0];					//store newest poll title
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest1 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest2 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest3 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest4 = $resAr[0];

		$sql = "SELECT poll_id FROM polls ORDER BY poll_id DESC"; // sql statement
		$result = mysqli_query($conn, $sql);			// query database
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);	// fetch
		$newest_id = $resAr[0];					//store poll id
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest_id1 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest_id2 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest_id3 = $resAr[0];
		$resAr = mysqli_fetch_array($result,MYSQLI_NUM);
		$newest_id4 = $resAr[0];
	}
?>
<html>
	<head>
		<title> Browse Polls </title>
		<style>
			body{
				background-color: skyblue;
				background-image: url("clouds.jpg");
			}
			p.heading{
				background-color: white;
				width: 300px;
				padding: 10px;
				margin-left: auto;
				margin-right: auto;
				border: 1px solid navy;
			}
			DIV.links{
				margin-left: auto;
				margin-right: auto;
			}
			p.home{
				background-color: white;
				width: 300px;
				padding: 10px;
				margin-top: auto;
				margin-left: auto;
				height: 20px;
				border: 1px solid navy;
			}
			p.polls{
				background-color: white;
				width: 300px;
				padding: 10px;
				margin-right: auto;
				height: a;
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
		</style>
	</head>
	<body>
		<font size = '20'>
	<p class = heading>
	<strong> Newest Polls </strong>
	</p>
	</font>
	<DIV class = links>
	<a href="profile.php">Home</a>
	
	</DIV>
	<p class = polls>
	<!--provide link to voting page for poll-->
	
	<a href="vote_page.php?id=<?php echo $newest_id ?>"><?php echo $newest; ?></a> 
	<br>
	<a href="vote_page.php?id=<?php echo $newest_id1 ?>"><?php echo $newest1; ?></a>
	<br>
	<a href="vote_page.php?id=<?php echo $newest_id2 ?>"><?php echo $newest2; ?></a>
	<br>
	<a href="vote_page.php?id=<?php echo $newest_id3 ?>"><?php echo $newest3; ?></a>
	<br>
	<a href="vote_page.php?id=<?php echo $newest_id4 ?>"><?php echo $newest4; ?></a>
	<br>
	</p>
	</body>
</html>