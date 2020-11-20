<?php

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

session_start();

$user_id=$_SESSION["id"]->getUserId();
$post_id=$_POST["post_id"];
//$comment=$_POST["comment"];

$newComment=new Comment();
$newComment->loadComments($post_id, $user_id);