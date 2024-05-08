<?php
    //cookies : -save data in remote browser
    //          -you can retrieve it when the user visit the site again
    echo 'Cookies in PHP';
    //save data to cookie
    setcookie('name','Khang', time() + 24*36000);
    //after 1 day, cookie will be expired 
    //1 month = 24*3600*30
    if(isset($_COOKIE['name'])){
        echo $_COOKIE ['name'];
    }
    setcookie('name', '', time() - 24*33600); //unset cookie
    
?>