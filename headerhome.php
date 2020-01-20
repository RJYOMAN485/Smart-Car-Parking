<?php
include('db.php');
session_start();
date_default_timezone_set('Asia/Kolkata');
?>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Parking System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="header.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Smart Parking</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          
		  
		  <?php if(isset($_SESSION['user'])){
		$us=mysqli_query($connection,"select * from register where reg_id='".$_SESSION['user']."'");
        $user=mysqli_fetch_array($us);?>

		<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
          </li>
		<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="profile.php">

			<?php echo $user['name'];?></a>
		</li>

		<li class="nav-item">
		<a  class="nav-link js-scroll-trigger"href="logout.php">Logout</a>

		</li>
		<?php 
		}
		else 
		{
			
			?>	
			<li class="nav-item">
			<a class="nav-link js-scroll-trigger" 	href="login.php">Login</a><?php }?>

		</li>
		
		<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
		 <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
		  
		  
        </ul>
      </div>
    </div>
  </nav>