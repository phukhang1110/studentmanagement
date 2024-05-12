<?php
include('../../functions/Student.php');

// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form và làm sạch chúng
    $name = htmlspecialchars($_POST["name"]);
    $department_id = intval($_POST["department_id"]); // Chuyển đổi thành số nguyên

    // Kết nối đến cơ sở dữ liệu MySQL
    $mysqli = new mysqli("localhost", "root", "", "student_managements");

    // Kiểm tra kết nối
    if ($mysqli->connect_error) {
        die("Kết nối không thành công: " . $mysqli->connect_error);
    }

    // Thêm sinh viên mới
    $new_student_id = Student::addStudent($mysqli, $name, $department_id);

    // Kiểm tra xem sinh viên đã được thêm thành công chưa
    if ($new_student_id) {
        echo "Sinh viên đã được thêm vào với ID: " . $new_student_id;
    } else {
        echo "Không thể thêm sinh viên.";
    }

    // Đóng kết nối
    $mysqli->close();
}
?>
