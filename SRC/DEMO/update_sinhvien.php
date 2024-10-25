<?php include_once("baovelogin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sửa Thông Tin Sinh Viên</title>
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
    <?php
    include_once("config/connect.php");
    if (isset($_GET['masv'])) {
        $maSV = $_GET['masv'];

        $stmt = $conn->prepare("SELECT * FROM sinhvien WHERE maSV = ?");
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $sinhVien = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy sinh viên.";
            exit();
        }


        $sql = "SELECT malop, tenlop FROM lophoc";
        $resultLop = $conn->query($sql);
        $lop_options = [];

        if ($resultLop->num_rows > 0) {
            while ($row = $resultLop->fetch_assoc()) {
                $lop_options[] = $row;
            }
        } else {
            echo "Không có lớp nào.";
        }
    } else {
        echo "Mã sinh viên không hợp lệ.";
        exit();
    }

    $conn->close();
    ?>

    <div class="container">
        <h2 style="text-align: center;">SỬA THÔNG TIN SINH VIÊN</h2>
        <form action="sua_sinhvien.php" method="POST">
            <input type="hidden" name="masv" value="<?php echo htmlspecialchars($sinhVien['maSV']); ?>">
            <div>
                <label class="form-label" for="masvien">Mã sinh viên</label>
                <input class="form-control mb-2" type="text" name="masv" value="<?php echo htmlspecialchars($sinhVien['maSV']); ?>" readonly required>
            </div>
            <div>
                <label class="form-label" for="hosvien">Họ</label>
                <input class="form-control mb-2" type="text" name="hosv" value="<?php echo htmlspecialchars($sinhVien['hoLot']); ?>" required>
            </div>
            <div>
                <label class="form-label" for="tensvien">Tên</label>
                <input class="form-control mb-2" type="text" name="tensv" value="<?php echo htmlspecialchars($sinhVien['tenSV']); ?>" required>
            </div>
            <div>
                <label class="form-label" for="date">Ngày sinh</label>
                <input class="form-control mb-2" type="date" name="date" value="<?php echo htmlspecialchars($sinhVien['ngaySinh']); ?>" required>
            </div>
            <div class="form-group">
                <label>Giới tính:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Nam" <?php if ($sinhVien['gioiTinh'] == 'Nam') echo 'checked'; ?> required>
                    <label class="form-check-label" for="male">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Nữ" <?php if ($sinhVien['gioiTinh'] == 'Nữ') echo 'checked'; ?>>
                    <label class="form-check-label" for="female">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="other" name="gender" value="Khác" <?php if ($sinhVien['gioiTinh'] == 'Khác') echo 'checked'; ?>>
                    <label class="form-check-label" for="other">Khác</label>
                </div>
            </div>
            <div>
                <label class="form-label" for="date">Địa chỉ</label>
                <input class="form-control mb-2" type="text" name="diaChi" value="<?php echo htmlspecialchars($sinhVien['diaChi']); ?>" required>
            </div>
            <div>
                <label class="form-label" for="malop">Tên lớp</label>
                <select class="form-control mb-2" name="malop" required>
                    <option value="">Chọn lớp</option>
                    <?php foreach ($lop_options as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop']); ?>" <?php if ($lop['malop'] == $sinhVien['maLop']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($lop['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Cập nhật thông tin">
                <a class="btn btn-primary" href="xem_sinhvien.php">Quay lại</a>
            </div>
        </form>
    </div>
    <?php //include_once('footer.php'); 
    ?>
</body>

</html>