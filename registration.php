<?php include "header.php" ?>


<?php


    
    if(isset($_POST['submitreg'])) {

        if($connection)
		{
			$name=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['pwd'];
			$confirm=$_POST['confirmpwd'];
            if($password==$confirm)  {
					$sql="INSERT INTO register(name,email,password) VALUES('$name','$email','$password')";
					$result=mysqli_query($connection,$sql);
            
					if($result) {
						echo "Registered Successfully";
						$_SESSION['register']="Registered Successfully! Login to continue.";
					}
					else 
						die('Connection Error'.mysqli_error($connection));
						
            }
			else {
				echo "Password do not match";
				$_SESSION['error']="Password do not match";
				
				}
		
	
        
        
    }
	else {
		echo"<script>alert('Connection Problem')</script>";
	}
	
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="reg.css" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
		<div class="box1">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<form method="POST" action="registration.php" role="form">
						<div class="form-group">
						<?php include('msgbox.php');?>
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Your name</label>
							<input name="username" type="text" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input name="email" type="email" maxlength="50" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input name="pwd" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
						</div>
                        <div class="form-group">
							<label class="control-label" for="signupPasswordagain">Confirm Password</label>
							<input name="confirmpwd" type="password" maxlength="25" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submitreg" class="btn btn-info btn-block" value="Create your account">
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p>Already have an account? <a href="login.php">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
