<?php
include_once("config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $masv = $_POST['masv'];
    $hosv = $_POST['hosv'];
    $tensv = $_POST['tensv'];
    $date =  $_POST['date'];
    $male = $_POST['gender'];
    $diachi = $_POST['diaChi'];
    $malop = $_POST['malop'];

    $sql = "INSERT INTO sinhvien (maSV,hoLot,tenSV,ngaySinh,gioiTinh,diaChi,maLop) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param("sssssss", $masv, $hosv, $tensv, $date, $male,$diachi, $malop);

        if ($stmt->execute()) {
            header("Location:xem_sinhvien.php");
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng statement
        $stmt->close();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
