<?php
// Kết nối MySQL
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<div class="alert alert-success" role="alert">Đăng ký thành công!</div>';
}
include_once("config/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra thông tin người dùng
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // So sánh mật khẩu nhập vào với mật khẩu mã hóa trong database
        if (password_verify($password, $user['password'])) {
            echo "Đăng nhập thành công!";
            // Khởi tạo session và chuyển đến trang quản lý sinh viên
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location:xem_sinhvien");
        } else {
            echo "Mật khẩu không chính xác!";
        }
    } else {
        echo "Email không tồn tại!";
    }

    $stmt->close();
}
$conn->close();
