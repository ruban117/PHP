<?php
    declare(strict_types=1);
    class Calculator{
        private $operator;
        private $num1;
        private $num2;

        public function __construct(string $newoperator, int $newnum1, int $newnum2){
            $this->operator=$newoperator;
            $this->num1=$newnum1;
            $this->num2=$newnum2;
        }

        public function Calculate(){
            switch($this->operator){
                case 'add':
                    return $this->num1 + $this->num2;
                    break;
                case 'sub':
                    return $this->num1 - $this->num2;
                    break;
                case 'mul':
                    return $this->num1 * $this->num2;
                    break;
                case 'div':
                    return $this->num1 / $this->num2;
                    break;
            }
        }
    }
?>
