<?php
session_start();

require("loaddb.php");

$uname= $_SESSION['uname'];
//if (isset($_POST['search'])) {
//$id = $_POST['id'];
//echo $email;
$db = mysqli_connect($url, "root", '', "alumnihub") or die ("Failed to connect");
$query = "select f_name,l_name,email,contact_no,nic,password from user where username='$uname'";
$result = mysqli_query($db, $query);
if ($row = mysqli_fetch_assoc($result)) {

    $fname = $row['f_name'];
    $lname = $row['l_name'];
    $email = $row['email'];
    $phone = $row['contact_no'];
    $ic = $row['nic'];
    $password = $row['password'];
    //echo $username;
    // header('Location: login.php');
}
mysqli_free_result($result);
mysqli_close($db);



//}
//else {
//$username ='' ;
//$email='';
//$phone='' ;
//}
if(isset($_POST['submit'])){
    $Username = $_POST['uname'];
    $Firstname = $_POST['fname'];
    $Lastname = $_POST['lname'];
    $Email = $_POST['email'];
    $ContactNumber = $_POST['ph_number'];
    $NICNumber = $_POST['ic'];
    $Password = $_POST['password'];


    $db = mysqli_connect($url, "root", '', "alumnihub") or die ("Failed to connect");
    $query = "update user set username='$Username',f_name='$Firstname',l_name='$Lastname',email='$Email',contact_no='$ContactNumber',nic='$NICNumber',password='$Password' where username='$uname '";
    $result = mysqli_query($db,$query);
    if($result) {
        echo "Succesfully updated";
        echo '<script>window.location="home.php"</script>';

        //header('Location: login.php');
    }
    else {
        echo "Failed to update";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Your details</title>
</head>
<body>
<h1>Update Your Details</h1>
<html>
<title>Demo|Lisenme</title>
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

<style>

    h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
    body {font-family: "Open Sans"}


    .select-boxes{width: 280px;text-align: center;}
    select {
        background-color: #F5F5F5;
        border: 1px double #15a6c7;
        color: #1d93d1;
        font-family: Georgia;
        font-weight: bold;
        font-size: 14px;
        height: 39px;
        padding: 7px 8px;
        width: 250px;
        outline: none;
        margin: 10px 0 10px 0;
    }
    select option{
        font-family: Georgia;
        font-size: 14px;}
    /*h6{
        font-size: 14px;
        height: 39px;
        width: 250px;

        }*/
    input{
        font-family: Georgia;
        font-weight: bold;
        font-size: 14px;
        height: 39px;
        padding: 7px 8px;
        width: 250px;
        outline: none;
        margin: 10px 0 10px 0;}

    button{
        font-family: Georgia;
        font-weight: bold;
        font-size: 10px;
        height: 30px;
        padding: 7px 8px;
        width: 100px;
        outline: none;
        margin: 10px 0 10px 0;}
</style>
<body class="w3-blue">

<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small" style="height:5%">

    <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a>
    <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
    <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-phone"></i></a>
    <!--<a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>-->
</div>
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">


    </header>


    <!-- Image header -->


    <!-- Grid -->
    <div class="w3-row w3-padding w3-border">

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
            <!--<div class="w3-container w3-white w3-margin w3-padding-large">-->
            <form method="post" action="update.php">

                User Name:         <input type="text" required="" name="u_name" value="<?php echo $uname;?>"><br><br>
                First Name:         <input type="text" name="fname" value="<?php echo $fname;?>"><br><br>
                Last Name:         <input type="text" name="lname" value="<?php echo $lname;?>"><br><br>
                Email:        <input type="text" name="email" value="<?php echo $email;?>"readonly><br><br>
                Phone Number: <input type="int" name="ph_number" value="<?php echo $phone?>"><br><br>
                NIC Number:         <input type="int" name="ic" value="<?php echo $ic;?>"><br><br>
                Pass word:         <input type="text" name="password" value="<?php echo $password;?>"><br><br>

                <input type="submit" name="submit" value="Update Details">
            </form>
</body>
</html>