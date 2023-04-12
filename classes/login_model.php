<?php

class Login_Model extends Dbh {

    protected function getUser($username, $password) {
        $sql = "SELECT `password` FROM `users` WHERE username = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$username, $password])) {
            $stmt = null;
            header('Location: ../index.php?error=failed1');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../index.php?error=failed2');
            exit();
        }


        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $password_verify = password_verify($password, $pwdHashed[0]['password']);

        if($password_verify == false) {
            $stmt = null;
            header('Location: ../index.php?error=failed3');
            exit();
        } else if($password_verify == true) {
            $sql = "SELECT * FROM `users` WHERE username = ? OR email = ? AND password = ?";
            $stmt = $this->connect()->prepare($sql);
            

            if(!$stmt->execute([$username, $username, $password])) {
                $stmt = null;
                header('Location: .../index.php?error=failed4');
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header('Location: .../index.php?error=failed5');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];

            $stmt = null;
        }

        $stmt = null;

    }
 

}