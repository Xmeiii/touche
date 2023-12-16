<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments provided!";
    http_response_code(400); // Bad Request
    return false;
}

// Sanitize input data to prevent email injection
$name = htmlspecialchars($_POST['name']);
$email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST['message']);

// Create the email and send the message
$to = 'tranngosaomai@gmail.com';
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: tranngosaomai@gmail.com\r\n";
$headers .= "Reply-To: $email_address\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";

// Send email
$mail_success = mail($to, $email_subject, $email_body, $headers);

if ($mail_success) {
    echo "Message sent successfully!";
    http_response_code(200); // OK
    return true;
} else {
    echo "Failed to send message. Please try again later.";
    http_response_code(500); // Internal Server Error
    return false;
}
?>
