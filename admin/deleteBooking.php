<?php 
    $id = $_GET['id'];
   include('db.php');

    $sql = "DELETE FROM bookings WHERE bookid = '$id'"; 
	mysqli_query($connection,"UPDATE park_status SET pid=1");

    if ($connection->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }
?>