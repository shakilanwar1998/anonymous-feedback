<?php
namespace App\Models;
class Model {
    protected string $filePath;
    public function __construct() {
        $this->filePath = './data/'.$this->fileName;
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function create(array $data) {
        $fileData = json_decode(file_get_contents($this->filePath), true);
        $auto_increment = $fileData['auto_increment'] ?? 0;
        $auto_increment++;
        $fileData['auto_increment'] = $data['id'] = $auto_increment;

        $fileData['data'][] = $data;

        file_put_contents($this->filePath, json_encode($fileData));
        return $data;
    }

    public function findOne($key, $value) {
        $db = json_decode(file_get_contents($this->filePath), true);
        $data = $db['data'] ?? array();
        foreach ($data as $item) {
            if (isset($item[$key]) && $item[$key] == $value) {
                return $item;
            }
        }
        return null;
    }

    public function findAll($key, $value) {
        $db = json_decode(file_get_contents($this->filePath), true);
        $data = $db['data'] ?? array();

        $result = [];
        foreach ($data as $item) {
            if (isset($item[$key]) && $item[$key] == $value) {
                $result[] = $item;
            }
        }
        return $result;
    }
}