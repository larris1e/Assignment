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

    function checkUser($email){
        $checkFile = fopen('../storage/users.csv', 'r');
        while(!feof($checkFile)){
           $getUser = fgetcsv($checkFile); 
            if($getUser[1] == $email){
                return true;
            }
        }
        fclose($checkFile);
        return false;
    }

    
    $data=array($username,$email,$password);

    $file = fopen('../storage/users.csv','a');
    $user= checkUser($email);

    if($user){
    echo "
    <script>
     alert ('This email has been used already');
     window.location.href='../forms/register.html';
    </script>"; 
   }
else{
        $file = fopen('../storage/users.csv', 'a');
        fputcsv($file, $data);
        fclose($file);
    echo "
    <script>
     alert ('User Successfully Registered! Proceed to login to your account now');
     window.location.href='../forms/login.html';
    </script>";
    }
}
