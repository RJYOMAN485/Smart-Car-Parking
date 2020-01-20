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
	session_start();
	include('db.php');
	if(!isset($_SESSION['admin']))
	 {
		 header('location:admin_login.php');
		
	 }
	if(isset($_POST['update'])) {
		//echo "Executed";
			$oldpass=$_POST['op'];
			$user=$_SESSION['admin'];
			echo "<script> alert($oldpass)</script>";
			$sql=mysqli_query($connection,"SELECT password FROM tbladmin where username='$user'");
			$result=mysqli_fetch_assoc($sql);
			
			$pass=$result['password'];
			
			
			$newpass=$_POST['np'];
			$conpass=$_POST['cp'];
			include('msgbox.php'); 
			if($pass==$oldpass) {
				if($newpass==$conpass) {
						$_SESSION['success']="Successfully updated";
						mysqli_query($connection,"UPDATE tbladmin SET password='$newpass' where username='$user'");
						header('location:index.php');
					
				}
				else {
					echo "Error new and con";
					$_SESSION['error']="Password error! ";
						header('location:update_profile.php');
					
				
				}
			}
			else
			{
						echo "Error old";

				$_SESSION['error']="Password error! ";
						header('location:update_profile.php');
				
			}
			
		
		
	}
    // $sqlbook = "SELECT * FROM bookings";
    // $book=mysqli_num_rows(mysqli_query($connection, $sqlbook));
	
	 // $sqlreg = "SELECT * FROM register";
    // $reg=mysqli_num_rows(mysqli_query($connection, $sqlreg));
	
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
		<form id="reset-form" role="form" class="form" method="post">
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
         
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Profile</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                       <table class="table table-bordered table-striped table-hover">
						<h1>Update Password</h1><hr>
						<tr style="height:40">
							<th>Enter Your old Password</th>
							<td><input type="password" name="op" class="form-control" required></td>
						</tr>
	
						<tr>	
							<th>Enter Your New Password</th>
							<td><input type="password" name="np" class="form-control" required>
							</td>
						</tr>
						
						<tr>	
							<th>Enter Your Confirm Password</th>
							<td><input type="password" name="cp" class="form-control" required>
							</td>
						</tr>
						
						<tr>
							<td colspan="2" align="center">
								<input type="submit" class="btn btn-primary" value="Update Password" name="update" required>
							</td>
						</tr>
					</table> 
                    </div>
                </div>
               
            </div>
           
        </div>
		</form>
    </div>
	
	
    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>
</html>
