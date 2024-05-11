<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>point subject</title>
</head>

<body>
    <!-- 
        1. Sử dụng bindParam để tránh SQL injection và tăng tính bảo mật.
        2. Sử dụng cấu trúc HTML trực tiếp thay vì sử dụng echo.
        3. Kiểm tra xem có dữ liệu nào trả về từ truy vấn không trước khi hiển thị.
     -->
    <?php
    require 'components/header.php';



    $id = $_GET['sid'] ?? '';

    if ($id != '') {
        $sql = "SELECT * FROM user inner join department on user.id = department.id where user.id=$id;";
        try {
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
            $users = $statement->fetchAll();
            if (!empty($users)) {
    ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Department</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><a href="/user_management/detail_user_department.php?sid=<?= $user['id'] ?>"><?= $user['id'] ?></a></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['age'] ?></td>
                                <td><?= $user['gender'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['department'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

    <?php
            } else {
                echo 'No user found with the given ID.';
            }
        } catch (PDOException $e) {
            echo 'Cannot query data. ERROR: ' . $e->getMessage();
        }
    }

    // require 'components/footer.php';
    ?>

    <?php
    $subject = $point = '';

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <div class="mb-3">

            <label>Choose Subject:</label>

            <select name="subject" class="<?= isset($errors['subject']) ? 'is-invalid' : ''; ?>">

                <option value="">Choose</option>
                <option value="CSLT" name='subject' <?= $subject == 'CSLT' ? 'selected' : '' ?>>CSLT</option>
                <option value="HDT" name='subject' <?= $subject == 'HDT' ? 'selected' : '' ?>>HDT</option>
                <option value="python" name='subject' <?= $subject == 'python' ? 'selected' : '' ?>>Python</option>
                <option value="english" name='subject' <?= $subject == 'english' ? 'selected' : '' ?>>English</option>
            </select>
            <div class="invalid-feedback">
                <?= $errors['subject'] ?? '' ?>
            </div>

        </div>
        <input type="hidden" name="sid" value="<?= $id ?>">

        <div class="mb-3">
            <label for="">Input point</label>
            <input type="number" step="0.01" min="0" max="10" <?= isset($errors['point']) ? 'is-invalid' : ''; ?> name="point" value="<?= $point ?>" placeholder="input point">
            <div class="invalid-feedback">
                <?= $errors['point'] ?? '' ?>
            </div>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Send">
        </div>


    </form>
    <p><a href="/user_management/list_user_subject.php">List student subject</a></p>
    <p><a href="/user_management/list_user_department.php">List student department</a></p>


    <?php

    $subject = $point = '';
    $id = $_GET['sid'] ?? '';


    if (isset($_GET['submit'])) {
        $subject = htmlspecialchars($_GET['subject'] ?? '');
        $point = htmlspecialchars($_GET['point'] ?? '');
        $id = htmlspecialchars($_GET['sid'] ?? '');
        if (empty($point)) {
            $errors['point'] = 'Point is required';
        }
        if (empty($subject)) {
            $errors['subject'] = 'Subject is required';
        }

        if ($id == $_GET['sid'] && empty($errors)) {
            $id_subject = $id . '-' . $subject;
            $sql = "INSERT INTO subject( id, subject , point , id_subject) VALUES(?,?,?,?);";

            try {
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id);
                $statement->bindParam(2, $subject);
                $statement->bindParam(3, $point);
                $statement->bindParam(4, $id_subject);

                $statement->execute();
                echo '<h3>inserted sucess</h3>';
                echo "<h6><a href=/user_management/list_user_subject.php>List Student Subject Updated</a></h6>";
            } catch (PDOException $e) {
                echo 'cannot insert .The list of students enrolled in the course.'  . $e->getMessage();
            }
        }
    }

    ?>





</body>

</html>