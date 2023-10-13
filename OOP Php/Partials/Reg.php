<?php
    include '../Includes/CRUDClass.php';

    if(isset($_POST['submit'])){
        $fn=$_POST['fn'];
        $ln=$_POST['ln'];
        $dob=$_POST['dob'];

        $obj=new CRUD();
        $res=$obj->InsertData($fn,$ln,$dob);
        if($res){
            echo "Data Inserted Successfully";
        }
    }
?>