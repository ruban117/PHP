<?php
    $username='root';
    $server='localhost';
    $password='';
    $database='ruban_test_db';

    $conn=mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        die("Failed To Established Connection To Database The Reason Is:- ".mysqli_connect_error());
    }
    else{
        echo "Connection Successfully Established!";
    }

    $sql="INSERT INTO `some_data` (`SNO`, `NAME`, `DESTINATION`) VALUES (NULL, 'SUSMITA', 'CHENNAI');";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<br>Records Inserted Successfully!";
    }
    else{
        echo "<br>Some Error Occured ".mysqli_error($conn);
    }
?>