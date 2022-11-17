<?php
session_start();
//checking if post is set or not
if (isset($_POST)) {
    //extracting values
    $name = $_POST['Uname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $jobType = $_POST['jobType'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    //checking if fields are empty or not
    if ($name != "" && $email != "" && $pass != "" && $cpass != "" && $phoneNumber != "") {
        if ($pass == $cpass) {
            require_once '../config/config.php';
            //creating object of users class
            $obj = new User();
            $attributes = array('name' => $name, 'email' => $email,'phone_number'=> $phoneNumber, 'job_type'=>$jobType ,  'pass'=> $pass);
            $user = User::create($attributes);
            header("Location:../views/login/index.php");
        } else {
            $_SESSION['errors'] = "password doesn't match";
            header("Location:../views/registration/index.php");
        }
    } else {
        $_SESSION['errors'] = "Fields cannot be empty";
        header("Location:../views/registration/index.php");
    }
}
