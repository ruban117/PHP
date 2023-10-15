<?php
    error_reporting(0);
    include('smtp/PHPMailerAutoload.php');
    class AdminDb{
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

        public function Insert($name,$email,$pass){
            $sql="INSERT INTO admin (name, email, password) VALUES(:name,:email,:pass)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['name'=>$name,'email'=>$email,'pass'=>$pass]);
            return true;
        }

        public function Login($email,$pass) {
            $sql = "SELECT COUNT(*) FROM admin WHERE email = :email AND password = :pass"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email, 'pass' => $pass]); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function Exists($email) {
            $sql = "SELECT COUNT(*) FROM admin WHERE email = :email"; // Remove the single quotes
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]); // Use an associative array to bind the parameter
            $no_of_users = $stmt->fetchColumn(); // Use fetchColumn() to get the count
            return $no_of_users;
        }

        public function getName($email){
            $sql = "SELECT name FROM admin WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['name'];
            } else {
                return null; // or handle the case where no user is found
            }
        }

    public function generateOTP() {
            return rand(1000, 9999);
    }

    

    public function smtp_mailer($to,$subject, $msg){
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8'; 
        $mail->Username = "rubanpathak706@gmail.com";
        $mail->Password = "tzxfzlpddnnaxlbx";
        $mail->SetFrom("bostirchelepocha@gmail.com");
        $mail->Subject = $subject;
        $mail->Body =$msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
        }else{
            return 'Sent';
        }
    }
}