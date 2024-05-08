<?php
    // include_once('includes/newclass.php');
    spl_autoload_register('Loader');
    function Loader($className){
        $path = "includes/";
        $extension = ".php";
        $fullpath = $path.$className.$extension;
        include_once $fullpath;
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
    <?php
        // $doituong = new Account();
        // $doituong->get_ho('nhh');
        // echo $doituong -> get_public_ho();
        
        // $doituong = new Account("khang","nguyen");
        
        // echo $doituong -> ho;

        //static
        // $doituong = new Account();
        // $doituong->set_ten('khang');
        // echo $doituong->get_ten();

        // $doituong = new Account();
        // echo $doituong->get_ten();
        // echo Account::all('khang');
        $class = new Account;
        echo $class->show_info('Rowling',2006);
        
        echo $class->sum(2,3);

        
    ?>
</body>
</html>