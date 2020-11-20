<?php 
                spl_autoload_register(function ($class_name) {
                     include 'classes/'.$class_name . '.php';
                });
                
	session_start();
        
	if(!isset($_SESSION['id'])){
		header('Location: login.php');
	}
        
                $id=$_SESSION['id']; 
                $userid=$id->getUserId();
                $address=$id->getAddress();
                $regno=$id->getRegNumber();
                $occ=$id->getOccupation();
                $email=$id->getEmail();
                $degree=$id->getDegree();
                $phone_no=$id->getContactNo();      
                $nic=$id->getNic();
                $fname=$id->getFName();
                $lname=$id->getLName();
                $dob=$id->getDob();
                $pp=($id->getProPic());
                $batch=$id->getBatch();
                $password=$id->getPassword();
                $role=$id->getRole();
?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>UWU Student Hub</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="w3-theme-blue-grey.css">
<link rel="stylesheet" href="css.css">

<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="jquery.min.js"></script>
<script>
	function searchUser(){
		if(document.getElementById("search").value==""){
			alert("Please enter a search query");
			return;
		}
		window.location = "search.php?q="+document.getElementById("search").value;
	}
</script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
.center {
    display: block; margin-left: auto; margin-right: auto;
}
.footer {
    position: fixed; left: 0; bottom: 0; width: 100%; background-color: red; color: white; text-align: center;
}
.image{
    position:relative; display:inline-block; width:100%; height:100%;
}

.overlay{
    display:none;width:97%; height:30%; background:rgba(0,0,0,.5); position: absolute; top:66%;left:0%;right:0%;bottom:0%; display:inline-block;
}
</style>
</head><body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>UWU Student Hub</a>
  <a href="requests.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Connect Requests"><i class="fa fa-user"></i><!--<span class="w3-badge w3-right w3-small w3-green">1</span>--></a>
  <a href="inbox.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <a href="notification.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i></a>
  <!--search-->
  <div class="w3-bar-item" style="width:30%">
	<input id="search" class="w3-bar-item w3-input  w3-small w3-animate-input" type="text" style="font-size:14px;width:30%;max-width:50%;"/>
	<a class="w3-button w3-theme-l5 w3-hover-white w3-small" onclick="searchUser();" title="Messages"><i class="fa fa-search"></i></a>
  </div>
 
  <!--profile-->
<div class="w3-dropdown-hover w3-hide-small w3-right">
  <button class="w3-button w3-small" title="Profile">
	<a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-white" title="My Account">
		<span class="w3-margin-right"><b><?=$fname?> <?=$lname?></b></span>
		<img src="<?=$pp?>" class="w3-circle w3-small" style="height:20px;width:20px" alt="Avatar">
	</a>
  </button>   
  <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:100%;">
      <a href="myprofile.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i><i class="w3-margin-right"></i>Profile</a>
      <a href="logout.php" class="w3-bar-item w3-button" style="color:red;width:100%"><i class="fa fa-sign-out w3-margin-right"></i>Logout</a>
    </div>
 </div> 
 <?php if($role=="moderator"||$role=="admin"){?>
 <!--for admins/mods-->
 <div class="w3-dropdown-hover w3-hide-small w3-right">
  <button class="w3-button w3-small" title="Admin">
	<a href="#" class="w3-bar-item w3-button w3-right w3-hover-white" title="My Account">
		<i class="fa fa-cogs"></i> Admin
	</a>
  </button>   
  <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="setting.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Verify New Accounts</a>
      <a href="viewReportedPost.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Review Posts</a>
      <?php if($role=="admin"){?>
      <a href="assignrole.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Change User Roles</a>
      <?php } ?>
    </div>
 </div> 
 <?php }; ?>
 </div>
</div>