<?php
include('../../functions/Student.php');


// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy dữ liệu từ form và làm sạch chúng
    $id = $_GET['sid'];
    // echo $id;
    // $name = htmlspecialchars($_POST["name"]);
    // $department_id = intval($_POST["department_id"]); // Chuyển đổi thành số nguyên
    // $age = htmlspecialchars($_POST["age"]);
    // $email = htmlspecialchars($_POST["email"]);      

    // Kết nối đến cơ sở dữ liệu MySQL
    $mysqli = new mysqli("localhost", "root", "", "student_managements");

    // Kiểm tra kết nối
    if ($mysqli->connect_error) {
        die("Kết nối không thành công: " . $mysqli->connect_error);
    }

    // Xoá sinh viên mới
    $delete_student_id = Student::deleteStudent($mysqli, $id);

    // Kiểm tra xem sinh viên đã được xoa thành công chưa
    echo'XOA THANH CONG';

    // Đóng kết nối
    $mysqli->close();
}
?>
