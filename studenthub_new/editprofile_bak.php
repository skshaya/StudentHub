<?php
	require_once('header.php');
	
	$link = mysqli_connect($url, $dbuser, $dbpass,$dbname);
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$id=$_SESSION['id'];
	//$id=17;
	
$query = "SELECT * FROM user where user_id='$id'";
if($result = mysqli_query($link, $query)){
	   
	    if(mysqli_num_rows($result) > 0){
			 
	        while($row = mysqli_fetch_array($result)) {

				$fname = $row['f_name'];
				$lname = $row['l_name'];
				$email = $row['email'];
				$phone_no = $row['contact_no'];
				$ic = $row['nic'];
				$password = $row['password'];
				$address = $row['address'];
				$degree = $row['degree'];
				$batch = $row['batch'];
				$occupation = $row['occupation'];
				$dob=$row['dob'];
				$filepath=$row['pro_pic'];
    
}
 mysqli_free_result($result);
 
	 if(isset($_POST['submit'])){
		if(isset($filepath)){
		 $filepath = "images/".basename($_FILES["file"]["name"]);
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
		{
			//echo "<img src='".$filepath."' height=200 width=300 />";
		}
		else 
		{
			echo "Error!!!";
		}
	}
    $Firstname = $_POST['fname'];
    $Lastname = $_POST['lname'];
    $Email = $_POST['email'];
    $contact_no = $_POST['phone_no'];
    $NICNumber = $_POST['ic'];
    $Password = $_POST['password'];
	$Address = $_POST['address'];
	$Degree = $_POST['degree'];
	$Batch = $_POST['batch'];
	$Occupation = $_POST['occupation'];
	$dobb=$_POST['dob'];
    
    $query1 = "update user set dob='$dobb',f_name='$Firstname',l_name='$Lastname',email='$Email',contact_no='$contact_no',nic='$NICNumber',password='$Password',address='$Address',degree='$Degree',batch='$Batch',occupation='$Occupation'";
    if(isset($filepath)){
	$query1.=",pro_pic='$filepath' ";
	}
	$query1.="where user_id='$id'";
	$result1 = mysqli_query($link,$query1);
    if($result1) {
        echo "Succesfully updated";
		$_SESSION['pp']=$filepath;
        //header('Location: home.php');

    }
    else {
        echo "Failed to update";
    }
}
	    } else{
	        echo "No records matching your query were found.";
	    }
		
	} else{
	    echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
	}



?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
        <div class="w3-container">

<form method="post" action="editprofile.php" class="w3-padding-large" enctype="multipart/form-data">
<h3 class="w3-center">Edit Profile</h3>
	<table align="center">
		<style>td{padding:5px;}</style>
        
		<tr><td>
		<label class="w3-left" ><b>First Name  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" name = "fname" value="<?php echo $fname;?>" />
        </td></tr>
		<tr><td>
		<label class="w3-left"><b>Last Name  </b></label>
        </td><td>
            <input type="text" class="w3-input w3-border w3-right" name = "lname" value="<?php echo $lname;?>" />
		</td></tr>
		<tr><td>
		<label class="w3-left"><b>Date of Birth  </b></label>
        </td><td>
            <input type="date" class="w3-input w3-border w3-right" name = "dob" value="<?php echo $dob;?>" />
		</td></tr>
		<tr><td>
		<label class="w3-left" ><b>Address  </b></label>
        </td><td>
			
            <input type="text" class="w3-input w3-border w3-right"  name = "address" id="" value="<?php echo $address;?>" />
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Degree Programme </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" name = "degree" value="<?php echo $degree;?>" />
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Batch  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" name = "batch" value="<?php echo $batch;?>" />
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Occupation  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" name = "occupation" value="<?php echo $occupation;?>" />
        </td></tr>
		<tr><td><label class="w3-left"><b>Email  </b></label>
        </td><td>
            <input type="email" class="w3-input w3-border w3-right" name="email" value="<?php echo $email;?>" />
		<td>
		</tr>
		<tr>
		<td>
        <label class="w3-left"><b>Phone Number  </b></label>
           </td><td> 
			<input class="w3-input w3-border w3-right" type="int" name="phone_no" value="<?php echo $phone_no?>" maxlength="10" />
            </td></tr>
			
		<tr><td><label class="w3-left"><b>NIC Number  </b></label></td><td>
            <input type="text" class="w3-input w3-border w3-right" name="ic" value="<?php echo $ic;?>" maxlength="10" />
			</tr>
				
			<tr><td>
			<label class="w3-left"><b>Password  </b></label></td><td>
			<input class="w3-input w3-border w3-right" type="password" name="password" value="<?php echo $password;?>" />
			</td></tr>
			
			<tr><td>
			<label class="w3-left"><b>Profile Picture </b></label></td>
			<td>
			
            <input class="w3-input w3-border w3-right" type="file" name="file" />
			
			</td></tr>
	<tr><td colspan="2">
        <div class="registrationFormAlert" style="color:red" id="divCheckPasswordMatch">
        </div></td></tr>
<tr><td colspan="2">
		<br/>

    
    <input type="submit" class="w3-btn w3-theme-d2" name="submit" value="Update"><br/><br/></td></tr></table>
    </form>
			</div>
		</div>
</div>
			</div>
		</div>
	</div>
</div>	

<?php 
	//add footer
	require_once('footer.php');
?>