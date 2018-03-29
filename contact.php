<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$respond_text = '';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = trim(filter_input(INPUT_POST, "name" ,  FILTER_SANITIZE_STRING));
		$email = trim(filter_input(INPUT_POST, "email" ,  FILTER_SANITIZE_STRING));
		$subject = trim(filter_input(INPUT_POST, "subject" ,  FILTER_SANITIZE_STRING));
		$message = trim(filter_input(INPUT_POST, "message" ,  FILTER_SANITIZE_STRING));

		// $honey_spam_pot = $_POST["honey_spam_pot"];
// }

if ($name == " " || $email == " ") {
		$respond_text = "Please fill in the required fields: Name and Email.";
		exit;
}

// if (!isset($respond_text) && !$honey_spam_pot == " " ) {
// 		$respond_text = "This is Spam email";
// 		exit;
// }

if (PHPMailer::validateAddress($email)) {
		$body = $name ."<br />";
		$body .= $subject ." " . $email . "<br />";
		$body .= $message;

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "adebolaaladesuru@googlemail.com";                 // SMTP username
    $mail->Password = 'csrijcmlppbncazq';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('adebolaaladesuru@googlemail.com', $name);
    $mail->addAddress('adebolaaladesuru@googlemail.com', 'Adebola A');     // Add a recipient
    $mail->addAddress('adebolaaladesuru@googlemail.com');               // Name is optional
    $mail->addReplyTo($email, $name);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
    $respond_text = 'Message sent and thank you for getting in touch';
} catch (Exception $e) {
    $respond_text = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
} 
else {
	$respond_text = "Something went wrong please try again";
}


echo $respond_text;


?>