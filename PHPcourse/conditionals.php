<?php
    // echo "we talk abount conditional in PHP <br>";
    // $age = 30;
    // if ($age >=18){
    //     echo "you are greater than or equal to 18 years old";
    // }else{
    //     echo "you are so young";
    // }
    // $hours = date("H");
    // $hours = 20;
    // echo $hours;
    // if ($hours < 12){
    //     echo "good morning";
    // }else if($hours >=12 && $hours <=17){
    //     echo "good afternoon";
    // }else {
    //     echo "good evening";
    // }
    $comment = [
        'Good' , 'I like it' , 'How are you?'
    ];
    // if(!empty($comment)){//not = !
    //     echo "there are some comments";
    // }else{
    //     echo 'No comments';
    // }
    // echo !empty($comment) ? "there are comments":
    //                         'No comments';
    // $first_comment = !empty($comment)
    //                 ? $comment[1] : 'No comments';
    // echo $first_comment
    // $first_comment = $comment [0] ?? 'No comments';
    // echo $first_comment;

    $favorite_color = 'red';
    switch ($favorite_color){
        case 'red':
            echo 'you choose RED';
            break;
        case 'green':
            echo 'you choose green';
            break;
        case 'blue':
            echo 'you choose blue';
            break;
        default:
            echo 'not red , green , blue';

    }

?>