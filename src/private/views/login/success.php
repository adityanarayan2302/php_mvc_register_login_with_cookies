<?php
session_start();
//checking if user is logged in
if(!isset($_SESSION['user']))
header("Location:./index.php");
echo "Login Successful<br>";
//displaying user details
//decrpting the details
$decrypted_string=openssl_decrypt($_SESSION['user'],"AES-128-ECB","KeyToEncrpt");
$arr = explode(".", $decrypted_string);
echo "<br>Encrpted string: ". $_SESSION['user'];
echo "<br>Name: ". $arr[1];
echo "<br>email: ". $arr[2];
//log out link
echo "<br><a href='./loggout.php'> Loggout</a>"
?>