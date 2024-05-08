<?php
require 'components/header.php';
// session_start();

echo '<h1>list of student</h1>';
$sql = "SELECT id, name, age, email, password, gender from user;";
try {
    $statement = $connection->prepare($sql); //cai thien hieu suat
    $statement->execute();
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC); //l    ay du lieu duoi dang mang ket hop
    $users = $statement->fetchAll(); //lay tat ca hang tu truy van
    echo '<ul class="list-group">';
    echo "<table>";
    echo "<thead>
            <tr>
                <th>Id</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
            </tr>
                </thead>";
    echo "<tbody>";

    foreach ($users as $user) {
        $id = $user['id'] ?? '';
        $name = $user['name'] ?? '';
        $age = $user['age'] ?? '';
        $email = $user['email'] ?? '';
        $gender = $user['gender'] ?? '';


        // echo "<h3>$name ,$email</h3>";
        // echo "<li class='list-group-item'>";
        // echo "<p>$id</p>";
        // echo "<p>$name</p>";
        // echo "<p>$email</p>";
        // echo "<p>$age</p>";

        // echo "</li>";
        echo "<tr>";
        echo "<td><a href=/user_management/detail_user.php?sid=$user[id]>$id</a></td>";
        echo "<td>$age</td>";
        echo "<td>$gender</td>";
        echo "<td>$email</td>";



        echo "</tr>";
    }
    echo '</ul>';
    echo "</tbody>";
    echo "</table>";
} catch (PDOException $e) {
    echo 'cannot query data. ERROR: ' . $e->getMessage();
}
include 'components/footer.php';
// session_destroy();
// header('Location: /session.php');
