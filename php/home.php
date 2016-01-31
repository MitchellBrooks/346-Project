<?php 
		include("connect.php");

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

<html>


	
	<head>
	<style>
		

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
		<title> My Webpage </title>
		
		

	
	</head>

	<body>

		<p class = heading>
		<font size = '20'>
		<strong> Newest Poll </strong>
		</font>
		<br>

		<DIV class = links style="position: absolute; top:25px; right:10px; width:200px; height:25px">
		<a href="index.php">Login</a>

		<a href="create_account.php">Create New Account</a> 
		</DIV>
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


		
		

		<p align = "center">
	
		<br>
		<br>
		<br>


		<img src=get.php?id=<?php echo $poll_id ?>  height = "222" width = "222">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src=get2.php?id=<?php echo $poll_id ?>  height = "222" width = "222">
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

