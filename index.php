
	 
	 <?php include "headerhome.php" ?>
    


<!DOCTYPE html>
<html lang="en">

<head>

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

</head>

<body id="page-top">

  <!-- Navigation -->
 
  
  <!-- Navigation -->

  <!-- Header -->
 
  <?php
  
	$flag=file_get_contents('https://api.thingspeak.com/channels/914849/fields/1/last.txt');
	$sql=mysqli_query($connection,"SELECT * FROM park_status");
	$check=mysqli_fetch_assoc($sql);
	if($check['pid']==1 && $flag==1) {
		$sql=mysqli_query($connection,"UPDATE park_status SET pid=1");
  
  ?>
  
  <section class="page-section" id="home">
  
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To Smart Parking System!</div>
        <div class="intro-heading text-uppercase">Book your slots today</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="booking.php">Book now</a>
      </div>
    </div>
  </header>
  
	
  </section>
	<?php } elseif($check['pid']==1 && $flag==0) { ?>
	
	
	
	
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To Smart Parking System!</div>
        <div class="intro-heading text-uppercase">Sorry! No slots available</div>
       
      </div>
    </div>
  </header>
  
	<?php }else {
				$sql=mysqli_query($connection,"UPDATE park_status SET pid=0");
	?>
	 <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To Smart Parking System!</div>
        <div class="intro-heading text-uppercase">Sorry! No slots available</div>
        
      </div>
    </div>
  </header>
  
	<?php } ?>

	
 
  
  
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
	  <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          
        </div>
        <div class="timeline-body">
                  <p class="text-muted">Smart parking booking system provides customers an easy way of reserving a parking space online. It overcomes the problem of finding a parking space in commercial areas that unnecessary consumes time.It uses sensor to determine the slots availability. It involves using low-cost sensors, real-time data collection, and mobile-phone-enabled
automated payment systems that allow people to reserve parking in advance or very accurately predict where they will likely find a spot.
When deployed as a system, smart parking thus reduces car emissions in urban centers by reducing the need for people to needlessly
circle city blocks searching for parking. It also permits cities to carefully manage their parking supply
Smart parking helps one of the biggest problems on driving in urban areas; finding empty parking spaces and controlling illegal parking</p>
               </div>
      </div>
      
	  
	  
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Developed by</h2>
         <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
            <h4>Rajendra</h4>
            <p class="text-muted">MCA 5th Semester</p>
			<p class="text-muted">Email: rjxtri485@gmail.com</p>
			<p class="text-muted">Contact: +91 8258865517</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
		
		

      </div>   <!-- end -->
      
    </div>
  </section>

  <!-- Clients -->
  

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Kindly contact us for any further support.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Smart Parking System</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>
