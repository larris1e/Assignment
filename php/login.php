<?php
if(isset($_POST['submit'])){
    $username = $_POST['email']; //finish this line
    $password = $_POST['password'];//finish this
    echo "$username.$password";
loginUser($email, $password);
}
function loginUser($email, $password){
    $file = fopen('../storage/users.csv','ra+');
    if($file){
        while ($getdata=fgetcsv($file)){
            echo" $getdata[0].$getdata[1].$getdata[2]";
            if ($getdata[1]== $email && $getdata[2]==$password){
                echo "
                <script>
                alert ('You have succesfully logged in');
                // window.location.href='dashboard.php';
                </script>";
            }
            else{
                echo "
                <script>
                 alert ('Incorrect credentials!');
                //  window.location.href='../forms/login.html';
                </script>";
            }
            fclose($file);
        }        
    }
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
}
echo "HANDLE THIS PAGE";

