<?php

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

$id = $_POST['id'];
$content = $_POST['content'];
$type = $_POST['type'];

    if($type=="event"){
        $startTime=$_POST['startTime'];
        $endTime=$_POST['endTime'];
        $venue=$_POST['venue'];
    }else if($type=="achieve"){
        $aDate=$_POST["aDate"];
    }else if($type=="vacancy"){
        $pos=$_POST["pos"];
    }

if (isset($_FILES["image"])) {

    $target_dir = "user_img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk == 0) {
        exit;
    }
} else {
    $target_file = "NULL";
}

if($type=="event"){
    $event=new Event();
    $event->addEvent($content, $type, $id, $startTime, $endTime, $venue,$target_file);
}
else if($type=="achieve"){
    $achieve=new Achievement();
    $achieve->addAchievement($content, $type, $id, $aDate, $target_file);
}
else if($type=="vacancy"){
    $vacancy=new Vacancy();
    $vacancy->addVacancy($content, $type, $id, $pos, $target_file);
}

?>



