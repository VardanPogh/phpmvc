<?php

class User {
	private $nama = 'User Name';


    public function __construct()
    {
        $this->db = new Database;
        $this->table = 'users';

    }

    public function logout(){
        unset($_SESSION["username"]);
        session_destroy();
        header('Location: ' . BASEURL );
        exit();

    }
    public function auth($login, $password)
    {
        if ($login && $password) {
            $this->db->query("SELECT id FROM {$this->table} WHERE login = :login and password = :password");
            $this->db->bind(':login', $login);
            $this->db->bind(':password', $password);
            $isAuth = $this->db->single();

            if ($isAuth === false) {
                $error = "Your Login or Password is invalid";
                return $error;
            } else {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login'] = $login;
                header('Location: ' . BASEURL );
                exit();

            }
        }
    }

    public function getUser()
	{
		return $this->nama;
	}
}