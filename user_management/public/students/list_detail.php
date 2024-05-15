<?php
include('../../functions/Student.php');

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


// Hiển thị dữ liệu trong bảng HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách Sinh viên</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Khoa</th>
                    <th>Tuôi</th>
                    <th>Email</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student->getId(); ?></td>
                    <td><?php echo $student->getName(); ?></td>
                    <td><?php echo $student->getDepartment(); ?></td>
                    <td><?php echo $student->getAge(); ?></td>
                    <td><?php echo $student->getEmail(); ?></td>
                    
                    
                   
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
