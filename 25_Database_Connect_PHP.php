<?php
    $servername='localhost';
    $username='root';
    $password='';
    $database='contact-us-test';

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        echo 'Connection Is Not Established Successfully!';
    }
    else{
        echo 'Success! Connection Established To your Database '.$database;
    }

    
?>