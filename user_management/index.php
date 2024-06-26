<?php
require('components/header.php');
$name = $age = $email = $password = $confirm_password = $gender = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $age = htmlspecialchars($_POST['age'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $confirm_password = htmlspecialchars($_POST['confirm_password'] ?? '');
    $gender = htmlspecialchars($_POST['gender'] ?? '');


    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    if (empty($age)) {
        $errors['age'] = 'Age is required';
    }
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Confirm password is required';
    }
    if (empty($gender)) {
        $errors['gender'] = 'Gender is required';
    }
    if ($password != $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    if (empty($errors)) {

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
            echo '<h3><a href=/user_management/list_user.php>List of student</a></h2>';
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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
        <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : ''; ?>" name="name" placeholder="What is your name?" value="<?= $name ?>">
        <div class="invalid-feedback">
            <?= $errors['name'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="number" class="form-control <?= isset($errors['age']) ? 'is-invalid' : ''; ?>" name="age" placeholder="How old are you?" value="<?= $age ?>">
        <div class="invalid-feedback">
            <?= $errors['age'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" placeholder="Enter your email" value="<?= $email ?>">
        <div class="invalid-feedback">
            <?= $errors['email'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" name="password" placeholder="Enter your password" value="<?= $password ?>">
        <div class="invalid-feedback">
            <?= $errors['password'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>" name="confirm_password" placeholder="Confirm your password" value="<?= $confirm_password ?>">
        <div class="invalid-feedback">
            <?= $errors['confirm_password'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <label>Gender</label>
        <div>
            <input type="radio" name="gender" value="Male" <?= $gender == 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="Female" <?= $gender == 'Female' ? 'checked' : '' ?>> Female
        </div>
        <div class="invalid-feedback">
            <?= $errors['gender'] ?? '' ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="submit" value="Send">
    </div>
</form>
<?php
include 'components/footer.php';
?>