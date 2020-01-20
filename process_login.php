<?php
include('db.php');
include('msgbox.php');
session_start();
$email = $_POST["email"];
$pass = $_POST["pwd"];
$qry=mysqli_query($connection,"select * from register where email='$email' and password='$pass'");
if(mysqli_num_rows($qry)==1)
{
	$usr=mysqli_fetch_assoc($qry);

		$_SESSION['user']=$usr['reg_id'];
	
			header('location:index.php');
		
	}
	
		else
		{
			$_SESSION['error']="Login Failed!";
	
			header("location:login.php");
		}
	
?>