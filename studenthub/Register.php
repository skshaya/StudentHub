<?php
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

session_start();

if (isset($_SESSION['id'])) {
    header('Location: login.php');
}

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $regno = $_POST['regno'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $batch = $_POST['batch'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $nic = $_POST['ic'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $filepath = "images/" . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        echo "<img src='" . $filepath . "' height=200 width=300 />";
    } else {
        echo "Error!!!";
    }

    $user = new User();
    $user->register($uname, $password, $fname, $lname, $regno, $address, $contact, $nic, $dob, $filepath, $email, $occupation, $batch, $degree);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Register</title>
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
	html,body,h1,h2,h3,h4,h5,label,p,b {font-family: "Open Sans", sans-serif}
	</style>
</head>
<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">UWU Student Hub</a>
  <a href="login.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white" title="Login">Login</a>
 </div>
</div>
<!-- Page Container -->
<div class="w3-container w3-content w3-center" style="max-width:600px;margin-top:80px;vertical-align: middle;">
		<div class="w3-card w3-round">
			<div class="w3-white w3-padding-large"> 
            <h1>Register</h1><br/>
 <script type="text/javascript">

        <!--


        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("");
        }
        //--></script>
    <form method="post" action="Register.php" enctype="multipart/form-data">
	<table align="center">
		<style>td{padding:5px;}</style>
        <tr><td>
		<label class="w3-left"><b>User Name  </b></label>
        </td><td>
            <input type="text" class="w3-input w3-border w3-right" required="" name = "uname" placeholder="Enter username">
        </td></tr>
         <tr><td>
		<label class="w3-left"><b>Registration Number  </b></label>
        </td><td>
            <input type="text" class="w3-input w3-border w3-right" required="" name = "regno" placeholder="Enter registration number">
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>First Name  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" required="" name = "fname" placeholder="Enter First name">
        </td></tr>
		<tr><td>
		<label class="w3-left"><b>Last Name  </b></label>
        </td><td>
            <input type="text" class="w3-input w3-border w3-right" required="" name = "lname" placeholder="Enter Last name">
		</td></tr>
		<tr><td>
		<label class="w3-left"><b>Date Of Birth  </b></label>
        </td><td>
            <input type="date" class="w3-input w3-border w3-right" required="" name = "dob" placeholder="Enter Last name">
		</td></tr>
		<tr><td>
		<label class="w3-left" ><b>Address  </b></label>
        </td><td>
			
            <textarea class="w3-input w3-border w3-right" required="" name = "address" id="" placeholder="Enter Address"></textarea>
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Degree Programme </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" required="" name = "degree" placeholder="Enter Degree Programme">
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Batch  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" required="" name = "batch" placeholder="Enter Your Batch">
        </td></tr>
		<tr><td>
		<label class="w3-left" ><b>Occupation  </b></label>
        </td><td>
            <input class="w3-input w3-border w3-right"  type="text" required="" name = "occupation" placeholder="Enter Occupation">
        </td></tr>
		<tr><td><label class="w3-left"><b>Email  </b></label>
        </td><td>
            <input type="email" class="w3-input w3-border w3-right" required="" name="email" placeholder="Enter mail here">
		<td>
		</tr>
		<tr>
		<td>
        <label class="w3-left"><b>Phone Number  </b></label>
           </td><td> 
			<input class="w3-input w3-border w3-right" type="int" name="phone" required="" placeholder="Enter ph no" onkeyup="Check(event)" onkeydown="Check(event)" maxlength="10">
            </td></tr>
			<script>
                function Check(e) {
                    var keyCode = (e.keyCode ? e.keyCode : e.which);
                    if (keyCode <7 ||(keyCode >9 && keyCode <12)|| (keyCode>13&&keyCode < 46) || (keyCode > 58 &&  keyCode < 96 ) || (keyCode > 106)) {
                        e.preventDefault();
                    }
                }
                var input_field = document.getElementById('the_id');

                input_field.addEventListener('change', function() {
                    var v = parseFloat(this.value);
                    if (isNaN(v)) {
                        this.value = '';
                    } else {
                        this.value = v.toFixed(0);
                    }
                });
            </script>
		<tr><td><label class="w3-left"><b>NIC Number  </b></label></td><td>
            <input type="text" class="w3-input w3-border w3-right" required="" name="ic" placeholder="Enter NIC Number" maxlength="10">
			</tr>
				
			<tr><td>
			<label class="w3-left"><b>Password  </b></label></td><td>
			<input class="w3-input w3-border w3-right" type="password" name="password" required="" placeholder="Password" id="txtNewPassword" />
			</td></tr>
			<tr><td>
			<label class="w3-left"><b>Confirm Password </b></label></td>
			<td>
            <input class="w3-input w3-border w3-right" type="password" name="cpassword" required="" placeholder="Confirm Password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" />
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

    
    <input type="submit" class="w3-btn w3-theme-d2" name="submit" value="Register"><br/><br/></td></tr></table>
    </form>
			</div>
		</div>
</div>
</body>
</html>