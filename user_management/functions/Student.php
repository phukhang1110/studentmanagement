<?php

class Student {
    private $id;
    private $name;
    private $department;

    public function __construct($id, $name, $department) {
        $this->id = $id;
        $this->name = $name;
        $this->department = $department;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDepartment() {
        return $this->department;
    }

    // Hàm để lấy danh sách sinh viên từ cơ sở dữ liệu
    public static function getStudents($mysqli) {
        // Khởi tạo mảng để lưu trữ thông tin sinh viên
        $students = array();

        // Truy vấn SQL để lấy thông tin sinh viên
        $sql = "SELECT * FROM students";
        $result = $mysqli->query($sql);

        // Đổ dữ liệu vào mảng students
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $students[] = new Student($row["id"], $row["name"], $row["department_id"]);
            }
        }

        // Trả về mảng students chứa thông tin sinh viên
        return $students;
    }

    // Thêm sinh viên mới vào cơ sở dữ liệu
    public static function addStudent($mysqli, $name, $department_id) {
        // In ra câu lệnh SQL để debug
        echo "Câu lệnh SQL: " . "INSERT INTO students (name, department_id) VALUES ('$name', '$department_id')";

        // Prepare câu lệnh SQL
        $stmt = $mysqli->prepare("INSERT INTO students (name, department_id) VALUES (?, ?)");

        // Kiểm tra xem prepare có thành công không
        if ($stmt === false) {
            echo "Lỗi prepare: " . $mysqli->error;
            return false;
        }
    
        // Bind các tham số
        $stmt->bind_param("si", $name, $department_id);

        // Execute câu lệnh SQL
        $stmt->execute();

        // Kiểm tra xem có lỗi xảy ra không
        if ($stmt->error) {
            echo "Lỗi execute: " . $stmt->error;
            return false;
        }

        // Trả về ID của sinh viên mới được thêm
        return $stmt->insert_id;
    }

    // Sửa thông tin sinh viên trong cơ sở dữ liệu
    public function updateStudent($mysqli, $name, $department_id) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $mysqli->prepare("UPDATE students SET name = ?, department_id = ? WHERE id = ?");

        // Kiểm tra xem câu lệnh SQL có được chuẩn bị thành công hay không
        if (!$stmt) {
            // Xử lý lỗi nếu không thể chuẩn bị câu lệnh SQL
            echo "Lỗi: " . $mysqli->error;
            return false; // hoặc bạn có thể xử lý lỗi theo cách khác tùy ý
        }

        // Bind các tham số
        $stmt->bind_param("sii", $name, $department_id, $this->id);

        // Thực thi câu lệnh SQL
        $stmt->execute();
    }

    // Xóa sinh viên từ cơ sở dữ liệu
    public function deleteStudent($mysqli) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $mysqli->prepare("DELETE FROM students WHERE id = ?");

        // Kiểm tra xem câu lệnh SQL có được chuẩn bị thành công hay không
        if (!$stmt) {
            // Xử lý lỗi nếu không thể chuẩn bị câu lệnh SQL
            echo "Lỗi: " . $mysqli->error;
            return false; // hoặc bạn có thể xử lý lỗi theo cách khác tùy ý
        }

        // Bind các tham số
        $stmt->bind_param("i", $this->id);

        // Thực thi câu lệnh SQL
        $stmt->execute();
    }

}
