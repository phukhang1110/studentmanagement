<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>department</title>
</head>

<body>
    
    <?php
    require 'components/header.php';


    $id = $_GET['sid'] ?? '';

    if ($id != '') {
        $sql = "SELECT * FROM user WHERE id=:id";
        try {
            $statement = $connection->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

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

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['age'] ?></td>
                                <td><?= $user['gender'] ?></td>
                                <td><?= $user['email'] ?></td>
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
        $department='';
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <div class="mb-3">

            <label>Choose Department:</label>

            <select name="department" class="<?= isset($errors['department']) ? 'is-invalid' : ''; ?>">

                <option value="">Choose</option>
                <option value="TKTH" name='department' <?= $department == 'TKTH' ? 'selected' : '' ?>>TKTH</option>
                <option value="Marketing" name='department' <?= $department == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                <option value="banking" name='department' <?= $department == 'banking' ? 'selected' : '' ?>>Banking</option>
                <option value="economy" name='department' <?= $department == 'economy' ? 'selected' : '' ?>>economy</option>
            </select>
            <div class="invalid-feedback">
                <?= $errors['department'] ?? '' ?>
            </div>


        </div>

        <input type="hidden" name="sid" value="<?= $id ?>">


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Send">
        </div>


    </form>
    <?php
    echo "<h6><a href=/user_management/list_user_department.php>depart list has been added</a></h6>";
    ?>
    <?php

    $departemnt = '';
    $id = $_GET['sid'] ?? '';


    if (isset($_GET['submit'])) {



        $departemnt = htmlspecialchars($_GET['department'] ?? '');

        $id = htmlspecialchars($_GET['sid'] ?? '');

        // echo 'khang'; true
        if (empty($departemnt)) {
            $errors['department'] = 'Department is required';
        }




        if (($id == $_GET['sid'])&(empty($errors))) {
            
            $sql = "INSERT INTO department(id , department ) VALUES(?,?)";

            try {
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id);
                $statement->bindParam(2, $departemnt);
                $statement->execute();
                echo '<h3>inserted sucess</h3>';
                echo "<h3><a href=/user_management/list_user_department.php>Updated list depart</a></h>";
                // echo "<h6><a href=/user_management/user_department_list.php>list depart</a></h6>";
                // echo "<td><a href=/user_management/detail_user.php?sid=$user[id]>$id</a></td>';



            } catch (PDOException $e) {
                echo 'cannot insert '  . $e->getMessage();
            }
        }
    }

    ?>



</body>

</html>