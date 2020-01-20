




<?php 
			include('db.php');
			
			echo "executed";
			session_start();
			
			$email = $_POST["username"];
			$pass = $_POST["pwd"];
			
			$qry=mysqli_query($connection,"select * from tbladmin where username='$email' and password='$pass'");
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
						echo "<script>alert('Login Failed');</script>";
						
						
						$_SESSION['error']="Login Failed!";
				
						header("location:admin_login.php");
					}







?>