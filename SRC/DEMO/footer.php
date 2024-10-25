<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    footer {
      height: 200px;
      background-color: #343a40;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px 0;
    }

    footer h5 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    footer a {
      text-decoration: none;
      /* Bỏ gạch dưới */
      color: white;
      transition: color 0.3s;
      /* Chỉ giữ hiệu ứng chuyển màu */
      display: flex;
      align-items: center;
    }

    footer a:hover {
      color: #ccc;
      /* Chuyển màu khi hover */
      text-decoration: none;
      /* Đảm bảo không có gạch dưới khi hover */
    }

    .social-icon {
      margin-right: 10px;
      font-size: 1.2rem;
      /* Kích thước biểu tượng lớn hơn */
    }

    .text-center {
      margin-top: auto;
      padding-top: 10px;
      /* Thêm khoảng cách trên */
    }

    .email-icon {
      color: #ffcc00;
      /* Màu vàng nhạt cho biểu tượng email */
    }

    .phone-icon {
      color: #00c853;
      /* Màu xanh lá cây nhẹ cho biểu tượng điện thoại */
    }
  </style>
  <title>Footer</title>
</head>

<body>
  <div class="flex-grow"></div>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Về Chúng Tôi</h5>
          <ul class="list-unstyled">
            <li><a href="#">Xem thông tin lớp học</a></li>
            <li><a href="#">Xem thông tin sinh viên</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Liên Hệ</h5>
          <ul class="list-unstyled">
            <li><a href="#"><i class="fas fa-envelope social-icon email-icon"></i>Email: contact@example.com</a></li>
            <li><a href="#"><i class="fas fa-phone social-icon phone-icon"></i>Điện thoại: 0123-456-789</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Kết Nối Với Chúng Tôi</h5>
          <ul class="list-unstyled">
            <li><a href="#"><i class="fab fa-facebook social-icon" style="color: #3b5998;"></i>Facebook</a></li>
            <li><a href="#"><i class="fab fa-twitter social-icon" style="color: #1da1f2;"></i>Twitter</a></li>
            <li><a href="#"><i class="fab fa-instagram social-icon" style="color: #c32aa3;"></i>Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>