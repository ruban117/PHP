<?php
    //Scope Resolution Operator (::)
    class First{
        public const EXAMPLE="You Can't Change This";
        public static function first(){
            $testing="This Is A Testing";
            return $testing;
        }
    }

    class Second extends First{
        public static $staticproperty="This Is Static Testing";
        public static function second(){
            echo parent::EXAMPLE;
            echo self::$staticproperty;
        }
    }
?>