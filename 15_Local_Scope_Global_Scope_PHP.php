<?php
    $a="Ruban";
    function check(){
        global $a; //Global Scope
        $a="Soumita"; //Local Scope
        echo "<br>The Value Is $a <br>";
    }
    echo $a;
    check();
    echo var_dump($GLOBALS);
?>