<?php
if(isset($_POST['submit'])){
    $email = $_POST['email']; //complete this;
    $newpassword = $_POST['password'];//complete this;

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
        //if it does, replace the password

    $readFile =fopen('../storage/users.csv','r');

    while(!feof($readFile)){
        $checkFile=fgetcsv($readFile);
        if ($checkFile[1] == $email){
            
            $checkFile[2] = $newpassword;
            $openFile = fopen('../storage/users.csv','w');
            fputcsv($openFile,$checkFile);
            
            echo" <script> alert('Password Successfully modified!');
             window.location.href='../forms/login.html';
            </script>";
            fclosecsv($openFile);
            }
        else{
            echo" <script> alert('User does not exit');
             window.location.href='../forms/resetpassword.html';
            </script>";
        } 
    }
     
}

