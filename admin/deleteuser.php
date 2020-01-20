<?php 
    $id = $_GET['id'];
   include('db.php');

    $sql = "DELETE FROM register WHERE reg_id = '$id'"; 

    if ($connection->query($sql) === TRUE) {
        header('Location: index.php');
        //exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }
?>