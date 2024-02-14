<?php 
    session_start();
    require "../../config/db.php";

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
?>
