<?php
    class Person{
        public $name1="Ruban Pathak";
        private $name2="Byomkesh Bakshi";
        protected $name3="Prodosh Mitra";
        public function name(){
            echo "The Name Is:- ".$this->name2;
        }
    }

    class Acceptance extends Person{
        public function name(){
            echo "The Name Is:- ".$this->name1;
        }
    }
?>