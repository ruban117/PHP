<?php
error_reporting(0);
include('smtp/PHPMailerAutoload.php');
echo smtp_mailer('rubanpathak11796@gmail.com','Hello','<button id="eventButton">Click Me</button>');
function smtp_mailer($to,$subject, $msg){
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
?>

<script>
        document.getElementById('eventButton').addEventListener('click', function() {
            // Send an event to your localhost server using an image request
            var image = new Image();
            image.src = 'http://localhost/track-event.php?userId=123&event=button_click';
        });
</script>

<?php
$userId = $_GET['userId'];
$event = $_GET['event'];

// Log the event or perform any desired action here
file_put_contents('event-log.txt', "User $userId clicked the button and triggered event: $event\n", FILE_APPEND);
?>
