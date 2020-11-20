<?php
	spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

require_once("header.php");?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
	<span class="w3-right w3-margin w3-theme-d5" style="margin:auto;display:block"><a href="editprofile.php" class="w3-button">Edit <i class="fa fa-pencil"></i></a></span>
        <div class="w3-container">

		
		
<?php
require("loaddb.php");
$user_id=$_SESSION['id']->getUserId();
 
   $user=new User();
    $user->viewprofile($user_id);    
?>

</div>
</div>	
</div>
</div>

<?php 
require_once("footer.php");
?>	
