<?php
    // echo 'string function in PHP'; do dai so ki tu
    $full_name = 'nguyen van phu khang';
    // echo 'length: '.strlen($full_name);
    //reverse a string
    // echo strrev($full_name);
    //conert to lowercase
    // echo strtolower($full_name);
    // echo strtoupper($full_name);
    //find and repalce
    // echo str_replace(' ','-',$full_name);
    if(str_starts_with(strtolower($full_name), 'nguyen')){
        echo "his name starts with nguyen<br>";
    }

    if(str_ends_with(strtolower($full_name), 'khang')){
        echo "his name ends with khang";
    }
    echo "<h1> html string </h1>";
    
    //how to ignore the html string
    echo htmlspecialchars("<h1> html string </h1>");
    echo htmlspecialchars("<script>alert ('this is javasccript code')</script>");
    //html specialchars used to get data in form
    printf('<br>%s likes %s', 'kHANG' ,'fish');
    printf('<br>pi = %f', 3.14);


    
?>
