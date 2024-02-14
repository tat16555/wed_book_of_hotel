<?php 
    session_start();
    require_once("config/db.php");
    require_once("container/isset_user.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book of Hotel.com</title>
    <link rel="icon" type="image/ico" href="img/ico/BH-Book-of-Hotel.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <!-- นำเข้า navigation logic -->
            <a class="navbar-brand" href="Home.php"><img src="img/ico/BH-Book-of-Hotel.ico" width="30" height="30" border-radius="10px" class="d-inline-block align-top" alt="Your Logo"> Book of hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Register your hotel</a>
                    </li>              
                    <?php
                        // ตรวจสอบว่ามี session user_login อยู่หรือไม่
                        if (isset($_SESSION['user_login'])) {
                            // ถ้ามี session user_login แสดงชื่อผู้ใช้แทนที่ปุ่ม Register
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="#about">' . htmlspecialchars($row['username']) . '</a>
                                </li>';
                            
                            // แสดงปุ่ม Log out
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="container/logout.php">Log out</a>
                                </li>';
                        } else {
                            // ถ้าไม่มี session user_login แสดงปุ่ม Register
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="#about">Register</a>
                                </li>';
                            
                            // แสดงปุ่ม Log in
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="content/Login.php">
                                        Log in
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </a>
                                </li>';
                        }
                        ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header style="background-image: url('img/accommodation6-1024x404.jpg'); background-size: cover; background-repeat: no-repeat; height: 600px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col text-center">
                    <h1 class="display-3 text-white">
                        <span class="bg-black text-light p-2"><img src="img/ico/BH-Book-of-Hotel.ico" width="80" height="80" style="border-radius: 50%;" class="d-inline-block align-top" alt="Your Logo"></span>
                        <span class="d-none d-sm-inline text-light-grey">Book of Hotel</span>
                    </h1>
                    <div class="input-group mt-4 w-75 mx-auto">
                        <?php require_once("content/nav/Search-room.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Language Buttons -->
    <div class="container text-center mt-3">
        <button class="btn btn-primary" onclick="changeLanguage('en')">English</button>
        <button class="btn btn-primary" onclick="changeLanguage('th')">ไทย</button>
    </div>

    <?php 
        if (isset($_SESSION['user_login'])) {
            $user_id = $_SESSION['user_login'];
            $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    ?>

    <!-- Page Content -->
    <div class="container my-5">
              <!-- Project Section -->
              <div class="py-3" id="projects">
                  <h3 class="border-bottom border-light">จุดหมายที่กำลังมาแรง <i class="bi bi-cup-hot"></i></h3>
                  <h6>ตัวเลือกยอดนิยมที่สุดสำหรับผู้เดินทางจากไทย <i class="bi bi-book"></i></h6>
              </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="content/Search-accommodation.php?province=Bangkok&country=&quantity=" class="card-link">
                    <div class="card">
                        <img src="img/province/620029.jpg" class="card-img-top" alt="กรุงเทพมหานคร" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">กรุงเทพมหานคร</h5>
                        </div>
                    </div>
                </a>
            </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <a href="content/Search-accommodation.php?province=Chiang Mai&country=&quantity=" class="card-link">
                <div class="card">
                    <img src="img/province/688668.jpg" class="card-img-top" alt="เชียงใหม่" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">เชียงใหม่</h5>
                    </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
              <div class="card">
                <a href="/content/Search-accommodation.php?province=Chonburi&country=&quantity=" class="card-link">
                  <img src="img/province/49651.jpg" class="card-img-top" alt="พัทยา" style="object-fit: cover; height: 200px;">
                  <div class="card-body">
                      <h5 class="card-title">พัทยา</h5>
                  </div>
                </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <a href="content/Search-accommodation.php?province=Phuket&country=&quantity=" class="card-link">
                <div class="card">
                    <img src="img/province/Phuket312.jpg" class="card-img-top" alt="ภูเก็ต" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">ภูเก็ต</h5>
                    </div>
                </div>
            </a>
          </div>
      </div>
        <!-- About Section -->
        <div class="py-3" id="about">
            <h3 class="border-bottom border-light">ประเภทที่พัก</h3>
        </div>

        <div class="row py-4">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="img/province/688668.jpg" class="card-img-top" alt="hotel" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">hotel</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="img//Accommodation-type/Apartment.jpeg" class="card-img-top" alt="Apartment" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Apartment</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="img/Accommodation-type/Resort.jpeg" class="card-img-top" alt="Resort" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Resort</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="img/Accommodation-type/Villa.jpeg" class="card-img-top" alt="Villa" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">Villa</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Image of location/map -->
    <div class="container my-5">
        <img src="img/rendering of hotel loft.jpg" class="w-100" alt="Hotel Loft">
    </div>

    <!-- Footer -->
    <footer class="text-center bg-dark text-white py-5">
        <p>bookofhotel.com บริษัทในเครือ <a href="#" title="Book of Hotel Inc." target="_blank" class="text-success">book of hotel Inc.</a> ผู้นำระดับโลกด้านการจองออนไลน์สำหรับการเดินทางและบริการอื่น ๆ ที่เกี่ยวข้อง</p>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+ENXzXod1iqOf1KEFfxtuAv/yy6XzoUp5tbulvM" crossorigin="anonymous"></script>
    <!-- Your existing JavaScript code -->
    <script src="js/mobiscroll.javascript.min.js"></script>
    <script>
        function changeLanguage(lang) {
            var currentUrl = window.location.href;
            var newUrl;
            
            if (lang === 'en') {
                newUrl = currentUrl.replace('/th/', '/en/');
            } else if (lang === 'th') {
                newUrl = currentUrl.replace('/en/', '/th/');
            }
            
            window.location.href = newUrl;
        }
    </script>
</body>
</html>
