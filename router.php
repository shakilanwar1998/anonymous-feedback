<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\AboutController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/about':
        $controller = new AboutController();
        $controller->index();
        break;

    case '/login':
        $controller = new AuthController();
        $controller->index();
        break;

    case '/post-login':
        $controller = new AuthController();
        $controller->postLogin();
        break;

    case '/register':
        $controller = new AuthController();
        $controller->register();
        break;

    case '/post-register':
        $controller = new AuthController();
        $controller->postRegister();
        break;

    default:
        http_response_code(404);
        break;
}