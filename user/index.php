<?php 
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
	<meta name="author" content="webThemez.com">
	<title>About </title>
	<link rel="favicon" href="../assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="../assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php
		include "nav.php";
		$strconn=mysqli_connect("localhost","root","","project",3308);
		if(!$strconn)
			echo "Connection failed".mysqli_connect_error();
		else{}
		// session_start();
		if(isset($_SESSION["username"]))
		{
			$username=$_SESSION["username"];
		}
		else{ echo "<div class='alert alert-danger' role='alert'>Something went wrong try login again.</div>";

		}
	?>


	<header id="head" class="secondary" style="background-color: #680000;">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Welcome <?php echo $username;?></h1>
				</div>
			</div>
		</div>
	</header>
	<div id="courses">
		<section class="container">
			<h2>Online Courses</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box">
					<a href="courses.php">
						<i class="fa fa-cogs fa-2x"></i>
						<div class="text">
							<h3>Courses</h3>
							
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="que.php">
						<i class="fa fa-leaf fa-2x"></i>
						<div class="text">
							<h3>Ask Question to Expert</h3>
							
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="manage.php">
						<i class="fa fa-leaf fa-2x"></i>
						<div class="text">
							<h3>Manage Profile</h3>
							
						</div>
					</a>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- important files -->

	<div id="courses">
		<div class="container">
			<h2>Available Courses</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box">
					<a href="login.php">
						<i class="fa fa-cogs fa-2x"></i>
						<div class="text">
							<h3>HTML</h3>
							This FREE Tutorial will teach you how to design a webpage using HTML.Complete a series of hands-on practice and examination while writing real HTML code.
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="login.php">
						<i class="fa fa-leaf fa-2x"></i>
						<div class="text">
							<h3>CSS</h3>
							Our CSS Tutorial will teach you how to control the style & layout of websites.Complete a series of practice and examination while filling out actual CSS code.
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="login.php">
						<i class="fa fa-leaf fa-2x"></i>
						<div class="text">
							<h3>CSS</h3>
							Our CSS Tutorial will teach you how to control the style & layout of websites.Complete a series of practice and examination while filling out actual CSS code.
						</div>
					</a>
					</div>
				</div>
				
				

		</div>
	</div>

	<div id="courses">
		<div class="container">
			<h2>AVAILABLE CONTENT</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box">
					<a href="jarvis\index.html">
						<i class="fa fa-microphone fa-2x"></i>
						<div class="text">
							<h3>VOICE ASSISTANT</h3>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis alias esse temporibus a cumque! Accusamus deleniti, consequuntur in voluptatum similique voluptas distinctio soluta ipsam quia totam voluptatibus commodi a 
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="../notes/index.php">
						<i class="fa fa-folder fa-2x"></i>
						<div class="text">
							<h3>NOTES</h3>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium nesciunt odit nobis illo. Perferendis rem itaque deleniti ex, modi beatae cumque tempora dolorem qui consectetur explicabo corrupti praesentium natus hic.
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="login.php">
						<i class="fa fa-clock-o fa-2x"></i>
						<div class="text">
							<h3>POMODORO</h3>
							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi nemo laudantium velit cum quo numquam modi repellendus ab ex vel, voluptas accusamus vero consequatur illum, possimus rerum quaerat debitis. Illum.
						</div>
					</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box">
					<a href="../booklibrary/library.php">
						<i class="fa fa-book fa-2x"></i>
						<div class="text">
							<h3>LIBRARY</h3>
							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi nemo laudantium velit cum quo numquam modi repellendus ab ex vel, voluptas accusamus vero consequatur illum, possimus rerum quaerat debitis. Illum.
						</div>
					</a>
					</div>
				</div>
				
				

		</div>
	</div>
	<?php
		include "footer.php";
	?>
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="../assets/js/custom.js"></script>
</body>
</html>