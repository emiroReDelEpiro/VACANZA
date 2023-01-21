<?php
    session_start();
    $_SESSION['valid'] = false;

    $username =  $_POST['username'];
    $password = $_POST['password'];

    $data = file_get_contents("login.json"); 
    $jsonArray = json_decode($data, true);
    
    $valid = false;

    foreach($jsonArray as $value){
        if($value['username'] == $username && 
            $value['password'] == $password){
            $valid = true;
        }
    }
    
    $_SESSION['valid'] = $valid;


    if($valid){
        if($username == "admin") {
            header("Location: adminChartPage.php");
        }
        else {
            header("Location: index.php");
        }
    }else{
        header("Location: loginPage.php?valid=WrongCredentials");
    }

?>