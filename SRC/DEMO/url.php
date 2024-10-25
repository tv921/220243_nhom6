<?php
$directory = '.';
$files = scandir($directory); 

// Mở tệp .htaccess để ghi quy tắc
$htaccessFile = '.htaccess';
$fileHandle = fopen($htaccessFile, 'w');

if ($fileHandle) {
    // Ghi quy tắc đầu vào .htaccess
    fwrite($fileHandle, "RewriteEngine On\n");

    foreach ($files as $file) {
        // Kiểm tra xem file có định dạng .php và không phải là .htaccess hoặc tệp này
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== '.htaccess' && $file !== 'url.php') {
            // Đổi tên một số file theo ý muốn
            $newFileName = $file; 

            // Tạo quy tắc cho mỗi file
            $fileNameWithoutExt = pathinfo($newFileName, PATHINFO_FILENAME);
            $rule = "RewriteRule ^$fileNameWithoutExt$ $newFileName [L]\n";
            fwrite($fileHandle, $rule);
        }
    }

    fclose($fileHandle);
    echo "Quy tắc URL đã được tạo thành công trong $htaccessFile.";
} else {
    echo "Không thể mở tệp $htaccessFile để ghi.";
}
