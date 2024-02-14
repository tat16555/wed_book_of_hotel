<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require_once("../../navbar/nav_H.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once("../../navbar/main_bar.php"); ?>
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- form start -->
              <form action="../../../container/Tools_admin/am_upload_hotel.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Name Hotel</label>
                    <input type="texe" class="form-control" name="name_hotel" placeholder="name hotel">
                  </div>
                  <div class="form-group">
                    <label>details Hotel</label>
                    <textarea class="form-control" rows="5" name="details" placeholder="Enter ..."></textarea>
                  </div>zip code
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- select -->
                          <div class="form-group">
                            <label>Province</label>
                            <select name="province" class="form-control">
                              <option>Bangkok</option>
                              <option>Chiang Mai</option>
                              <option>Chonburi</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control">
                              <option>Thailand</option>
                            </select>
                        </div>
                      </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image_hotel" id="exampleInputFile1" onchange="displayFileName('exampleInputFile1')">
                        <label class="custom-file-label" for="exampleInputFile">Image Hotel</label>
                      </div>                       
                    </div>
                  </div>
                  </div><hr>
                  <div class="form-group">
                    <label for="exampleInput">Room Size 1</label>
                    <input type="texe" class="form-control" name="room_size1" placeholder="Room Size">
                  </div>
                  <div class="form-group">
                    <label>Details Room</label>
                    <textarea class="form-control" rows="3" name="details_room1" placeholder="Enter ..."></textarea>
                  </div>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="view_room1" class="form-control" placeholder="view_room1">
                      </div>
                      <div class="col-6">
                        <input type="text" name="price1" class="form-control" placeholder="price (numbers only)">
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="quantity1" class="form-control" placeholder="quantity (numbers only)">
                      </div>
                      <div class="col-6">
                        <input type="text" name="Total1" class="form-control" placeholder="Total number of rooms (numbers only)">
                      </div>
                    </div><br>
                    <label>Image Room</label>
                    <div class="row">
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room1_1" id="exampleInputFile2" onchange="displayFileName('exampleInputFile2')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room1_2" id="exampleInputFile3" onchange="displayFileName('exampleInputFile3')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room1_3" id="exampleInputFile4" onchange="displayFileName('exampleInputFile4')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>                    
                    </div>
                    <hr>
                    <hr>
                    <hr>
                    <div class="form-group">
                    <label for="exampleInput">Room Size 2</label>
                    <input type="texe" class="form-control" name="room_size2" placeholder="Room Size">
                  </div>
                  <div class="form-group">
                    <label>Details Room</label>
                    <textarea class="form-control" rows="3" name="details_room2" placeholder="Enter ..."></textarea>
                  </div>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="view_room2" class="form-control" placeholder="view_rooml">
                      </div>
                      <div class="col-6">
                        <input type="text" name="price2" class="form-control" placeholder="price (numbers only)">
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="quantity2" class="form-control" placeholder="quantity (numbers only)">
                      </div>
                      <div class="col-6">
                        <input type="text" name="Total2" class="form-control" placeholder="Total number of rooms (numbers only)">
                      </div>
                    </div><br>
                    <label>Image Room</label>
                    <div class="row">
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room2_1" id="exampleInputFile5" onchange="displayFileName('exampleInputFile5')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room2_2" id="exampleInputFile6" onchange="displayFileName('exampleInputFile6')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room2_3" id="exampleInputFile7" onchange="displayFileName('exampleInputFile7')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>              
                </div>
                <hr>
                <hr>
                <hr>
                    <div class="form-group">
                    <label for="exampleInput">Room Size 3</label>
                    <input type="texe" class="form-control" name="room_size3" placeholder="Room Size">
                  </div>
                  <div class="form-group">
                    <label>Details Room</label>
                    <textarea class="form-control" rows="3" name="details_room3" placeholder="Enter ..."></textarea>
                  </div>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="view_room3" class="form-control" placeholder="view_rooml">
                      </div>
                      <div class="col-6">
                        <input type="text" name="price3" class="form-control" placeholder="price (numbers only)">
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="quantity3" class="form-control" placeholder="quantity (numbers only)">
                      </div>
                      <div class="col-6">
                        <input type="text" name="Total3" class="form-control" placeholder="Total number of rooms (numbers only)">
                      </div>
                    </div><br>
                    <label>Image Room</label>
                    <div class="row">
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room3_1" id="exampleInputFile8" onchange="displayFileName('exampleInputFile8')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room3_2" id="exampleInputFile9" onchange="displayFileName('exampleInputFile9')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                      <div class="col-4">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_room3_3" id="exampleInputFile10" onchange="displayFileName('exampleInputFile10')">
                          <label class="custom-file-label" for="exampleInputFile">Image Room</label>
                        </div>
                      </div>
                      </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form> 
          </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Admin.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>


<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  function displayFileName(inputId) {
    var input = document.getElementById(inputId);
    var label = input.nextElementSibling;
    var fileName = input.files[0].name;
    label.innerHTML = fileName;
  }
</script>


</body>
</html>
