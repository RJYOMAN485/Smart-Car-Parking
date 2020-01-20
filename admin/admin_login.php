
<?php
	
	session_start();
	include('db.php');

	include('msgbox.php');
		
	if(isset($_SESSION['admin']))
	 {
		 header('location:index.php');
		
	 }
	if(isset($_POST['submitok'])) {
		
		
			 echo "<script> alert('Executed'); </script>";
			
			$email = $_POST['emailid'];
			$pass = $_POST['pwd'];
			
			
			$qry=mysqli_query($connection,"select * from tbladmin where email='$email' and password='$pass'");
			if(mysqli_num_rows($qry)==1)
			{
				$usr=mysqli_fetch_assoc($qry);
				//$row=mysqli_num_rows($usr);
				//if($row==1){
					
					
					$_SESSION['admin']=$usr['username'];
					$_SESSION['success']="Succefull Login!";
						
						header("location:index.php");
					
				}
				
					else
					{
						
						
						$_SESSION['error']="Login Failed!";
				
						header("location:admin_login.php");
					}
					
	}
	
	
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
 
 
  <div class="sufee-login d-flex align-content-center flex-wrap">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Admin Login</h2>
                  <p>Please login to continue</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="emailid" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="password" name="pwd" placeholder="password" class="form-control"  type="password">
                        </div>
                      </div>
					  
		
					  
                      <div class="form-group">
                        <input name="submitok" class="btn btn-lg btn-primary btn btn-success" value="Signin" type="submit">
                      </div>
                       <div class="form-group">
                        <hr>
						<p><a href="forgotpassword.php">Forgot password? </a></p>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>