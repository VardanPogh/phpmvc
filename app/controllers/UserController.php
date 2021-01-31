<?php

class UserController extends Controller
{

    public function auth()
    {
        $login = $this->model('User')->auth($_POST['login'], $_POST['password']);
        if ($login != 'success') {
            $authInfo['error'] = $login;
            $this->view('layouts/header');
            $this->view('user/login', $authInfo);
        }else {
            header('Location: ' . BASEURL );
            exit();
        }
    }

    public function login()
    {
        $this->view('layouts/header');
        if (isset($_SESSION['login'])) {
            $this->redirect('/');
        }
        $this->view('user/login');
    }

    public function logout()
    {
        $logout = $this->model('User')->logout();
        if ($logout) {
            header('Location: ' . BASEURL );
            exit();
        }else {
            return $logout;
        }
    }


}