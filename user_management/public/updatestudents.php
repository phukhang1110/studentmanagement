<?php
    include('../models/students/show.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa Thông Tin Sinh viên</h1>
        <form action="../models/students/update.php" method="post">
            <input type="hidden" name="sid" id="" value="<?php echo $student_id;?>">    

            <label for="name">Tên Sinh viên:</label>
            <input type="text" id="name" name="name" value="<?php echo $student->getName() ;?>" required>

            <label for="department">Khoa:</label>
            <select id="department" name="department_id" value="<?php echo $student->getDepartment() ;?>" required>
                <option value="1">TKTH</option>
                <option value="2">Marketing</option>
            </select>

            <div>
            <label for="age">Tuổi:</label>
            <input type="number" id="age" name="age" value="<?php echo $student->getAge() ;?>" required>
            </div>

            <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $student->getEmail() ;?>" required>
            </div>

            <input type="submit" value="Sửa">
        </form>
    </div>
</body>
</html>
