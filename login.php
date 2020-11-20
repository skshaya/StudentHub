<?php session_start();

require("loaddb.php");
require("classes/User.php");

if(isset($_SESSION['id'])){
		header('Location: home.php');
}

  if(isset($_POST['submit'])) {
    $user=new User();
    $user->login($_POST['uname'],$_POST['password']);
  }
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Login</title>
	<meta charset="UTF-8">
            <title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css.css">
	<link type="text/css" rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="w3-theme-blue-grey.css">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
</head>
<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">UWU Student Hub</a>
 </div>
</div>
<!-- Page Container -->
<div class="w3-container w3-content w3-center" style="max-width:400px;margin-top:80px;vertical-align: middle;">
		<div class="w3-card w3-round">
			<div class="w3-white w3-padding-large">
				<br/>
				<h1>Login</h1>
                <form method="post" action="login.php"><br/>
                    <input type="text" name="uname" placeholder="Username"><br/><br/>
                    <input type="password" name="password" placeholder="Password"><br/><br/>
                    <input type="submit" name="submit" value="Login">
                </form>
				<br/>
                <p>Don't have an account? <a href="Register.php">Register</a>
				<br/>
			</div>
		</div>
</div>
</body>
</html>