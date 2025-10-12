<?php

// Anti-spam: Check honeypot field
if (!empty($_POST['website'])) {
    die('Spam detected.');
}

// Anti-spam: Check if form was submitted too quickly (less than 3 seconds)
$timestamp = isset($_POST['timestamp']) ? intval($_POST['timestamp']) : 0;
$currentTime = time() * 1000; // Convert to milliseconds
$timeDiff = ($currentTime - $timestamp) / 1000; // Convert to seconds

if ($timeDiff < 3) {
    die('Form submitted too quickly. Please try again.');
}

// Anti-spam: Check if timestamp is too old (more than 1 hour)
if ($timeDiff > 3600) {
    die('Form expired. Please refresh the page and try again.');
}

$nameL = trim($_POST['nameL'] ?? 'Anonim');
$company = trim($_POST['company'] ?? '');
$email = trim($_POST['email'] ?? '');
$tel = trim($_POST['tel'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if (empty($nameL) || strlen($nameL) < 2) {
    $errors[] = 'Proszę podać imię (co najmniej 2 znaki).';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Proszę podać prawidłowy adres e-mail.';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Wiadomość musi zawierać co najmniej 10 znaków.';
}

if (!empty($errors)) {
    echo join('<br>', $errors);
    exit;
}

$to = 'office@sweetsteviam.com';
$from = 'office@sweetsteviam.com';
$subject = 'Contact Form Message from www.sweetsteviam.com - ' . $nameL;

$htmlBody = "
<html>
<head>
    <title>Contact Form Message</title>
</head>
<body>
    <h2>Contact Form Message from www.sweetsteviam.com</h2>
    <p><strong>From:</strong> $nameL</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Company:</strong> $company</p>
    <p><strong>Phone:</strong> $tel</p>
    <hr>
    <h3>Message:</h3>
    <p>" . nl2br(htmlspecialchars($message)) . "</p>
    <hr>
    <p><em>This message was sent from the contact form on www.sweetsteviam.com</em></p>
</body>
</html>
";

$textBody = "Contact Form Message from www.sweetsteviam.com\n\n";
$textBody .= "From: $nameL\n";
$textBody .= "Email: $email\n";
$textBody .= "Company: $company\n";
$textBody .= "Phone: $tel\n\n";
$textBody .= "Message:\n$message\n\n";
$textBody .= "This message was sent from the contact form on www.sweetsteviam.com";

$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=UTF-8";
$headers[] = "From: $from";
$headers[] = "Reply-To: $email";
$headers[] = "X-Mailer: PHP/" . phpversion();

$mailSent = mail($to, $subject, $htmlBody, implode("\r\n", $headers));

if ($mailSent) {
    echo 'Wiadomość została wysłana.';
} else {
    echo 'Wiadomość nie mogła zostać wysłana. Spróbuj ponownie później.';
}
?>