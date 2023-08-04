<?php
    $servername='localhost';
    $username='root';
    $password='';
    $database='ruban_test_db';

    $res=mysqli_connect($servername,$username,$password,$database);

    if(!$res){
        die("There Is Some error occured!!------> ".mysqli_connect_error());
    }
    else{
        echo "Connection Established Successfully!";
    }

    //creating our table

    $sql="CREATE TABLE `SOME_DATA` (`SNO` INT(6) NOT NULL AUTO_INCREMENT , `NAME` VARCHAR(11) NOT NULL,`DESTINATION` VARCHAR(10) NOT NULL , PRIMARY KEY (`SNO`))";

    $res2=mysqli_query($res,$sql);
    if($res2){
        echo "<br> Table Created Successfully!";
    }
    else{
        echo "<br>There Is Some Error Occured-------->".mysqli_error($res);
    }
?>