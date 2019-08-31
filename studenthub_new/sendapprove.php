<?php
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});

session_start();

$uid=$_SESSION['id']->getUserId();
$oid=$_POST['oid'];
$approve=$_POST['approve'];
$_SESSION['id']->approveRequest($uid, $oid, $approve);
