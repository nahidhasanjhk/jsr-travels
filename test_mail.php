<?php
$to = "jessoretravelsbd@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent from your server.";
$headers = "From: noreply@jessoretravels.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully!";
} else {
    echo "Failed to send test email.";
}
?>
