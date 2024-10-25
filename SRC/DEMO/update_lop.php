<?php
include_once("config/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $ma = $_POST['txtMa'];
    $ten = $_POST['txtTen'];
    $ghichu = $_POST['txtgChu'];
    $oldMaLop = $_POST['oldMaLop'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($ma) || empty($ten)) {
        echo "Mã lớp và tên lớp không được để trống.";
        exit;
    }

    $checkQuery = "SELECT * FROM lophoc WHERE maLop = ? AND maLop != ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $ma, $oldMaLop);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Mã lớp đã tồn tại. Vui lòng chọn mã lớp khác.";
        exit;
    }

    // Cập nhật dữ liệu
    $updateQuery = "UPDATE lophoc SET maLop = ?, tenLop = ?, ghiChu = ? WHERE maLop = ?";
    $stmt = $conn->prepare($updateQuery);
    if ($stmt === false) {
        echo "Lỗi trong quá trình chuẩn bị câu lệnh: " . $conn->error;
        exit;
    }

    // Thực hiện cập nhật
    $stmt->bind_param("ssss", $ma, $ten, $ghichu, $oldMaLop);
    if ($stmt->execute()) {
        header("Location: lophoc.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}

$conn->close();
