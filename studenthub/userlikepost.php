<?php
spl_autoload_register(function ($class_name) {
                     include 'classes/'.$class_name . '.php';
});

$uid=$_POST['uid'];
$pid=$_POST['pid'];

$p= new Post();
$result=$p->addLike($pid, $uid);

echo $result;
