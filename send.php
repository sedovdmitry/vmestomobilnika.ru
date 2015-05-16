<?php
// Here we get all the information from the fields sent over by the form.
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$tel = $_POST['tel'];
$human = $_POST['human'];
 
$to = 'vmestomobilnika@gmail.com';
$subject = 'Новый запрос';
$message = 'От: '.$name.'\r\n Email: '.$email.'\r\n Сообщение: '.$message.'\r\n Телефон: '.$tel;

$headers = 'From: vmestomobilnika.ru' . "\r\n" .
    'Reply-To: vmestomobilnika.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
if($human == "true"):
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		mail($to, $subject, $message, $headers); //This method sends the mail.
		echo "Спасибо! Ваш запрос отправлен на обработку."; // success message
    }else{
		echo "Неверный email, пожалуйста, введите корректный email.";
	}	
else:
    echo "Не отправлено. Вы - человек? Если да, то отметьте галочку 'Я человек' и попробуйте ещё раз";
endif;


?>