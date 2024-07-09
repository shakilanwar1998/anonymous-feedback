<?php

use App\Controllers\AuthController;
use App\Controllers\FeedbackController;
use App\Controllers\HomeController;
use App\Controllers\DashboardController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case '/login':
        $controller = new AuthController();
        $controller->index();
        break;

    case '/logout':
        $controller = new AuthController();
        $controller->logout();
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

    case '/post-feedback':
        $controller = new FeedbackController();
        $controller->store();
        break;

    case '/feedback-success':
        $controller = new FeedbackController();
        $controller->success();
        break;

    case (bool)preg_match('#^/feedback(?:/([^/]+))?$#', $request, $matches):
        $controller = new FeedbackController();
        $param = $matches[1] ?? null;
        $controller->index($param);
        break;

    default:
        http_response_code(404);
        break;
}