<?php

class Student {
    private $id;
    private $name;
    private $department;
    private $age;
    private $email;

    public function __construct($id, $name, $department, $age, $email ) {
        $this->id = $id;
        $this->name = $name;
        $this->department = $department;
        $this->age = $age;
        $this->email = $email;
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

    public function getAge(){
        return $this ->age;
    }
    public function getEmail() {
        return $this ->email;
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
                $students[] = new Student($row["id"], $row["name"], $row["department_id"], $row["age"], $row["email"]);
            }
        }

        // Trả về mảng students chứa thông tin sinh viên
        return $students;
    }

    public static function getDetailStudents($mysqli ,$student_id) {
        $students = array();

        $sql = "SELECT * FROM students WHERE id=?";
        $result = $mysqli->prepare($sql);
        $result->bind_param("i", $student_id);
        $result->execute();
        $resultSet = $result->get_result(); // Lấy kết quả

        if ($resultSet->num_rows > 0) {
            while($row = $resultSet->fetch_assoc()) {
                $students[] = new Student($row["id"], $row["name"], $row["department_id"], $row["age"], $row["email"]);
            }
        }
        return $students;
    }

    // Thêm sinh viên mới vào cơ sở dữ liệu
    public static function addStudent($mysqli, $name, $department_id, $age, $email) {
        // In ra câu lệnh SQL để debug
        echo "Câu lệnh SQL: " . "INSERT INTO students (name, department_id, age, email) VALUES ('$name', '$department_id', '$age', '$email')";

        // Prepare câu lệnh SQL
        $stmt = $mysqli->prepare("INSERT INTO students (name, department_id, age, email) VALUES (?, ?, ?, ?)");

        // Kiểm tra xem prepare có thành công không
        if ($stmt === false) {
            echo "Lỗi prepare: " . $mysqli->error;
            return false;
        }
    
        // Bind các tham số
        $stmt->bind_param("siis", $name, $department_id, $age, $email);

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
    public static function updateStudent($mysqli,$student_id, $name, $department_id , $age , $email) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $mysqli->prepare("UPDATE students SET name = ?, department_id = ?, age = ?, email = ? WHERE id = ?");

        // Kiểm tra xem câu lệnh SQL có được chuẩn bị thành công hay không
        if (!$stmt) {
            // Xử lý lỗi nếu không thể chuẩn bị câu lệnh SQL
            echo "Lỗi: " . $mysqli->error;
            return false; // hoặc bạn có thể xử lý lỗi theo cách khác tùy ý
        }

        // Bind các tham số
        $stmt->bind_param("siisi", $name, $department_id, $age, $email,$student_id,);

        // Thực thi câu lệnh SQL
        $stmt->execute();
        return $student_id;
    }

    // Xóa sinh viên từ cơ sở dữ liệu
    public static function deleteStudent($mysqli,$id) {
        

        $stmt = $mysqli->prepare("DELETE FROM students WHERE id = ?");

        // Kiểm tra xem câu lệnh SQL có được chuẩn bị thành công hay không
        if (!$stmt) {
            // Xử lý lỗi nếu không thể chuẩn bị câu lệnh SQL
            echo "Lỗi: " . $mysqli->error;
            return false; // hoặc bạn có thể xử lý lỗi theo cách khác tùy ý
        }

        // Bind các tham số
        $stmt->bind_param("i", $id);

        // Thực thi câu lệnh SQL
        $stmt->execute();
        

        
    }

}
