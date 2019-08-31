<?php

$link = mysqli_connect("localhost", "root", '', "studenthub");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['id']))
{
    
    $id = $_POST['id'];
    $status = $_POST['status'];

	$query = "UPDATE general SET verified='$status', time=NOW()  WHERE user_id='$id'";
    if ($link->query($query) === TRUE) {
        if($status == 1){
            echo "Accepted!";
        } else if($status == 2){
            echo "Rejected!";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>