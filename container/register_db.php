<?php 

    session_start();
    require_once 'config/db.php';

    //start API google recaptcha
    $secret = '6LcQrzIkAAAAAEMyqW8N-rsYniPUGUrlwagytcfs'; //คีAPI
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
        $verifyResponse = file_get_contents('https://google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha);
        $responseData = json_decode($verifyResponse); 
        if(!$captcha) {
            $_SESSION['error'] = "[error 421] คุณไม่ได้ป้อน reCAPTCHA อย่างถูกต้อง!";
            header("location: ../content/register.php");
        }
        if (isset($_POST['signup']) && $responseData->success) {
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $c_password = $_POST['c_password'];
            $urole = 'user';
            
            
            if (empty($username)) {
                $_SESSION['error'] = 'กรุณากรอกusername';
                header("location: ../content/register.php");
            } else if (strlen($_POST['username']) > 20 || strlen($_POST['username']) < 5) {
                $_SESSION['error'] = 'usernameต้องมีความยาวอย่างน้อย 3 ตัวอักษร แต่ไม่เกิน 20 ตัวอักษร';
            } else if (empty($phone)) {
                $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
                header("location: ../content/register.php");
            } else if (strlen($_POST['phone']) > 10 || strlen($_POST['phone']) < 10) {
                $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง';
                header("location: ../content/register.php");
            } else if (empty($email)) {
                $_SESSION['error'] = 'กรุณากรอกอีเมล';
                header("location: ../content/register.php");
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
                header("location: ../content/register.php");
            } else if (empty($password)) {
                $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
                header("location: ../content/register.php");
            } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
                $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
                header("location: ../content/register.php");
            } else if (empty($c_password)) {
                $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
                header("location: ../content/register.phpp");
            } else if ($password != $c_password) {
                $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
                header("location: ../content/register.php");
            } else {
                try {
    
                    $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                    $check_email->bindParam(":email", $email);
                    $check_email->execute();
                    $row = $check_email->fetch(PDO::FETCH_ASSOC);
    
                    if ($row['email'] == $email) {
                        $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                        header("location: ../content/register.php");
                    } else if (!isset($_SESSION['error'])) {
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("INSERT INTO users(username, phone, email, password, urole) 
                                                VALUES(:username, :phone, :email, :password, :urole)");
                        $stmt->bindParam(":username", $username);
                        $stmt->bindParam(":phone", $phone);
                        $stmt->bindParam(":email", $email);
                        $stmt->bindParam(":password", $passwordHash);
                        $stmt->bindParam(":urole", $urole);
                        $stmt->execute();
                        $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว!";
                        header("location: ../Home.php");
                    } else {
                        $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                        header("location: ../content/register.php");
                    }
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
?>