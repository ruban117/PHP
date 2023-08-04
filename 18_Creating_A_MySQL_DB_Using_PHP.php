<?php
    $servername="localhost";
    $username="root";
    $password="";

    $conn=mysqli_connect($servername,$username,$password);

    $sql="CREATE DATABASE RUBAN_TEST_DB";
    //$sql="DROP DATABASE RUBAN_TEST_DB";//For Drop Your Database

    $res=mysqli_query($conn,$sql);
    
    if($res){
        echo "Your Database Is Created Successfully";
    }
    else{
        echo "You Have An Error----->". mysqli_error($conn);
    }

    
?>