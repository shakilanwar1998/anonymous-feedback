<?php

namespace App\Controllers;
class AuthController {
    public function index() {
        return $this->login();
    }

    public function login() {

        view('login');
    }
}