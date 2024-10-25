<?php include_once("baovelogin.php"); ?>
<?php include_once('giao_dien.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0Pr9AgBXgU28phwyZ3UfVj8XrNeYD-Nw&callback=initMap" async defer></script>

    <title>Quản Lý Thông Tin Sinh Viên</title>
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

        a {
            text-decoration: none;

        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;

        }
    </style>
</head>

<body>
    <?php include_once('giao_dien.php'); ?>
    <div class="container ">
        <h2>QUẢN LÝ THÔNG TIN SINH VIÊN</h2>
        <div class="d-flex justify-content-end mt-3" style="gap: 10px;">
            <a class=" btn btn-primary" href="lophoc">Xem lớp học</a>
            <a class="btn btn-primary" href="form_sinhvien">Thêm mới</a>
        </div>
        <?php
        include_once("config/connect.php");

        $sql = "SELECT maSV, hoLot, tenSV, ngaySinh, gioiTinh, diaChi, maLop FROM sinhvien";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered  table-hover mt-3'>";
            echo "<thead><tr class = table-primary ><th>Mã SV</th><th>Họ</th><th>Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Địa chỉ</th><th>Mã Lớp</th><th>Sửa</th><th>Xóa</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["maSV"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["hoLot"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tenSV"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["ngaySinh"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["gioiTinh"]) . "</td>";
                echo "<td><a href='#' onclick='openMap(\"" . htmlspecialchars($row["diaChi"]) . "\")'>" . htmlspecialchars($row["diaChi"]) . "</a></td>";
                echo "<td>" . htmlspecialchars($row["maLop"]) . "</td>";
                echo "<td><a class='btn btn-success btn-sm' href='update_sinhvien?masv=" . ($row["maSV"]) . "'><i class='fas fa-edit'></i></a></td>";
                echo "<td><a class='btn btn-danger btn-sm' onclick=\"return confirm('Có thực sự muốn xóa không?')\" href='xoa_sinhvien.php?masv=" . ($row["maSV"]) . "'><i class='fas fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>Không có sinh viên nào trong cơ sở dữ liệu.</div>";
        }
        $conn->close();
        ?>

    </div>

    <!-- //<?php //include_once('footer.php'); 
            ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function openMap(address) {
        const url = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}`;
        window.open(url, '_blank');
    }
</script>


</html>