<?php
// Kết nối đến cơ sở dữ liệu
include_once("config/connect.php");

// Kiểm tra xem dữ liệu có được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $maSV = $_POST['masv'];
    $hoLot = $_POST['hosv'];
    $tenSV = $_POST['tensv'];
    $ngaySinh = $_POST['date'];
    $gioiTinh = $_POST['gender'];
    $diaChi = $_POST['diaChi'];
    $maLop = $_POST['malop'];

    // Kiểm tra nếu maLop có trong bảng lophoc
    $stmtCheck = $conn->prepare("SELECT * FROM lophoc WHERE malop = ?");
    $stmtCheck->bind_param("s", $maLop);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Sử dụng prepared statement để tránh SQL injection
        $stmt = $conn->prepare("UPDATE sinhvien SET hoLot = ?, tenSV = ?, ngaySinh = ?, gioiTinh = ?, diaChi = ?, maLop = ? WHERE maSV = ?");
        $stmt->bind_param("sssssss", $hoLot, $tenSV, $ngaySinh, $gioiTinh, $diaChi, $maLop, $maSV);

        if ($stmt->execute()) {
            // Nếu cập nhật thành công, chuyển hướng về trang xem sinh viên
            header("Location: xem_sinhvien.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng statement
        $stmt->close();
    } else {
        echo "Mã lớp không hợp lệ.";
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}
