<?php
    spl_autoload_register('myAutoLoader');
    function myAutoLoader($classname){
        $path="Classes/";
        $extension=".php";
        $fullpath=$path.$classname.$extension;
        if(!file_exists($fullpath)){
            return false;
        }
        include_once $fullpath;
    }
?>