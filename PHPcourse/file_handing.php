<?php
    echo'file hading in PHP<br>';
    //read / write file on the server
    $file_path = './fruits.txt';
    if (file_exists($file_path)){
        // echo readFile($file_path);//22- number of bytes of the file
        $file_handle = fopen($file_path, 'r');
        $file_content = fread($file_handle,filesize($file_path));
        fclose($file_handle);
        echo $file_content;

    }else {
         //not exist
        $file_handle =  fopen($file_path , 'w');
        $file_content =  'banana'.PHP_EOL.'mango'.PHP_EOL.'grape';
        fwrite($file_handle, $file_content);
        fclose($file_handle);
    }
?>