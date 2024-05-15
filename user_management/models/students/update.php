<?php
    include('../../functions/Student.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form và làm sạch chúng
        $student_id = htmlspecialchars($_POST["sid"]);
        $name = htmlspecialchars($_POST["name"]);
        $department_id = intval($_POST["department_id"]); // Chuyển đổi thành số nguyên
        $age = htmlspecialchars($_POST["age"]);
        $email = htmlspecialchars($_POST["email"]);
    
    
        // Kết nối đến cơ sở dữ liệu MySQL
        $mysqli = new mysqli("localhost", "root", "", "student_managements");
    
        // Kiểm tra kết nối
        if ($mysqli->connect_error) {
            die("Kết nối không thành công: " . $mysqli->connect_error);
        }
    
        // Thêm sinh viên mới
        $update_student_id = Student::updateStudent($mysqli, $student_id ,$name, $department_id, $age, $email);
    
       // Kiểm tra xem sinh viên đã được sửa thành công chưa
        if ($student_id) {
        echo "Sinh viên đã được sửa với ID: " .$student_id;
        } else {
        echo "Không thể thêm sinh viên.";
        }
    
        // Đóng kết nối
        $mysqli->close();
    }
    
?>