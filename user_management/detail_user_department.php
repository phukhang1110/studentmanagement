<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user department detail</title>
</head>

<body>
    
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
                <a href="/user_management/point_subject.php?sid=<?= $user['id'] ?>"><?= $user['id'] ?>-Input Subject and Point</a>

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



</body>

</html>