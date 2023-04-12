<?php

include 'classautoloader.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $login = new Login_Contr($username, $password);
    $login->loginUser();

    header('Location: ../index.php?error=none');


}

