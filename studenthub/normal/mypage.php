<?php
session_start();

$db = mysqli_connect("localhost", "root", '', "studenthub") or die ("Failed to connect");

if(isset($_POST['submit_role'])){
	$role=$_POST['role'];
	$id=$_SESSION['id'];
	echo $role;
	echo "&&&&&&&&&&&&&&&&&";
	echo $id;
	//mysqli_query($db,"update user set role=".$role." where user_id=".$_SESSION['id']);
	mysqli_query($db,"UPDATE user SET role='$role' WHERE user_id=".$id);
}
?>