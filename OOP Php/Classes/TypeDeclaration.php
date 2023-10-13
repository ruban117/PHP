<?php
    class TypeDeclaration{
        public $name;

        public function setname(string $newname){
            $this->name=$newname;
        }
        public function getname(){
            return $this->name;
        }
    }
?>