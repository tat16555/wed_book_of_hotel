<?php
    // Your existing PHP code
    session_start();
    require_once("../config/db.php");
    require_once("../container/isset_user.php");

    // Pagination variables
    $itemsPerPage = 10; // Set the number of items to display per page
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Modified query to include pagination parameters
    $stmt = $conn->prepare("SELECT * FROM book_room LIMIT :offset, :limit");
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch and process the results
    $hotelRooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your existing head content -->

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
</head>
<body>
    <?php require_once("nav/nav.php"); ?>
    <!-- Your existing search form -->

    <!-- Page content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-2">
                <?php require_once("nav/nav2.php"); ?>
            </div>

            <div class="col-lg-10">
                <!-- Display your hotel rooms here -->
                <?php foreach ($currentPageRooms as $room): ?>
                    <!-- Display each hotel room -->
                    <div class="card">
                        <!-- Your hotel room content -->
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

    <!-- Your existing footer -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-cUzpI9bBlE5w7yJ4m5l2L1vBJr6Pam/JR8e5GH5b5h51fl4N/50PjCc/DvRrZfvec"
        crossorigin="anonymous"></script>
</body>
</html>
