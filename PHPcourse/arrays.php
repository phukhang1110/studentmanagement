<?php
    // echo 'we talk about array ';
    $some_numers= [1,3,4,6];
    $fruits = ['apple' , 'melon' , 'watermelon'];
    // var_dump($some_numers);
    // print_r($fruits);
    // echo $fruits [0];
    $colors=[
        3 => 'red',// key - value
        5 => 'green',
        7 => 'blue'

    ];
    // echo $colors [5];
    // key as a string
    $hex_colors=[
        'red' => '#FF0000',
        'greem' => '#00000',
        'blue' => '#0000FF',
    ];
    // echo $hex_colors['greem'];
    $person = [
        'full_name' => 'nguyen van phu khang',
        'age' => 20 ,
        'email' => 'phukhang11102003@gmail.com'
    ];
    // print_r($person);
    // echo $person['email'];
    $person=[
        [
            'full_name' => 'nguyen van phu khang',
            'age' => 20 ,
            'email' => 'phukhang11102003@gmail.com'
        ],
        [
            'full_name' => 'nguyen van nhat',
            'age' => 21 ,
            'email' => 'nhat2003@gmail.com'
        ],
        [
            'full_name' => 'nguyen van phu ',
            'age' => 20 ,
            'email' => 'phu11102003@gmail.com'
        ]

        ];
        // print_r($person);
        // echo $person[2]['email'];
        var_dump(json_encode($person));
        //chuyn thong tin gui di luu tru 

    


?>