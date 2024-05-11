<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list subject</title>
</head>

<body>

    <?php
    require 'components/header.php';
    $subject = $point = '';
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">

        <h3>The list of students taking the course.</h3>


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
        <input type="hidden" name="idsubject" value="<?= $subject ?>">

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Send">
        </div>



    </form>
    <?php

    $point = '';
    $subject = $_GET['idsubject'] ?? '';
    // $id = $_GET['sid'] ?? '';


    if (isset($_GET['submit']))
        $subject = htmlspecialchars($_GET['subject'] ?? '');

    if (empty($subject)) {
        $errors['subject'] = 'Subject is required';
    }


    $sql = "SELECT * FROM subject INNER JOIN user ON user.id = subject.id WHERE subject.subject = :subject";

    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
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
                        <th>Subject</th>
                        <th>Point</th>
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
                            <td><?= $user['subject'] ?></td>
                            <td><?= $user['point'] ?></td>
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

    // }

    // require 'components/footer.php';
    ?>




</body>

</html>