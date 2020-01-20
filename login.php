<?php include ('header.php');
if(isset($_SESSION['user'])){
	
	header('location:index.php');
	
}
 ?>


<?php
include('msgbox.php');

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="reg.css" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body bgcolor="#999999">
    <div class="container">
	<div class="box1">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
				
					<form method="POST" action="process_login.php" role="form" >
						<div class="form-group">
							<h2>Signin</h2>
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
							<input type="submit" name="submit" class="btn btn-info btn-block" value="Sign in">
						</div>
						<hr>
						<p>New User? <a href="registration.php">Register</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</body>
