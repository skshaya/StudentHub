<?php

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

$cid=$_POST["cid"];

$comment=new Comment();
$comment->deleteComment($cid);

