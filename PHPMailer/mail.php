<?php

$mailer  = 'vmestomobilnika@gmail.com';
$pass    = 'aq{VNd8CS]nPFU(Ndy_)L(BF';
$to      = 'vmestomobilnika@gmail.com';
$site    = 'vmestomobilnika.ru';
$name    = $_POST['name'];
$email   = $_POST['email'];
//$message = $_POST['message'];
$address = $_POST['address'];
$tel     = $_POST['tel'];
$human   = $_POST['human'];
$copy   = $_POST['copy'];

$subject = $_POST['subject'];
$message = 'От: '.$name.'<br /> Email: '.$email.'<br /> Адрес: '.$address.'<br /> Телефон: '.$tel;

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';						  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $mailer;                 // SMTP username
$mail->Password = $pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $mailer;
$mail->FromName = $site;
$mail->addAddress('vmestomobilnika@gmail.com', 'Вместо Мобильника');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('balakovo.er@gmail.com', 'Information');
if ($copy == "true") {
	$mail->addCC($email);
}
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;

if($human != "true") { die ("<center>Не отправлено. Вы — человек?<br /> Если да, то отметьте галочку 'Я человек' и попробуйте ещё раз</center><br />"); }
if($tel == "") {
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		if(!$mail->send()) {
			echo '<center>Запрос не отправлен.</center><br />';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo '<center>Запрос отправлен.</center><br />';
		}
} else {
	echo "<center>Неверный email, пожалуйста, введите корректный email.</center><br />";
}
} else {
	if(!$mail->send()) {
		echo '<center>Запрос не отправлен.</center><br />';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<center>Запрос отправлен.</center><br />';
	}
}