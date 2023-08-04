<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assuming you have the PHPMailer library in the "vendor" directory.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Configure the PHPMailer object
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'officialsanthosh.n2004@gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'santhoshn'; // Replace with your SMTP username
        $mail->Password   = 'santhosh@1234'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // Use appropriate SMTP port

        // Recipients
        $mail->setFrom('officialsanthosh.n2004@gmail.com', 'santhoshN'); // Replace with your email and name
        $mail->addAddress('sandy7708234949@gmail.com'); // Replace with the email address where you want to receive the user's message

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";

        $mail->send();
        echo 'Message has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
