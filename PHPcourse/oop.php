<?php
    echo "OOP - Object Oriented Programing<br>";
    //from phps awards , you can define class
    class User{
        public $name;
        public $email;
        public $age;
        public $password;
        //method a function that belongs to a class
        function set_name($name){
            $this->name = $name;
        }
        //constructpor: function that runs when an object

        //is instantiated
        public function __construct($name,
                                    $email,
                                    $age,
                                    $password){
            // echo "construct run <br>";
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->password = $password;
        }
        //getter
        function get_name(){
            return $this->name;
        }
    }
    //init an object
    $user1 = new User('khang','khang1102@gmail.com',20,'1110');
    $user2 = new User('nguyen','khang1102@gmail.com',20,'1110');
    $user3 = new User('van','khang1102@gmail.com',20,'1110');
    // $user1->name = 'khang';
    // $user1->email = 'phukhang11102003@gamil.com';
    // $user1->age = '18';
    // $user1->password = '1110';
    // $user1->set_name('khang');
    // $user2->set_name('nguyen');
    // print_r($user1);
    // print_r($user2);
    // echo $user1->get_name()."<br>";
    // echo $user2->get_name();
    // echo $user2->age;
    // echo $user1->name;
    //inheritance
    class Employee extends User{
        public function __construct($name,
                                    $email,
                                    $age,
                                    $password,
                                    $title)
        {
             parent::__construct($name,$email,$age,$password);
             $this-> title = $title;
        }
        public function get_title(){
            return $this->title;
        }
    }
    $employee1 = new Employee('phukhang','khang123@gmail.con','20','23333','salermanger');
    echo $employee1->get_title();


?>