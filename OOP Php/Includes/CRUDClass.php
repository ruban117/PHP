<?php
    include '../Classes/DatabaseConnect.php';
    class CRUD extends Dbh{
        public function InsertData($fn,$ln,$dob){
            $sql="INSERT INTO users(f_name, l_name, dob) VALUES(?,?,?)";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([$fn,$ln,$dob]);
        }

        
    }
?>