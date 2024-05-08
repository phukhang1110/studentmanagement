<?php
 require 'components/header.php';
 $name = $email = $body = '' ;
 $name_error = $email_error = $body_error = '' ;
 
 if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $name_error = 'Name is requied';
    }else{
        $name = htmlspecialchars($_POST['name']);
    }
    if(empty($_POST['email'])){
        $email_error = 'Email is requied';
    }else{
        $email = htmlspecialchars($_POST['email']);
    }
    if(empty($_POST['body'])){
        $body_error = 'Body is requied';
    }else{
        $body = htmlspecialchars($_POST['body']);
    }
    $validate_sucess = empty($name_error)&&empty($email_error)&&empty($body_error);
    if($validate_sucess){
        $sql = "INSERT INTO feedback(name , email ,body) VALUES(?,?,?)";
    try{
        $statement = $connection->prepare($sql);
        $statement -> bindParam(1, $name);// tranh hacker
        $statement -> bindParam(2, $email);
        $statement -> bindParam(3, $body);
        $statement -> execute();
        echo 'inserted sucess';
        header('location: feedback_list.php');
    }catch(PDOException $e){
        echo'cannot insert'.$e->getMessage();
    }    
    }
    // echo $name_error;
    // echo $email_error;
    // echo $body_error;
    
 }

 ?>


    <h1>Enter your feedback here</h1>
            <form action="<?php 
            echo htmlspecialchars($_SERVER['PHP_SELF']);
            ?>"
            method="post">
                <div class="mb-3">
                    <input type="text" 
                    class="form-control <?php echo $name_error ? 'is-invalid' :'';?>"
                    name="name" 
                    placeholder="What is your name ?">
                    <p class="text-danger">
                        <?php echo $name_error ; ?>
                    </p>
                    
                </div>
                
                <div class="mb-3">
                    <input type="email" 
                    class="form-control <?php echo $name_error ? 'is-invalid' :'';?>" 
                    name="email" 
                    placeholder="Enter your email">
                    <p class="text-danger">
                        <?php echo $email_error; ?>
                    </p>
                </div>
                
                
                <div class="mb-3">
                    <textarea class="form-control <?php echo $name_error ? 'is-invalid' :'';?>" 
                        name="body" 
                        placeholder="Enter your feedback" 
                        rows="2"></textarea>
                </div>
                <p class="text-danger">
                        <?php echo $body_error; ?>
                    </p>
                
                <div class="mb-3">
                    <input type="submit" 
                    class="btn btn-primary" 
                    name="submit" 
                    value="Send">
                </div>
                
            </form>
        <?php
            include 'components/footer.php';
        ?>
            
            
