<?php
         spl_autoload_register(function ($class_name) {
                     include 'classes/'.$class_name . '.php';
         });

        session_start();
        $user=$_SESSION['id'];
        $userid=$user->getUserId(); 
        
        $uid = ($_POST['uid']);
	$oid = ($_POST['oid']);
	$status=($_POST['status']);
		
        $user->connectWith($uid,$oid,$status);
		
?>



