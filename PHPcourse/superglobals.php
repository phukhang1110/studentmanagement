<?php
    echo "superglobal in PHP<br>";
    // print_r($_SERVER);
    // print_r($_POST);
    // WE will send data through url or form using $_GET / $_POST
    // if(isset($_GET['name'])){
    //     echo $_GET['name'];
    // }
    // if(isset($_GET['age'])){
    //     echo $_GET['age'];
    // }
    // test exist get 
    // $email = $_POST['email'] ?? '';
    // <script>alert('this is javascript code');</script>
    $email = htmlspecialchars($_POST['email']) ?? '';
    $password = $_POST['password'] ?? '';
    echo $email;
    echo $password;
    //kiem tra neu chuoi k rong thi in ra , phuonh thuc post doi voi mk , public thi xai get
    //send database , my sql


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>"
          method="POST"
          >
          <h3>LOGIN TO YOUR ACCOUNT</h3>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</body>
</html>
// THONG TIN NHAY CAM XAI POST . PUBLIC THI GET