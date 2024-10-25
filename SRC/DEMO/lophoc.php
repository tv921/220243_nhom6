<?php include_once("baovelogin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>QUẢN LÝ THÔNG TIN LỚP HỌC</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
		<h2>QUẢN LÝ THÔNG TIN LỚP HỌC</h2>
		<div class="d-flex justify-content-end mt-3" style="gap: 10px;">
			<a class=" btn btn-primary" href="xem_sinhvien">Xem sinh viên</a>
			<a class="btn btn-primary" href="form_lop">Thêm lớp</a>
		</div>
		<?php
		include_once("config/connect.php");
		//Viết câu truy vấn
		$sql = "SELECT*FROM lophoc";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<table class = 'table table-bordered table-hover mt-3'>";
			echo "<tr class = table-primary ><th >Mã lớp</th><th>Tên lớp</th><th>Ghi chú</th><th>Sửa</th><th>Xóa</th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["maLop"] . "</td>";
				echo "<td>" . $row["tenLop"] . "</td>";
				echo "<td>" . $row["ghiChu"] . "</td>";
				echo "<td>"
		?>
				<a class="btn btn-success btn-sm" href="sua_lop?ma=<?php echo $row["maLop"]; ?>"><i class='fas fa-edit'></i></a>
				<?php
				echo "</td>";
				echo "<td>"
				?>
				<a class="btn btn-danger btn-sm" onclick="return confirm('Có thực sự muốn xóa không?')" href="xoa_lop.php?ma=<?php echo $row["maLop"]; ?> "><i class='fas fa-trash-alt'></i></a>
		<?php
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>
	<?php //include_once('footer.php'); ?>
</body>

</html>