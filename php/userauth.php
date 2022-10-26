<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
    $checkusers="select * from Students where Email='$email'";
    $checkrow=mysqli_query($conn, $checkusers);

   //check if user with this email already exist in the database
//    $conn = db();
   
   if(mysqli_num_rows($checkrow) > 0){

      echo"<script> alert('Email already used pls use another email');
      </script>";
      echo "<script>window.location.href = ('../forms/register.html'); </script>";
 
 }

else{
    $query = "INSERT INTO `students` (`Full_names`, `Country`, `Email`, `Gender`, `password`) VALUES ('$fullnames', '$country', '$email', '$gender', '$password');";

      if(mysqli_query($conn,$query)){
     echo"<script> alert('Registered successfully. Proceed to login now');</script>";
     echo "<script>window.location.href = ('../forms/login.html'); </script>";
 }
 else{
     echo"<script> alert('Registration not successful');</script>";
     echo "<script>window.location.href = ('../forms/register.html'); </script>";
  }     
}
}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    session_start(); 
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard

    $st="select * from Students where Email='$email' and password='$password'";
    $result2 = mysqli_query($conn,$st);
    $datas = mysqli_num_rows($result2);
if ($datas >0){
    $_SESSION['Email']=$email;
header("location:../dashboard.php");
}
else{
echo"<script> alert('Error login! Email and  password does not match');</script>";
echo "<script>window.location.href = ('../forms/login.html'); </script>";

}
    
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";

    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
    $st="select * from Students where Email='$email' ";
    $result2 = mysqli_query($conn,$st);
    $datas = mysqli_num_rows($result2);
    if ($datas >0){
        $query = "UPDATE `students` SET `password` = '$password' WHERE `students`.`Email` = '$email';";
        
            if (mysqli_query($conn,$query)){
                echo"<script> alert('Record updated successfully! login with your new password now');</script>";
                echo "<script>window.location.href = ('../forms/login.html'); </script>";
            }
            else{
                echo"<script> alert('Record not updated');</script>";
                echo "<script>window.location.href = ('../forms/resetpassword.html'); </script>";

            }
    }
    else{
        echo"<script> alert('No data found!');</script>";
    }
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['Id'] . "</td>
                <td style='width: 150px'>" . $data['Full_names'] .
                "</td> <td style='width: 150px'>" . $data['Email'] .
                "</td> <td style='width: 150px'>" . $data['Gender'] . 
                "</td> <td style='width: 150px'>" . $data['Country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['Id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
     $st="delete from Students where Id='$id' ";
    

    if ( mysqli_query($conn,$st)){
        echo"<script>
        alert('Record deleted');
        </script>";
        echo "<script>window.location.href = ('../dashboard.php'); </script>";
    }
    else{
        echo"<script>
        alert('Record not deleted');
        </script>";
        echo "<script>window.location.href = ('../dashboard.php'); </script>";
    }
 }
