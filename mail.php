<?php
$to = "ezealidaniel29@gmail.com"; // Replace with the recipient's email address
$subject = "Hello, User!";
$message = "This is a test email sent from PHP.";
$headers = "From: ezealiokechukwu1999@gmail.com"; // Replace with your email address

// Use the mail() function to send the email
$mailSent = mail($to, $subject, $message, $headers);

if ($mailSent) {
    echo "Email sent successfully!";
} else {
    echo "Email delivery failed.";
}
?>