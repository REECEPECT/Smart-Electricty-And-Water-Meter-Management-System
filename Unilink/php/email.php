<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "465";
//Set gmail username
	$mail->Username = "dboniso64@gmail.com";
//Set gmail password
	$mail->Password = "jopikjxojbpfmkxs";
//Email subject
	$mail->Subject = "Voucher";
//Set sender email
	$mail->setFrom('dboniso64@gmail.com');

//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "Hello Mr Xaba";
//Add recipient
	$mail->addAddress('nhlanhlax@hotmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Failed". $mail->ErrorInfo;
	}
//Closing smtp connection
	$mail->smtpClose();
?>