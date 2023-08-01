<?php
    function total_nums($arr){
        $sum=0;
        foreach($arr as $val){
            $sum+=$val;
        }
        return $sum;
    }

    function average($arr){
        $i=0;
        $sum=0;
        foreach($arr as $val){
            $sum+=$val;
            $i++;
        }
        return $sum/$i;
    }
    $arr=array(10,20,30,40,50);
    echo total_nums($arr) ."<br>";
    echo average($arr);
?>