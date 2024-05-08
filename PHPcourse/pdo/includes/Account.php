<?php
//construct va destruct
// class Account{
//     public $ten  ;
//     public $ho ;
//     public function __construct($ten,$ho){
//         $this->ten =$ten;
//         $this->ho = $ho;
//     }
//     // {
        
//     // }
//     // public function  get_ho($ho) { //lay private
//     //     $this->ho = $ho;
//     // }
//     // public function get_public_ho(){  //lay private
//     //     return $this->ho;
//     // }
//     // public function get_ten($ten){
//     //     $this->ten = $ten;      //lay public
//     // }
//     public function __destruct()
//     {
//         echo "lop tai khoan da tu dang huy";
//     }
    

// }
// class Customer extends Account{
     
// }



//static
// class Account{
//     protected static $ten ;
//     public static function set_ten($ten){
//         self::$ten = $ten;
//     }
//     public static function get_ten(){
//         return self::$ten;
//     }
//     public static function all($ten){
//         self::set_ten($ten);
//         return self::get_ten();
//     }

// }

//
class Account{
    public function sum(int $a , int $b){
        return $a + $b ;
    }
    public function show_info(string $ten , int $year){
        echo "sach harry poter tac gia la".' '.$ten;
        echo " san xuat nam".' '.$year;
    }
}

?>

