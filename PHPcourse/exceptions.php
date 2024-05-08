<?php
    echo 'Exeptiom iN php';
    function  divide($a , $b){
        if(!$b){
            throw new Exception ("Cannot divide by zero");
        }
        return $a / $b;
    }
    try{
        echo divide(5,1);
        // echo divide(5,0);
        echo "no errors";

    }catch(Exception $e){
        echo "Caught exception:" . $e->getMessage() . "<br>";

    }finally{
        echo "Finally come here..";
    }
    echo "program run here..";
    

?>