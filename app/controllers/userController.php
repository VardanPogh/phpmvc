<?php

class userController extends Controller
{


    public function index()
    {

    }

    public function auth()
    {
        $login = $this->model('User')->auth($_POST['login'], $_POST['password']);
        if ($login != 'success') {
            $data['error'] = $login;
            $this->view('templates/header');
            $this->view('user/login', $data);
        }
    }

    public function login()
    {
        $this->view('templates/header');
        $this->view('user/login');
    }

    public function logout()
    {
        $this->model('User')->logout();
    }


}