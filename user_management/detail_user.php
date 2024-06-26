<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user detail</title>
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
                <a href="/user_management/department.php?sid=<?= $user['id'] ?>"><?= $user['id'] ?>-Choose departement</a>
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