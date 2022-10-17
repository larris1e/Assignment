<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email']; //finish this line
    $password = $_POST['password'];//finish this
    // $_SESSION['email'] = $getdata[1];

loginUser($email, $password);
}
function loginUser($email, $password){
    $file = fopen('../storage/users.csv','r');
        while (!feof($file)){
            $getdata=fgetcsv($file);

            if ($getdata[1]==$email && $getdata[2]==$password){
                echo "
                <script>
                alert ('You have succesfully logged in');
                window.location.href='../dashboard.php';
                </script>";
                exit();
            }
            else if ($getdata[1]== $email && $getdata[2]!=$password){
                echo "
                <script>
                alert ('Credentials do not match');
                //window.location.href='../forms/login.html';
                </script>";
                exit();
            }
            else{
                echo "
                <script>
                 alert ('Incorrect credentials!');
                 //window.location.href='../forms/login.html';
                </script>";
                exit();
            }
           
        }
        echo" $getdata[0].$getdata[1].$getdata[2]";
 
        fclose($file);       
    }
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */

// echo "HANDLE THIS PAGE";

