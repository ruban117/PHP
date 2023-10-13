<?php
    class Setter{
        public $name;
        public $age;
        public $eyecolor;

        public function setProperty($name,$age,$eyecolor){
            $this->name=$name;
            $this->age=$age;
            $this->eyecolor=$eyecolor;
        }
    }

?>