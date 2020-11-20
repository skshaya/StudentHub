<?php
session_start();

$db = mysqli_connect("localhost", "root", '', "studenthub") or die ("Failed to connect");

if(isset($_POST['submit'])){
	$searchq = $_POST['searchq'];		
	$query = "select * from user where (fname LIKE '%$searchq%' OR lname LIKE '%$searchq%' OR (fname + lname) LIKE '%$searchq%') AND role<>'admin'";
	$result = mysqli_query($db, $query);
	if ($result) {
		while($row = mysqli_fetch_array($result)){
			$fname=$row['fname'];
			$lname=$row['lname'];
			$user_id=$row['user_id'];
			$_SESSION['id']=$user_id;
			//echo "***********";
			echo $_SESSION['id'];
			
			echo $row['fname'] . " " . $row['lname'] . "<br>";
			echo $row['degree'];
			echo '<form method="POST" action="mypage.php">
					<select name="role" style="margin:right;">
						<option value="">Select role ID</option>
						<option value="general">User</option>
						<option value="admin">Administrator</option>
						<option value="mod">Moderator</option>
					</select>
					<input type="submit" name="submit_role" value="submit_role"/>			
				  </form>';	
		}
	}
} 
?>