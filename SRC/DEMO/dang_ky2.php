<?php
include_once("config/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra nếu email đã tồn tại
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();
    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        if ($result->num_rows > 0) {
            echo "Email này đã tồn tại!";
        } else {
            // Chèn người dùng mới vào database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            if ($stmt->execute()) {
                header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
                header("Pragma: no-cache"); // HTTP 1.0
                header("Expires: 0"); // Proxies
                // Điều hướng về index.php kèm theo thông báo thành công
                header("Location: ./?message=success");
                exit();  // Đảm bảo quá trình điều hướng dừng lại ở đây
            } else {
                echo "Có lỗi xảy ra!";
            }
            $stmt->close();
        }
        $check_email->close();
    } else {
        header("Location: form-dang-ky?message=success");
    }
}
$conn->close();
