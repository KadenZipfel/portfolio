<?php

	$msg = "";

	if(isset($_POST['submit'])){
		require 'phpMailer/PHPMailerAutoLoad.php';

		function sendEmail($to, $from, $fromName, $body){
			$mail = new PHPMailer();
			$mail->setFrom($from, $fromName);
			$mail->addAddress($to);
			$mail->Subject = 'Contact form - Email';
			$mail->Body = $body;
			$mail->isHTML(isHTML: false);

			return $mail->send();
		}

		$name = $_POST['username'];
		$email = $_POST['email'];
		$body = $_POST['message'];

		if(sendEmail(to: 'kaden.zipfel@hotmail.com', $email, $name, $body)){
			$msg = "Your message has been sent!";
		}
	}

?>
