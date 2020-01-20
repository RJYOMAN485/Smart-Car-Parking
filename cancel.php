<?php
session_start();
include('db.php');
	if(isset($_SESSION['user'])) {
		mysqli_query($connection,"delete from bookings where bookid='".$_GET['id']."'");
		$_SESSION['success']="Booking Cancelled Successfully";
		mysqli_query($connection,"UPDATE park_status SET pid=1");
		header('location:profile.php');
	}
	else
		header('location:login.php');
?>