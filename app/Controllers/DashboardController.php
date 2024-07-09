<?php
namespace App\Controllers;
use App\Models\Feedback;
use App\Models\User;

class DashboardController {
    public function index() {
        $user_id = $_SESSION['user_id'];

        $user = (new User())->findOne('id', $user_id);
        if(!$user) {
            header('location: /login');
            die();
        }

        $feedBacks = (new FeedBack())->findAll('user_id', $user_id);

        view('dashboard', [
            'user' => $user,
            'feedbacks' => $feedBacks
        ]);
    }
}