<?php 
    session_start();
    require_once("../config/db.php");
    require_once("../container/isset_user.php");

    // Initialize $quantity variable
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';

    // Pagination variables
    $itemsPerPage = 3; // Number of items per page
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Retrieve hotel rooms from database
    if (isset($_GET['province'])) {
        $province = $_GET['province'];
        $country = $_GET['country'];
        $country = $_GET['quantity'];
        $stmt = $conn->prepare("SELECT * FROM book_room WHERE province LIKE :province AND country >= :country AND quantity1 >= :quantity LIMIT :offset, :limit");
        $stmt->bindValue(':province', "%$province%", PDO::PARAM_STR);
        $stmt->bindValue(':country', $country, PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_STR);
    } else {
        $stmt = $conn->prepare("SELECT * FROM book_room LIMIT :offset, :limit");
    }
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $book_room = $stmt->fetchAll();

    // Calculate total pages for pagination
    $totalPages = ceil(count($book_room) / $itemsPerPage);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book of Hotel.com</title>
    <link rel="icon" type="image/ico" href="img/ico/BH-Book-of-Hotel.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />

 <style>
    .yellow-background-form {
        background-color: yellow;
        padding: 10px;
        border-radius: 50px;
    }

    .no-gutters .col {
        padding: 0;
    }

    .room-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #e1e1e1;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .room-card img {
        max-width: 100%;
        max-height: 200px;
        object-fit: cover;
    }

    .room-details {
        flex: 1;
        margin-left: 15px;
    }

    .room-details h5,
    .room-details p {
        margin: 0;
    }
</style>

</head>
<body>
    <?php require_once("nav/nav.php"); ?>
    <div class="container my-5">
        <!-- Your search form -->
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-2">
                <?php require_once("nav/nav2.php"); ?>
            </div>
            <div class="col-lg-10" id="room-container">
                <div class="py-3" id="projects">
                    <h3 class="border-bottom border-light">จุดหมายที่กำลังมาแรง <i class="bi bi-cup-hot"></i></h3>
                    <h6>ตัวเลือกยอดนิยม <i class="bi bi-book"></i></h6>
                </div>
                <?php foreach($book_room as $room): ?>
                    <!-- Your card items -->
                    <div class="room-card">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($room['image_hotel']); ?>" alt="image hotel">
                        <div class="room-details">
                            <h2><?php echo $room['name_hotel']; ?></h2>
                            <p><?php echo $room['details']; ?></p>
                            <h3>ราคา <a class="badge rounded-pill bg-success"><?php echo $room['price1']; ?></a></h3>
                            <a href="Hotel.php?id=<?=$room['id']?>" class="btn btn-primary">จอง</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                            <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Your footer -->
    <footer class="text-center bg-dark text-white py-5">
        <p>bookofhotel.com บริษัทในเครือ <a href="#" title="Book of Hotel Inc." target="_blank" class="text-success">book of hotel Inc.</a> ผู้นำระดับโลกด้านการจองออนไลน์สำหรับการเดินทางและบริการอื่น ๆ ที่เกี่ยวข้อง</p>
    </footer>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-cUzpI9bBlE5w7yJ4m5l2L1vBJr6Pam/JR8e5GH5b5h51fl4N/50PjCc/DvRrZfvec"
        crossorigin="anonymous"></script>
    <!-- Your additional scripts -->
</body>
</html>
