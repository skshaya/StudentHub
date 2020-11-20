<?php
    spl_autoload_register(function ($class_name) {
          include 'classes/'.$class_name . '.php';
     });

	$pid=$_POST['post_id'];

        $p=new Post();
	$p->deletePost($pid);
        
?>