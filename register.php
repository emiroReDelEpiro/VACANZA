<?php
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];

    $data = file_get_contents("login.json"); 
    $jsonArray = json_decode($data, true);

    $valid = true;

    $errorMessage = "";
    $id = 1;

    foreach($jsonArray as $value){
        if($value['username'] == $username){
            $valid = false;
            $errorMessage = "username alredy in use";
        }
        $id++;
    }

    if($password != $password2){
        $valid = false;
        $errorMessage .= " password do not match";
    }

    echo $errorMessage;

    $_SESSION['valid'] = $valid;

    if($valid){

        $data = [
            'id' => $id,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'logged' => false,
            'type' => "supplier",
        ];
        
        $inp = file_get_contents('login.json');
        $tempArray = json_decode($inp);
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents('login.json', $jsonData);

        header("Location: index.php");
    }else{
        header("Location: registerPage.php?valid=".$errorMessage);
    }
?>