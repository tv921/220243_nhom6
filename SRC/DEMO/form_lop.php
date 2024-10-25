<?php include_once("baovelogin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Form LỚP HỌC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .container {
      flex: 1;
      margin-top: 70px;
    }
  </style>
</head>

<body>
  <?php include_once('giao_dien.php'); ?>
  <div class="container">
    <h2>QUẢN LÝ THÔNG TIN LỚP HỌC</h2>
    <form action="xuly_themlop" method="post">
      <div class="form-group">
        <label for="malop">Mã lớp:</label>
        <input type="text" class="form-control" id="malop" placeholder="Nhập mã lớp" name="txtMa" required>
      </div>
      <div class="form-group">
        <label for="tenlop">Tên lớp:</label>
        <input type="text" class="form-control" id="tenlop" placeholder="Nhập tên lớp" name="txtTen" require>
      </div>
      <div class="form-group">
        <label for="tenlop">Ghi chú:</label>
        <input type="text" class="form-control" id="tenlop" placeholder="Nhập ghi chú" name="txtghichu">
      </div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
      <a class="btn btn-primary" href="lophoc">Quay lại</a>
    </form>
  </div>
  <?php //include_once('footer.php'); 
  ?>
</body>

</html>