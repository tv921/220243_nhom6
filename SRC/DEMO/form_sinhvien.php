<?php include_once('baovelogin.php'); ?>
<?php include_once('giao_dien.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Sinh viên</title>
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
    <?php
    include_once("config/connect.php");
    $sql = "SELECT malop, tenlop FROM lophoc";
    $result = $conn->query($sql);
    $lop_options = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lop_options[] = $row;
        }
    } else {
        echo "Không có lớp nào.";
    }
    $conn->close();
    ?>
    <div class="form m-auto" style="width: 700px;">
        <h1 style="text-align: center;">THÔNG TIN SINH VIÊN</h1>
        <form action="thongtinsv.php" method="POST">
            <div>
                <label class="form-label" for="masvien">Mã sinh viên</label>
                <input class="form-control mb-2" type="text" name="masv" required>
            </div>
            <div>
                <label class="form-label" for="hosvien">Họ</label>
                <input class="form-control mb-2" type="text" name="hosv" required>
            </div>
            <div>
                <label class="form-label" for="tensvien">Tên</label>
                <input class="form-control mb-2" type="text" name="tensv" required>
            </div>
            <div>
                <label class="form-label" for="date">Ngày</label>
                <input class="form-control mb-2" type="date" name="date" required>
            </div>
            <div class="form-group">
                <label>Giới tính:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Nam" required>
                    <label class="form-check-label" for="male">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Nữ">
                    <label class="form-check-label" for="female">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="other" name="gender" value="Khác">
                    <label class="form-check-label" for="other">Khác</label>
                </div>
            </div>
            <div>
                <label class="form-label" for="diachi">Địa chỉ</label>
                <input class="form-control mb-2" type="text" name="diaChi" required>
            </div>
            <div>
                <label class="form-label" for="malop">Tên lớp</label>
                <select class="form-control mb-2" name="malop" required>
                    <option value="">Chọn lớp</option>
                    <?php foreach ($lop_options as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop']); ?>">
                            <?php echo htmlspecialchars($lop['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Gửi thông tin">
            </div>
        </form>
    </div>

</body>

</html>