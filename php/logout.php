<?php
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
session_start();
if($_SESSION){
    session_destroy();
    header('Location: ../index.php');
}
else{
    echo "<script> alert ('You are not logged in') </script>";
    header('Location: ../index.php');
}
}
logout();