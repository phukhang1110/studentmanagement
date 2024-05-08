<?php
require_once __DIR__ .'/../constant.php';




class Circle{
    public function getAreaCircle($radius)
    {
        return Constant::PI*$radius*$radius;
    }
}   
?>