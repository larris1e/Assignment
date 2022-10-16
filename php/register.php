<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $data=array($username,$email,$password."</br>");
    $file = fopen('../storage/users.csv','a');

    if($file){
        // echo "file opened"."<br>" ."and"."<br>";
        fputcsv($file,$data);
        fclose($file);
        echo "
        <script>
         alert ('User Successfully Registered! Proceed to login to your account now');
         window.location.href='../forms/login.html';
        </script>";
    }
    else{
        echo "
        <script>
         alert ('Not Registered');
         window.location.href='../forms/register.html';
        </script>";
    }   
    // echo "OKAY";
}
// echo "HANDLE THIS PAGE";
    // echo "
    // <script>
    //  alert ('No input from user found');
    //  window.location.href='../forms/register.html';
    // </script>";


