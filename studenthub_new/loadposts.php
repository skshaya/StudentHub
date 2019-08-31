<?php
    spl_autoload_register(function ($class_name) {
          include 'classes/'.$class_name . '.php';
     });

    session_start();

    $id = $_SESSION['id']->getUserId();
    $type=$_POST['type'];
    
    if($type=="event"){
        $event=new Event();
        $event->loadEvents($id);
    } 
    
    if($type=="vacancy"){
        $vacancy=new Vacancy();
        $vacancy->loadVacancies($id);
    }
    
    if($type=="achieve"){
        $achieve=new Achievement();
        $achieve->loadAchievements($id);
    }
    
    
	
?>