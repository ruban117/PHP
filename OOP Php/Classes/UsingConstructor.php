<?php
    class UsingConstructor{
        public $name;
        public $age;
        public $color;

        public function __construct($name,$age,$color){
            $this->name=$name;
            $this->age=$age;
            $this->color=$color;
        }

        public function getvalue(){
            return $this->name." ".$this->age." ".$this->color;
        }

        public function __destruct(){}
    }
?>