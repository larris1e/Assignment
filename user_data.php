
<?php

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$country = $_POST['country'];
$gender = $_POST['gender'];



echo "NAME: " . $name . "<br>";
echo "EMAIL: " . $email . "<br>";
echo "DOB: " . $dob . "<br>";
echo "COUNTRY: " . $country . "<br>";
echo "GENDER: " . $gender . "<br>";



extract($_REQUEST);
$file=fopen("userdata.csv","a");

fwrite($file,"name :");
fwrite($file, $name ."\n");
fwrite($file,"Email :");
fwrite($file, $email ."\n");
fwrite($file,"dob :");
fwrite($file, $dob ."\n");
fwrite($file,"country :");
fwrite($file, $country ."\n");
fwrite($file,"gender :");
fwrite($file, $gender ."\n");

fclose($file);

?>
