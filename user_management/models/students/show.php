<?php
include('../functions/Student.php');

$student_id = $_GET['sid'] ?? '';
// var_dump($student_id);
// Kết nối đến cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "student_managements");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối không thành công: " . $mysqli->connect_error);
}

// Gọi phương thức để lấy danh sách sinh viên từ class Student
$students = Student::getDetailStudents($mysqli, $student_id);

if (!$students || count($students) === 0) {
    die("Không tìm thấy sinh viên với ID được cung cấp.");
}

$student = $students[0];





// Hiển thị dữ liệu trong bảng HTML
?>