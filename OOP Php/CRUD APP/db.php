<?php
    class Database{
        private $dsn="mysql:host=localhost; dbname=oop_crud";
        private $user="root";
        private $pass="";
        public $conn;

        public function __construct(){
            try{
                $this->conn=new PDO($this->dsn,$this->user,$this->pass);
                //echo "Connected";
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

         public function Insert($fname,$lname,$email,$contact){
             $sql="INSERT INTO users (f_name,l_name,email,contact) VALUES(:fname,:lname,:email,:contact)";
             $stmt=$this->conn->prepare($sql);
             $stmt->execute(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'contact'=>$contact]);
             return true;
         }

         //view

         public function Read(){
            $data=array();
            $sql="SELECT * FROM users";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[]=$row;
            }
            return $data;
         }

         //get user by id

         public function GetUserById($id){
            $sql="SELECT * FROM users WHERE id= :id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
         }
         //update

         public function Update($id,$fname,$lname,$email,$contact){
            $sql="UPDATE users SET f_name=:fname, l_name=:lname, email=:email, contact=:contact WHERE id=:id";
            $stmt=$this->conn->prepare($sql);
            $result=$stmt->execute(['fname'=>$fname,'fname'=>$fname,'lname'=>$lname,'email'=>$email,'contact'=>$contact, 'id'=>$id]);
            return true;
         }

         //delete

         public function Delete($id){
            $sql="DELETE FROM users WHERE id=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
         }

         //total row counts

         public function TotalRowCount(){
            $sql="SELECT * FROM users";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $totalrow=$stmt->rowCount();
            return $totalrow;
         }

         //check user exists or not

         public function Exists($email){
            $sql="SELECT * FROM users WHERE email=:email";
            $stmt=$this->conn->prepare($sql);
            $no_of_users=$stmt->execute(['email'=>$email]);
            return $no_of_users;
         }
    }
?>