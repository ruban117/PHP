<?php
    require '25_Database_Connect_PHP.php';/*if the database produce no error then it successfully executed
                                            otherwise it throws an error*/
    /*include '25_Database_Connect_PHP.php';if the database produce an error it simply throws an warning
                                            but other scripts running <successfully></successfully>*/
    
    $sql="SELECT * FROM `contact_us_test`";
    $res=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($res);
    echo $num."<br>";
    while($row = mysqli_fetch_assoc($res)){
        echo $row['S_NO'];
    }
?>