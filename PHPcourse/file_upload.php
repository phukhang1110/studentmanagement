<?php
    echo 'file upload in PHP';
    // print_r($_FILES);
    if(isset($_POST['submit'])){
        $permitted_extensions = ['png' , 'jpg','jpeg','gif'];
        $file_name =$_FILES['upload']['name'];
        if(!empty($file_name)){
            // print_r($_FILES);
            $file_size = $_FILES['upload']['size'];
            $file_tmp_name = $_FILES['upload']['tmp_name'];
            $file_tmp_name = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/.$file_name";
            $file_extension = explode('.',$file_name);
            $file_extension = strtolower(end($file_extension));
            echo " $file_name, $file_size, $file_extension, $destination_path"; 
        }else {
            $error_message = '<p style="color:red">
            No file selected , please try again </p>';

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
    <h1>file upload in php</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"
    method="post"
    enctype="multipart/form-data" 
    >
    Choose your imnage to upload
    <input type="file" name="upload">
    <input type="submit" value="submit" name="subtmit">

</form>
<?php
    echo $error_message ?? ''
?>
</body>
</html>