<?php

include 'classautoloader.php';
//View

if(isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass_repeat = $_POST['re-type_p'];
    $email = $_POST['email'];


    $signup = new Signup_Contr($username, $password, $pass_repeat, $email);
    $signup->signupUser();

    header('Location: ../index.php?error=none');
    
}