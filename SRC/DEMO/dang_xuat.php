<?php
session_start(); // Bắt đầu phiên
session_unset(); // Xóa tất cả các biến phiên
session_destroy(); // Hủy phiên
header("Location:./"); // Chuyển hướng đến trang đăng nhập
exit();
