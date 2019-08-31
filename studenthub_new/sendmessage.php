<?php

    include 'classes/User.php';
    include 'classes/Message.php';


session_start();

$sid=$_SESSION['id']->getUserId();
$rid=$_POST['rid'];
$content=$_POST['content'];

$m=new Message();
$m->sendMessage($sid, $rid, $content);
