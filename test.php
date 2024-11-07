<?php	

        use PHPMailer\PHPMailer\PHPMailer;
		use  PHPMailer\PHPMailer\Exception;	
		require './vendor/autoload.php';
	function sendOTP($email,$otp) {
		// require 'vendor/phpmailer/phpmailer/src/Exception.php';
		// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
		// require 'vendor/phpmailer/phpmailer/src/SMTP.php';
		// use PHPMailer\PHPMailer\PHPMailer;
		// use  PHPMailer\PHPMailer\Exception;	
		// require 'vendor/autoload.php';

		$message_body = "Welcome to Food Donation Organization . Your OTP for Food donation login is ". $otp." OTP is valid for 5 minutes only";
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'TLS'; // tls or ssl
		$mail->Port     = "587";
		$mail->Username = "fwms.cse2024@gmail.com";
		$mail->Password = "xtnpvhmwcjmagigb";
		$mail->Host     = "smtp.gmail.com";
		$mail->Mailer   = "smtp";
		$mail->SetFrom("fwms.cse2024@gmail.com", "Food Donation");
		$mail->AddAddress($email);
		$mail->Subject = "OTP for registration";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);	
		if (!$mail->Send())	{
			$error = "Mailer Error: " . $mail->ErrorInfo;
			echo " '.$error.'";
		}else{
			$result = $mail->Send();
		}
		
		
		return $result;
	
	}
?>