<?php 
	require_once('header.php');
?>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
        <div class="w3-container">
<div class="w3-margin">		
		<form action ="assignrole.php" method="post">
<input type="text" name="searchq" placeholder="search here">
<input type="submit" value="search" name="submit"/>
</form>
</div>
<?php

$db = mysqli_connect("localhost", "root", '', "studenthub") or die ("Failed to connect");

if(isset($_POST['submit'])){
	$searchq = $_POST['searchq'];
	//$filepath = "images/" . basename($_FILES["file"]["name"]);
		
	$query = "select * from user where fname LIKE '%$searchq%' OR lname LIKE '%$searchq%' OR (fname + lname) LIKE '%$searchq%'";
	$result = mysqli_query($db, $query);
	if ($result) {
		while($row = mysqli_fetch_array($result)){
			echo '<hr>';
			$fname=$row['fname'];
			$lname=$row['lname'];
			$user_id=$row['user_id'];
                        
                        $_SESSION['uid']=$user_id;
                        
			echo '<div class="w3-left"><img src="'.$row['pro_pic'].'" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></div>';
			echo '<div class="w3-left" ><strong>  &nbsp;&nbsp;&nbsp;'.$row['fname'] . " " . $row['lname'] . "<br>";
			echo "<strong> &nbsp;&nbsp;&nbsp; " .$row['degree']. "<br>";
			echo "<strong>&nbsp;&nbsp;&nbsp; " .$row['occupation']. "</div>";
			echo '<div class="w3-right"><span class="w3-right"><form method="POST" action="assignrole.php">
					<select name="role" style="margin:right;">
						<option value="general">Select role ID</option>
						<option value="general">User</option>
						<option value="admin">Administrator</option>
						<option value="moderator">Moderator</option>
					</select>
					<input type="submit" class="w3-button w3-theme-d1" name="submit_role" value="submit_role"/>		
				  </form></span></div><br/>	';	
				  
				  
		}
	}
} 
?>
	</div>
		</div>
	</div>
</div>
<?php 
	//add footer
	require_once('footer.php');
?>





<?php
//session_start();

$db = mysqli_connect("localhost", "root", '', "studenthub") or die ("Failed to connect");

if(isset($_POST['submit_role'])){
	$role=$_POST['role'];
	$id=$_SESSION['uid'];
	mysqli_query($db,"UPDATE user SET role='$role' WHERE user_id=".$id);
        echo 'New role assigned successfully!';
}
?>