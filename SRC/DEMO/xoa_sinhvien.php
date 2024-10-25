<?php

include_once("config/connect.php");


if (isset($_GET['masv'])) {
    $maSV = $_GET['masv'];

    $stmt = $conn->prepare("DELETE FROM sinhvien WHERE maSV = ?");
    $stmt->bind_param("s", $maSV);

    if ($stmt->execute()) {

        header("Location: xem_sinhvien.php");
        exit();
    } else {

        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Mã sinh viên không hợp lệ.";
}


$conn->close();
