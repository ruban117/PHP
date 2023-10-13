<?php
    class UseStatic{
        public static $name="Runam";
        public static function setname($newname){
            self::$name=$newname;
        }

        public function setname2($newname){
            self::$name=$newname;
        }

        public function getname(){
            return self::$name;
        }
    }
?>