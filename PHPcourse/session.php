<?php
    //dung de luu tru ow tren phia server . su dung trong nhieu trang , khi vao trang khac thi k bat login lai
    echo "Sessions in PHP <br>";
    session_start();
    if (isset($_POST['submit'])){
        $email = filter_input(INPUT_POST,'email'
                ,FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['password'];
        if ($email == 'khang@gmail.com'
            && $password == '11102003'){
                $_SESSION['email'] = $email;
                
                //redirect to another page
                header('Location: ./dashboard.php');
            }else{
                echo '<h3>incorect email/password</h3>';
            }   
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
    <h1>LOGIN TO YOUR ACCOUNT</h1>
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
