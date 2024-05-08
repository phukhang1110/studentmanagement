<?php
//    echo 'we talk about interations';
//    for ($i = 5; $i <= 10; $i++ ){
//     // echo ": $i";
//     echo "i = $i <br>";
//    } 
   $i = 31;
//    while($i <20){
//         echo "i = $i<br>";
//         $i = $i + 1;
//    }
// do while = "do first " , then check
// do {
//     echo "ii = $i<br>";
//     $i = $i +1;

// }while($i < 30);
// foreach
    $fruits = ['apple' , 'melon' , 'watermelon' , 'orange'];
    // for ($i =  0; $i < count($fruits); $i++){
    //     echo "$fruits[$i] <br>";
    // }
    foreach ($fruits as $index => $fruits){
        echo "$index - $fruits <br>";
    }
    $person=[
        'full_name' => 'nguyen van phu khang',
        'email' => 'phukhang11102003@gmail.com',
        'age' => 21
    ];
    foreach( $person as $key => $value){
        echo "$key : $value<br> ";
    }
?>
