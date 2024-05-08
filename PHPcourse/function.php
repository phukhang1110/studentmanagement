<?php
    $y = 22;
    // echo 'this lesson is ablut function';
    //function is a "block of code", with name
    function sayHello($name){
        global $y;
        echo "y = $y";
        echo "Hello $name";
    }
    // sayHello("Khang");// call function with "parameters"
    function sum($a =0 , $b=0){
        //default arguments values
        return $a +$b;
    }
    // echo sum(1,2);
    //assign a variable to a function
    $multiply = function($a ,$b){
        return $a * $b;
    };
    // echo $multiply(3,4);
    //arrow finction
    $substract = fn($a, $b) => $a - $b;
    // echo $substract (6,2);
    //some built-in function for array
    $name = ['john' , 'anna' , 'hoang', 'tony'];
    // echo "number of items: ".count($name);
    //search inside array
    var_dump(in_array('hoang' , $name));
    //insert an item 
    array_push($name, 'elon', 'tom');
    array_unshift($name , 'satoshi');//them vao dau
    array_pop($name);//vut cuoi
    array_shift($name);//xoa dau
    unset($name[3]);// xoa index va index khong dc danh lai
    $chunked_array =array_chunk($name,1);//chi mang thanh 2
    // print_r($chunked_array);
    //gop mang
    $array_one = [1,3,5];
    $array_two = [2,4,6];
    $merge_array = array_merge($array_one,$array_two);
    
    //spread operator
    $array_three = [...$merge_array];//clone an array
    $merge_array[0] = 111;
    // print_r($merge_array);
    // print_r($array_three);
    $array_four = [...$array_one,...$array_two];
    $array_four[0]=222;
    // print_r($array_four);
    //combine two array
    $a =['name','email','age'];
    $b =['khang','phukhang11102003@gmail.com','20'];
    $c= array_combine($a, $b);
    // print_r($c);
    // print_r(array_keys($c));
    // print_r(array_values($c));
    // print_r(array_flip($c));
    // print_r($name);
    //array from a range
    $numbers = range(0,9);
    print_r($numbers);
    //map an array to another arrat
    //with the same size , but other values
    //tao ra mang khac co do rong nhu mnag cu nhung gt lai khac
    // $squared_numbers = array_map(function($each_number){
    //     return $each_number * $each_number;
    // },$numbers);
    // print_r($squared_numbers);

    $squared_numbers = array_map(fn($each_number) =>
     $each_number * $each_number
    ,$numbers);
    print_r($squared_numbers);

    //filter an array
    $filtered_numbers = array_filter($squared_numbers,
        fn($each_number) => $each_number % 2 ==0);
        print_r($filtered_numbers);





?>