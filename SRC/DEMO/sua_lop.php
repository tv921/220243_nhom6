<?php include_once("baovelogin.php"); ?>
<?php
include_once("config/connect.php");

// Lấy mã lớp từ GET để hiển thị thông tin
if (isset($_GET['ma'])) {
	$ma = $_GET['ma'];

	// Truy vấn dữ liệu lớp học
	$sql = "SELECT * FROM lophoc WHERE maLop = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $ma);
	$stmt->execute();
	$result = $stmt->get_result();
	$product = $result->fetch_assoc();

	// Kiểm tra nếu lớp học tồn tại
	if (!$product) {
		echo "Lớp học không tồn tại.";
		exit;
	}
} else {
	echo "Không có mã lớp được cung cấp.";
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Form LỚP HỌC</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<style>
		body {
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.container {
			flex: 1;
			margin-top: 70px;

		}

		footer {
			background-color: #f8f9fa;
			padding: 20px 0;

		}
	</style>
</head>

<body>
	<?php include_once('giao_dien.php'); ?>
	<div class="container">
		<h2>CẬP NHẬT THÔNG TIN LỚP HỌC</h2>
		<form action="update_lop.php" method="POST">
			<div class="form-group">
				<label for="malop">Mã lớp:</label>
				<input type="text" class="form-control" id="malop" name="txtMa" value="<?php echo htmlspecialchars($product['maLop']); ?>" required readonly>
			</div>
			<div class="form-group">
				<label for="tenlop">Tên lớp:</label>
				<input type="text" class="form-control" id="tenlop" name="txtTen" value="<?php echo htmlspecialchars($product['tenLop']); ?>" required>
			</div>
			<div class="form-group">
				<label for="ghichu">Ghi chú:</label>
				<input type="text" class="form-control" id="ghichu" name="txtgChu" value="<?php echo htmlspecialchars($product['ghiChu']); ?>">
			</div>
			<input type="hidden" name="oldMaLop" value="<?php echo htmlspecialchars($product['maLop']); ?>">
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
	</div>
	<?php //include_once('footer.php'); 
	?>
</body>

</html>