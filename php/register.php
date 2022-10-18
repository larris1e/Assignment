<?php
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION = $_POST['fullname'];
    
registerUser($username, $email, $password);
}

function registerUser($username, $email, $password){

    //save data into the file
    $data=array($username,$email,$password."</br>");
    $file = fopen('../storage/users.csv','a');
    
    $readFile =fopen('../storage/users.csv','r');
    $checkFile=fgetcsv($readFile);

    if($checkFile[1] == $email){
        echo "
        <script>
         alert ('This email has been used already');
         window.location.href='../forms/register.html';
        </script>";
    }
    else{
        fputcsv($file,$data);
        fclose($file);
        echo "
        <script>
         alert ('User Successfully Registered! Proceed to login to your account now');
         window.location.href='../forms/login.html';
        </script>";
    }   
}


