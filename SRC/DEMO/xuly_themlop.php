<?php
include_once("config/connect.php");

//Lấy dữ liệu từ form
$ma = $ten = "";
if (!empty($_POST["txtMa"]) && !empty($_POST["txtTen"])) {
	$ma = $_POST["txtMa"];
	$ten = $_POST["txtTen"];
	$ghichu = $_POST["txtghichu"];
}
//Viết câu truy vấn

$sql = "INSERT INTO lophoc (maLop, tenLop, ghiChu)VALUES ('$ma', '$ten','$ghichu')";
//Thực thi
if ($conn->query($sql) === TRUE) {
	header("Location:lophoc");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
//Đóng kết nối
$conn->close();
