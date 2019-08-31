<?php
	require_once('loaddb.php');
    $db = mysqli_connect($url, $dbuser, $dbpass,'studenthub') or die ("Failed to connect");
    
    $post_id = $_GET['post_id'];
    $sql = "DELETE from post WHERE post_id='$post_id'";
    
	$result = mysqli_query($db, $sql) or die(mysqli_error());
	
    if (mysqli_affected_rows($db)) {
		echo "Succesfully Removed";
    }
    else {
        echo "An Error Occured";
    }

	
?>