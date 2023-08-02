<?php
    //Indexed Array
    $arr=array("Ruban","Soumita","Souvik","Susmita");
    foreach($arr as $value){
        echo $value . "<br>";
    }
    //Associative Array
    $arr2=array("Ruban"=>15201221117,
                "Soumita"=>15201221096,
                "Souvik"=>15201221108,
                "Susmita"=>15201221109);
    foreach($arr2 as $key=>$value){
        echo "The Name Is $key And Roll Number Is $value". "<br>";
    }
?>