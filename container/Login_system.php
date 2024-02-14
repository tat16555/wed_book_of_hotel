<?php
session_start();
require_once '../config/db.php';
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate email and password
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมลให้ถูกต้อง';
    } elseif (empty($password) || strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่านระหว่าง 5 ถึง 20 ตัวอักษร';
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);
            
            if ($check_data->rowCount() > 0) {
                // User found in the database
                if (password_verify($password, $row['password'])) {
                    // Password is correct

                    // Set session variables based on user role
                    if ($row['urole'] == 'user') {
                        $_SESSION['user_login'] = $row['id'];
                        header("location: ../Home.php");
                        exit();
                    } elseif ($row['urole'] == 'admin') {
                        $_SESSION['admin_login'] = $row['id'];
                        header("location: ../admin/admin.php");
                        exit();
                    }
                } else {
                    // Password is incorrect
                    $_SESSION['error'] = 'รหัสผ่านผิด';
                }
            } else {
                // User not found in the database
                $_SESSION['error'] = 'ไม่พบผู้ใช้ในระบบ';
            }
        } catch (PDOException $e) {
            // Handle database errors
            $_SESSION['error'] = 'มีข้อผิดพลาดในการเข้าถึงฐานข้อมูล: ' . $e->getMessage();
        }
    }

    // Redirect back to the sign-in page
    header("location: ../book_of_hotel/content/Login.php");
    exit();
}

?>
