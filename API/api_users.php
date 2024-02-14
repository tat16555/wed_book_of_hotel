<?php
require_once __DIR__ . '/config.php';

class API {
    private $conn;

    public function __construct(){
        $this->conn = new Connect;
    }

    public function Select($apiKey){
        if ($apiKey !== API_KEY) {
            http_response_code(401); // Unauthorized
            return json_encode(array('error' => 'Unauthorized'));
        }

        $users = array();
        $data = $this->conn->prepare("SELECT * FROM users ORDER BY id");
        $data->execute();
        while ($results = $data->fetch(PDO::FETCH_ASSOC)) {
            $users[] = array(
                'id' => $results['id'],
                'firstname' => $results['firstname'],
                'lastname' => $results['lastname'],
                'username' => $results['username'],
                'phone' => $results['phone'],
                'email' => $results['email'],
                'gender' => $results['gender'],
                'urole' => $results['urole'],
                'created_at' => $results['created_at'],
            );
        }

        return json_encode($users);
    }
}

$API = new API;
header("Content-Type: application/json");

// Check if the 'api_key' parameter is provided in the request
$apiKey = isset($_GET['api_key']) ? $_GET['api_key'] : null;

echo $API->Select($apiKey);
?>
