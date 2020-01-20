<?php
include('db.php');
$id=$_GET['id'];
session_start();
if(!isset($_SESSION['email']))
{
		header('location:forgotpassword.php');
}


if(isset($_POST['recover']))
  { 
	include('msgbox.php');
    $code=$_POST['code'];
	if($code==123456) {
		header('location:reset-password.php');
	}
	else{
		
		 echo "<script> alert('Invalid Code. Please try again'); </script>";
		//header('location:forgotpassword.php');
	}
    
  }
  
  if(isset($_POST['cancel']))
  {
	  header('location:admin_login.php');
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
                  <h3><i class="glyphicon glyphicon-ok color-blue" style="color:blue"></i></h3>
				  <div class="alert alert-success" role="alert" id="notes">
                  <i class="text-center">Verify the code send to <?php echo $id; ?></i>
				  </div>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                          <input name="code" placeholder="Enter the code" class="form-control"  type="text">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <input name="recover" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
					  <div class="form-group">
                        <input name="cancel" class="btn-default" value="Cancel" type="submit">
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