<?php 
    session_start();
    require_once("../config/db.php");
    require_once("../container/isset_user.php");
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

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
            height: auto;
            object-fit: cover;
        }

        .room-details {
            flex: 1;
            margin-left: 15px;
        }

        .room-details h5 {
            margin: 0;
        }

        .room-details p {
            margin: 0;
        }
    </style>
</head>
<body>
    <?php require_once("nav/nav.php"); ?>
    <?php
        $stmt = $conn->prepare("SELECT * FROM book_room WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
            
        if($stmt->rowCount()){
            $row = $stmt->fetch(PDO::FETCH_OBJ);
        }
    ?>
    
    <!-- Main content -->
    <section class="content">
    <div class="container my-5">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
          <header style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($row->image_hotel); ?>'); background-size: cover; background-repeat: no-repeat; height: 600px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col text-center">
                        <h1 class="display-3 text-white">
                            <span class="d-none d-sm-inline text-light-grey"><?php echo $row->name_hotel; ?></span>
                        </h1>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row mt-4">
                <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">will receive</a>
                </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $row->details; ?></div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?php echo $row->details_room1; ?></div>

                </div>
            </div><hr>
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row->image_room1_1); ?>" alt="image hotel" class="product-image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="data:image/jpeg;base64,<?php echo base64_encode($row->image_room1_1); ?>" alt="image hotel"></div>
                <div class="product-image-thumb" ><img src="data:image/jpeg;base64,<?php echo base64_encode($row->image_room1_2); ?>" alt="image hotel"></div>
                <div class="product-image-thumb" ><img src="data:image/jpeg;base64,<?php echo base64_encode($row->image_room1_3); ?>" alt="image hotel"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $row->room_size1; ?></h3>
              <p><?php echo $row->details; ?></p>
              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                <?php echo $row->price1; ?>
                </h2>
                <h4 class="mt-0">
                  <small>Ex Tax: <?php echo $row->price1; ?> </small>
                </h4>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>              
            </div><hr>
            </div>
          </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </section>
    <!-- /.content -->
  
<!-- Footer -->
<footer class="text-center bg-dark text-white py-5">
    <p>bookofhotel.com บริษัทในเครือ <a href="#" title="Book of Hotel Inc." target="_blank" class="text-success">book of hotel Inc.</a> ผู้นำระดับโลกด้านการจองออนไลน์สำหรับการเดินทางและบริการอื่น ๆ ที่เกี่ยวข้อง</p>
</footer>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cUzpI9bBlE5w7yJ4m5l2L1vBJr6Pam/JR8e5GH5b5h51fl4N/50PjCc/DvRrZfvec" rossorigin="anonymous"></script>
</body>

</html>


