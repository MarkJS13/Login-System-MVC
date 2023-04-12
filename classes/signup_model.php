<?php

class Signup_Model extends Dbh {

    protected function setUser($username, $password, $email) {
        $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
        
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$username, $password_hashed, $email])) {
            $stmt = null;
            header('Location: ../index.php?error=failed');
            exit();
        }

        $stmt = null;

    }
 
    
    protected function checkUser($username, $email) {
        $sql = "SELECT username FROM `users` WHERE username = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$username, $email])) {
            $stmt = null;
            header('Location: ../index.php?error=alreadyTaken');
            exit();
        };

        $result = '';

        if($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;


    }

}