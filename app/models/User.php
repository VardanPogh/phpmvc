<?php

class User {
	private $name = 'User Name';

    public function __construct()
    {
        $this->db = new DB;
        $this->table = 'users';

    }

    public function logout()
    {
        try {
            unset($_SESSION["username"]);
            session_destroy();
            return true;
        }catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function auth($login, $password)
    {
        if ($login && $password) {
            $this->db->prepare("SELECT id FROM {$this->table} WHERE login = ? and password = ?");
            $this->db->bindParam('ss', [$login, $password]);
            $this->db->execute();
            $result = $this->db->getResult();
            $user = $result->fetch_array(MYSQLI_ASSOC);
            if (!$user['id']) {
                $error = "Your Login or Password is invalid";
                return $error;
            } else {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login'] = $login;
                return true;
            }
        }
    }
}