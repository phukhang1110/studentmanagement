<?php
require('components/header.php');
$name = $age = $email = $password = $confirm_password = $gender = '';
$name_error = $age_error = $email_error = $password_error = $confirm_password_error = $gender_error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $name_error = 'Name is requied';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['age'])) {
        $age_error = 'Age is requied';
    } else {
        $age = htmlspecialchars($_POST['age']);
    }
    if (empty($_POST['email'])) {
        $email_error = 'Email is requied';
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $password_error = 'Password is requied';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }
    if (empty($_POST['confirm_password'])) {
        $confirm_password_error = 'confirm_password is requied';
    } else {
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
    }
    if (empty($_POST['gender'])) {
        $gender_error = 'Gender is requied';
    } else {
        $gender = htmlspecialchars($_POST['gender']);
    }
    if ($password != $confirm_password) {
        $confirm_password_error = 'confirm_password invalid';
    } else {
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
    }


    $validate_sucess = empty($name_error) && empty($email_error) && empty($body_error) && empty($password_error) && empty($gender_error) && ($password === $confirm_password);

    if ($validate_sucess) {

        $sql = "INSERT INTO user(name , age ,  email , password , gender ) VALUES(?,?,?,?,?)";

        try {
            $statement = $connection->prepare($sql);
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $age);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $password);
            $statement->bindParam(5, $gender);
            $statement->execute();
            echo '<h2>inserted sucess</h2>';
            // echo '<h3>List of student</h3>';
            echo '<h3><a href=/user_management/user_list.php>List of student</a></h2>';
            // header('location: user_list.php');
        } catch (PDOException $e) {
            echo 'cannot insert' . $e->getMessage();
        }
    }
    // echo $name_error;
    // echo $email_error;
    // echo $body_error;

}


?>
<h1>USER MANAGEMENT</h1>
<form action="<?php
                echo htmlspecialchars($_SERVER['PHP_SELF']);
                ?>" method="post">
    <div class="mb-3">
        <input type="text" class="form-control <?php echo $name_error ? 'is-invalid' : ''; ?>" name="name" placeholder="What is your name ?">
        <p class="text-danger">
            <?php echo $name_error; ?>
        </p>

    </div>

    <div class="mb-3">
        <input type="number" class="form-control <?php echo $age_error ? 'is-invalid' : ''; ?>" name="age" placeholder="How old are you ?">
        <p class="text-danger">
            <?php echo $age_error; ?>
        </p>

    </div>

    <div class="mb-3">
        <input type="email" class="form-control <?php echo $email_error ? 'is-invalid' : ''; ?>" name="email" placeholder="Enter your email">
        <p class="text-danger">
            <?php echo $email_error; ?>
        </p>
    </div>

    <div class="mb-3">
        <input type="password" class="form-control <?php echo $password_error ? 'is-invalid' : ''; ?>" name="password" placeholder="Enter your password">
        <p class="text-danger">
            <?php echo $password_error; ?>
        </p>
    </div>

    <div class="mb-3">
        <input type="password" class="form-control <?php echo $confirm_password_error ? 'is-invalid' : ''; ?>" name="confirm_password" placeholder="Enter your confirm password">
        <p class="text-danger">
            <?php echo $confirm_password_error;; ?>
        </p>
    </div>

    <div class="mb-3">
        <label>Gender</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female

        <p class="text-danger">
            <?php echo $gender_error; ?>
        </p>



    </div>






    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="submit" value="Send">
    </div>

</form>
<?php
include 'components/footer.php';
?>