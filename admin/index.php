<?php

include('db.php');
session_start();
	if(!isset($_SESSION['admin'])) {
		header('location:admin_login.php');
		return;
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
 
    $sqlbook = "SELECT * FROM bookings";
    $book=mysqli_num_rows(mysqli_query($connection, $sqlbook));
	
	 $sqlreg = "SELECT * FROM register";
    $reg=mysqli_num_rows(mysqli_query($connection, $sqlreg));
	
	 //$sqlfeed = "SELECT * FROM feedback";
    //$feed=mysqli_num_rows(mysqli_query($connection, $sqlfeed));
	
    // $messagesNo=mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    // $moviesNo=mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            Parkings
        </div>
        <div class="admin-login-info">
            <i class="far fa-bell admin-notification-button"></i>
            <i class="far fa-comment-alt"></i>
            <a href="logout.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-log-out"></span>Log out</a>
            <img class="admin-user-avatar" src="../img/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
	
		<div class="admin-section admin-section1 ">
		
			<?php include('sidebar.php') ?>
		
		</div>
        
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php echo $book ?></h2>
                        <h3>Bookings</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                        <h2 style="color: #4547cf"><?php echo $reg ?></h2>
                        <h3>Users</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-ticket-alt" style="background-color: #bb3c95"></i>
                        <h2 style="color: #bb3c95"><?php //echo $feed ?></h2>
                        <h3>Feedback</h3>
                    </div>
              
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        if($result = mysqli_query($connection, $sqlbook)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
									$n="select * from register where reg_id={$row['userid']}";
						
									$sqlname=mysqli_query($connection,$n);
									$sel=mysqli_fetch_assoc($sqlname);
                                    echo "<div class=\"admin-panel-section-booking-item\">\n";
                                    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
                                    echo "                                <i class=\"fas fa-check accept-booking\" title=\"Verify booking\"></i>\n";
                                    echo "                                <a href='deleteBooking.php?id=".$row['bookid']."'><i class=\"fas fa-times decline-booking\" title=\"Reject booking\"></i></a>\n";
                                    echo "                            </div>\n";
                                    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h3>". $row['bookid'] ."</h3>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h4>INR". $row['amount'] ."</h4>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                    echo "                                    <h4>". $row['date'] ."</h4>\n";
                                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                                 
                                    echo "                                </div>\n";
                                    echo "                                <div>\n";
                                    echo "                                    <h4>". $sel['name'] ."</h4>\n";
                                    echo "                                    <i class=\"fas fa-circle\"></i>\n";
                                    echo "                                    <h4>". $sel['email'] ."</h4>\n";
                                    echo "                                </div>\n";
                                    echo "                            </div>\n";
                                    echo "                        </div>";
                                }
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Bookings right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Users</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        
						

						<table class="table">
						
							<thead>
							<tr>
							<th> Userid</th>
							<th>Name</th>
							<th>Email</th>
							</tr>
							</thead>
							
							<?php 
								$sql=mysqli_query($connection,"Select * from register");
								while($row=mysqli_fetch_assoc($sql)) {
								
									echo "<tr>
										<td>{$row['reg_id']}</td>
										<td>{$row['name']}</td>
										<td>{$row['email']}</td>
										<td><a href='deleteuser.php?id={$row['reg_id']}'>remove</a>
									</tr>";
									
								}
							
							?>
						
						</table>
						
                        <?php
                        if(isset($_POST['submit'])){
                            // $insert_query = "INSERT INTO 
                            // movieTable (  movieImg,
                                            // movieTitle,
                                            // movieGenre,
                                            // movieDuration,
                                            // movieRelDate,
                                            // movieDirector,
                                            // movieActors)
                            // VALUES (        'img/".$_POST['movieImg']."',
                                            // '".$_POST["movieTitle"]."',
                                            // '".$_POST["movieGenre"]."',
                                            // '".$_POST["movieDuration"]."',
                                            // '".$_POST["movieRelDate"]."',
                                            // '".$_POST["movieDirector"]."',
                                            // '".$_POST["movieActors"]."')";
                            // mysqli_query($link,$insert_query);
							}
                        ?>
                    </form>
                </div>
            </div>
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Schedule</h2>
                        <i class="fas fa-clock" style="background-color: #3cbb6c"></i>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel5">
                    <div class="admin-panel-section-header">
                        <h2>To-do List</h2>
                        <i class="fas fa-list-ol" style="background-color: #bb3c95"></i>
                    </div>
                    <div class="admin-panel-section-content"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>
</html>