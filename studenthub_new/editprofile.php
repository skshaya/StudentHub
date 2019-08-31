<?php
	spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

require_once("header.php");

session_start();
  
	//$id=$_SESSION['user_id'];
require("loaddb.php");
	  $user_id=$_SESSION['id']->getUserId();
          //$user=$_SESSION['id'];
	
	 if(isset($user_id)){
             //echo "dhfushdeufh";
             //$db=new Database();
             //$sql= $db->query("SELECT * FROM user where user_id =".$user_id);
             //$result= $db->result;
             
         }
if(isset($_POST['submit'])){
//$uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $regno = $_POST['regno'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $batch = $_POST['batch'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $contact = $_POST['phone_no'];
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $filepath = "images/" . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        //echo "<img src='" . $filepath . "' height=200 width=300 />";
    } else {
        //echo "Error!!!";
    }
 
	 
		
    
   //$id = $_GET['user_id'];
 
   $user=new User();
   $user->editprofile($user_id,$fname, $lname, $regno, $address, $phone_no, $nic, $dob, $filepath, $email, $occ, $batch, $degree, $password);
                 //$id->editprofile($id,$fname, $lname, $regno, $address, $contact, $nic, $dob, $filepath, $email, $occupation, $batch, $degree);  
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
		<label class="w3-left"><b>Registration Number  </b></label>
        </td><td>
            <input type="text" class="w3-input w3-border w3-right" required="" name = "regno" value="<?php echo $regno;?>" />
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
            <input class="w3-input w3-border w3-right"  type="text" name = "occupation" value="<?php echo $occ;?>" />
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
            <input type="text" class="w3-input w3-border w3-right" name="nic" value="<?php echo $nic;?>" maxlength="10" />
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