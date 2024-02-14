<?php
// เช็คว่าอยู่ที่หน้า book_of_hotel/Home.php หรือไม่
    $current_page_home = basename($_SERVER['PHP_SELF']);
    $is_book_of_hotel_home = ($current_page_home == 'Home.php' && strpos($_SERVER['REQUEST_URI'], 'book_of_hotel') !== false);

// กำหนดค่า href และ src ตามเงื่อนไข
    if ($is_book_of_hotel_home) {
    // nav href & ico 
        $href_value = 'Home.php';
        $src_value = 'img/ico/BH-Book-of-Hotel.ico';
    // nav login
        $href_value_login = '../book_of_hotel/content/Login.php';
    // nav logout
        $href_value_logout = '../book_of_hotel/container/logout.php';
        } else {
    // nav href & ico 
        $href_value = '../Home.php';
        $src_value = '../img/ico/BH-Book-of-Hotel.ico';
    // nav login
        $href_value_login = './Login.php';
    // nav logout
        $href_value_logout = '../container/logout.php';
    }       
?>