<?php

require_once("header.php");

session_start();

$db = mysqli_connect("localhost", "root", '', "studenthub") or die ("Failed to connect");

if(isset($_POST['submit'])){
	$searchq = $_POST['searchq'];
	//$filepath = "images/" . basename($_FILES["file"]["name"]);
		
	$query = "select * from user where fname LIKE '%$searchq%' OR lname LIKE '%$searchq%' OR (fname + lname) LIKE '%$searchq%'";
	$result = mysqli_query($db, $query);
	if ($result) {
		while($row = mysqli_fetch_array($result)){
			$fname=$row['fname'];
			$lname=$row['lname'];
			$user_id=$row['user_id'];
			$_SESSION['id']=$user_id;
			echo "***********";
			echo $_SESSION['id'];
			
			echo $row['fname'] . " " . $row['lname'] . "<br>";
			echo $row['degree'];
			echo '<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<select name="role" style="margin:right;">
						<option value="">Select role ID</option>
						<option value="0">User</option>
						<option value="1">Administrator</option>
						<option value="2">Moderator</option>
					</select>
					<input type="submit" name="submit_role" value="submit_role"/>			
				  </form>';	
		}
	}
} 
?>




<html>
<head>
</head>
<body>
<form action ="connect1.php" method="post">
<input type="text" name="searchq" placeholder="search here">
<input type="submit" value="search" name="submit"/>
</form>
</body>
</html>


<?php
//session_start();

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