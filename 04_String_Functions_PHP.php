<?php
    $name="Ruban Pathak";
    echo strlen($name)."<br>";
    echo str_word_count($name)."<br>";
    echo strrev($name)."<br>";
    echo strpos($name,"a")."<br>";
    echo str_replace("Ruban","Soumita",$name)."<br>";
    echo str_repeat($name,10)."<br>";
    echo "<pre>";
    echo ltrim("     This Is A L trim function     ");
    echo "</pre>";
    echo "<pre>";
    echo rtrim("This Is A R trim function     ");
    echo "</pre>";
?>