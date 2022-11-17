<?php
session_start();
//checking if post is set or not
if (isset($_POST)) {
    //extracting values
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ($email != "" && $pass != "") {
        //checking if fields are empty or not           
        require_once '../config/config.php';
        //creating object of users class
        $obj = new User();
        $user = User::all(array('conditions' => array('email = ? AND pass = ?', $email, $pass)));
        if(empty($user)){
            $_SESSION['errors'] = "Email Password doesn't match";
            header("Location:../views/login/index.php");
        }else{
        
            $row = array("id" => $user[0]->id, "name" => $user[0]->name, "email" => $user[0]->email, "pass" => $user[0]->pass, "phoneNumber" => $user[0]->phone_number, "jobType" => $user[0]->job_type); 
            $userDetails = implode(".", $row);
            //encrpting the details
            $encrypted_string=openssl_encrypt($userDetails,"AES-128-ECB","KeyToEncrpt");
            $_SESSION['user'] = $encrypted_string;
            header("Location:../views/login/success.php");
        
        }
    } else {
        $_SESSION['errors'] = "Fields cannot be empty";
        header("Location:../views/login/index.php");
    }
}
