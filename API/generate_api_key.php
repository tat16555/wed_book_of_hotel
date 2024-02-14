<?php
// generate_api_key.php

require_once __DIR__ . '/config.php';

class API {
    private $conn;

    public function __construct(){
        $this->conn = new Connect;
    }

    public function generateApiKey(){
        // สร้าง API key ใหม่
        $apiKey = bin2hex(random_bytes(32));

        // เพิ่ม API key ลงในฐานข้อมูล
        $query = $this->conn->prepare("INSERT INTO api_keys (api_key) VALUES (:api_key)");
        $query->bindParam(':api_key', $apiKey);
        $query->execute();

        return $apiKey;
    }
}

$API = new API;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiKey = $API->generateApiKey();
    echo "Your API key: $apiKey";
}
?>
