<?php
    //Single Dimentional Array
    $arr=array(1,2,3,4);
    for($i=0;$i<count($arr);$i++){
        echo $arr[$i] . " ";
    }

    echo "<br>";


    echo "Two Dimentional Array <br>";
    //Two Dimentional Array

    $twodarr=array(
        array(1,2,3,4),
        array(5,6,7,8),
        array(9,10,11,12)
    );

    for($i=0;$i<count($twodarr);$i++){
        for($j=0;$j<count($twodarr[$i]);$j++){
            echo $twodarr[$i][$j] . " ";
        }
        echo "<br>";
    }

    //Three Dimentional Array
    echo "Three Dimentional Array <br>";
    $threedarray=array(
        array(
            array(1,2),
            array(3,4)
        ),
        array(
            array(5,6),
            array(7,8)
        )
    );

    for($i=0;$i<count($threedarray);$i++){
        for($j=0;$j<count($threedarray[$i]);$j++){
            for($k=0;$k<count($threedarray[$j]);$k++){
                echo $threedarray[$i][$j][$k];
            }
            echo "<br>";
        }
        echo "<br>";
    }
?>