<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email']; //finish this line
    $password = $_POST['password'];//finish this

loginUser($email, $password);
}
function loginUser($email, $password){
    $file = fopen('../storage/users.csv','r');
   
        while (!feof($file)){
            $getdata=fgetcsv($file); 
            if ($getdata[1]==$email && $getdata[2]==$password){
                $_SESSION['username'] = $getdata[0];
                echo "
                <script>
                alert ('You have succesfully logged in');
                </script>";
                header('Location: ../dashboard.php');
            }
            else{
                echo "<script> alert('Incorrect credentials!');
                    window.location.href='../forms/login.html';
                </script>";
            }
           
        } 
        fclose($file);       
    }
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */

// echo "HANDLE THIS PAGE";

