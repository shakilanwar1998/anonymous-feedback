<?php

namespace App\Controllers;
class AuthController {
    public function index() {
        $this->login();
    }

    public function login() {
        if (isset($_SESSION['user'])){
            view('dashboard');
        }
        view('login');
    }

    public function register() {
        if (isset($_SESSION['user'])){
            view('dashboard');
        }
        view('register');
    }

    public function postRegister() {
        var_dump($_REQUEST);
    }

    public function postLogin() {
        var_dump($_REQUEST);
    }
}