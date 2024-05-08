<?php
    session_start();
    if(isset($_SESSION['email'])){
        echo 'Welcom to dasboard page<br>';
        echo 'email: ' . $_SESSION['email'];
        echo '<h2><a href=/logout.php>Logout</a></h2>';
    }else{
        echo 'Welcom guest to Dashboard<br>';
        echo '<h2><a href=/session.php>Back to Login</a></h2>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>this is dashboard</h2>
</body>
</html>