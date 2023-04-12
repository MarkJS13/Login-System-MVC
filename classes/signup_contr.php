<?php

//Controller

class Signup_Contr extends Signup_Model{
    private $username;
    private $password;
    private $pass_repeat;
    private $email;

    public function __construct($username, $password, $pass_repeat, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->pass_repeat = $pass_repeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header('Location: ../index.php?error=emptyInput');
            exit();
        } 

        if($this->invalidEmail() == false) {
            header('Location: ../index.php?error=invalidemail');
            exit();
        } 

        if($this->invalidUsername() == false) {
            header('Location: ../index.php?error=ivalidusername');
            exit();
        } 

        if($this->passwordMatch() == false) {
            header('Location: ../index.php?error=passworddoesntmatch');
            exit();
        } 

        if($this->existingUser() == false) {
            header('Location: ../index.php?error=alreadytaken');
            exit();
        } 


        $this->setUser($this->username, $this->password, $this->email);


    }

    private function emptyInput() {
        $result = false;
        if(empty($this->username) || empty($this->password) || empty($this->pass_repeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername() {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch() {
        $result = false;
        if($this->password !== $this->pass_repeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function existingUser() {
        $result = false;
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;

    }


}