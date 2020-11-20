<?php
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});        

        $uid = ($_POST['user_id']);
	$pid=($_POST['post_id']);
		
	$p=new Post();
        $p->reportPost($uid, $pid);
?>



