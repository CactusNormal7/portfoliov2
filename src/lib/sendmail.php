<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "jules.besson7@gmail.com";
    $subject = $_POST["subject"];
    $message = $_POST["body"];
    $headers = "From: webmaster@example.com" . "\r\n" .
               "Reply-To: webmaster@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    mail($to, $subject, $message, $headers);

    // Redirection après l'envoi du mail
    header("Location: confirmation.html");
    exit;
}
?>
