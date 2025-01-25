<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = htmlspecialchars($_POST["origin"]);
    $destination = htmlspecialchars($_POST["destination"]);
    $departure = htmlspecialchars($_POST["departure"]);
    $return = htmlspecialchars($_POST["return"] ?? "Not specified");
    $phone = htmlspecialchars($_POST["phone"]);

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'mail.jessoretravels.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'support@jessoretravels.com'; // Your email
        $mail->Password = '403Ayaat112233'; // Your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Email content
        $mail->setFrom('noreply@jessoretravels.com', 'Jessore Travels');
        $mail->addAddress('jessoretravelsbd@gmail.com');
        $mail->Subject = 'New Travel Search Query';
        $mail->Body = "You have received a new search query:\n\n"
            . "From: $origin\n"
            . "To: $destination\n"
            . "Departure Date: $departure\n"
            . "Return Date: $return\n"
            . "Phone Number: $phone";

        $mail->send();
        echo "Your query has been submitted successfully!";
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
