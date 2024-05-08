<?php
    require 'components/header.php';

    echo'<h1>list of feedbacks here</h1>';
    $sql = "SELECT name, email, body from feedback;";
    try {
        $statement = $connection->prepare($sql);//cai thien hieu suat
        $statement->execute();
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);//lay du lieu duoi dang mang ket hop
        $feedbacks = $statement->fetchAll();//lay tat ca hang tu truy van
        echo '<ul class="list-group">';
        foreach($feedbacks as $feedback){
            $name = $feedback['name'] ?? '';
            $email = $feedback['email'] ?? '';
            $body = $feedback['body'] ?? '';
            // echo "<h3>$name ,$email,$body</h3>";
            echo "<li class='list-group-item'>";
            echo "<p>$name</p>";
            echo "<p>$email</p>";
            echo "<p>$body</p>";
            echo "</li>";

        }
        echo'</ul>';
    }catch (PDOException $e){
        echo 'cannot query data. ERROR: '.$e->getMessage();
    }
    include 'components/footer.php';
?>
