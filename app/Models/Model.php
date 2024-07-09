<?php
namespace App\Models;
class Model {
    public function __construct() {
        if (!file_exists($this->fileName)) {
            file_put_contents($this->fileName, json_encode([]));
        }
    }

    public function create(array $data) {
        file_put_contents($this->fileName, json_encode($data));
        return $data;
    }
}