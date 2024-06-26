<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list user</title>
</head>

<body>
    <?php
    require 'components/header.php';

    echo '<h1>List of Students</h1>';
    $sql = "SELECT id, age, gender, email FROM user;";
    try {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><a href="/user_management/detail_user.php?sid=<?= $user['id'] ?>"><?= $user['id'] ?></a></td>
                        <td><?= $user['age'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['email'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
    } catch (PDOException $e) {
        echo 'Cannot query data. Error: ' . $e->getMessage();
    }

    include 'components/footer.php';
    ?>

</body>

</html>