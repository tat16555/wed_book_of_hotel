<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'book_of_hotel');
define('DB_USER', 'root');
define('DB_PASS', '');
define('API_KEY', 'def12d071c12a7a9bf5862bc3bb9b0c719d32e073e0a3b8dbcd0d64b7f1f06ea');

class Connect extends PDO {
    public function __construct(){
        parent::__construct("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
?>
