<?php
function send_mail($email,$message,$subject)
	{						
		require_once('composer/vendor/autoload.php');
		$config = parse_ini_file('info.ini', true);

		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "tls";
		$mail->SMTPAutoTLS = false;                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 587;             
		$mail->AddAddress($email);
		$mail->Username= $config['email']['username'];  
		$mail->Password= $config['email']['password'];            
		$mail->SetFrom('abarmardeatashyne@gmail.com','Root');
		$mail->AddReplyTo("abarmardeatashyne@gmail.com","Reply Message");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}


?>