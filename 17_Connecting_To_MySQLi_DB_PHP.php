<?php
    echo "Welcome to connect php file to database<br>";
    //Ways To Connect MySQL Database
    /*
    1> MySQLi Extention
    2> PDO
    */

    //Connecting To The Database

    $servername='localhost';
    $username='root';
    $password='';

    $conn=mysqli_connect($servername,$username,$password);

    if(!$conn){
        die("Failed To Connect With The Database!");
    }
    else{
        echo "Connection Established";
    }

?>