<?php
    declare(strict_types=1);
    include '../Classes/Calculator.php';

    if(isset($_POST['submit'])){
        $oper=$_POST['oper'];
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];

        $cal1=new Calculator($oper,(int)$num1,(int)$num2);

        try{
            $res=$cal1->Calculate();
            echo $res;
        }catch(TypeError $e){
            echo "Wrong Data Type".$e->getMessage();
        }
    }
    
?>