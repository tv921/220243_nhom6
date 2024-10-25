CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- id tự tăng và là khóa chính
    name VARCHAR(100) NOT NULL,         -- cột name với độ dài tối đa 100 ký tự
    email VARCHAR(100) NOT NULL UNIQUE, -- cột email, là duy nhất và không được để trống
    password VARCHAR(255) NOT NULL      -- cột password với độ dài tối đa 255 ký tự
);
