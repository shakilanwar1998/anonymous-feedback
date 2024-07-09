<?php
namespace App\Controllers;

use App\Models\Feedback;
use App\Models\User;

class FeedbackController {
    public Feedback $model;
    public function __construct() {
        $this->model = new Feedback();
    }
    public function index($slug) {
        $user = (new User())->findOne('slug', $slug);
        if(!$user) {
            http_response_code(404);
            die();
        }
        view('feedback', ['user' => $user]);
    }

    public function store() {
        $data = [
            'user_id' => $_REQUEST['user_id'] ?? null,
            'feedback' => $_REQUEST['feedback'] ?? null,
        ];
        $this->model->create($data);
        header('Location: /feedback-success');
    }

    public function success(): void
    {
        view('feedback_success');
    }
}