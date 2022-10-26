<?php
session_start();
if($_SESSION){
    session_destroy();
    header('Location: ../index.php');
}
else{
    echo "<script> alert ('You are not logged in') </script>";
    header('Location: ../forms/login.html');
}

