<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "mamun.billa444@gmail.com"; 

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Here are the details:\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Phone: $phone\n" .
                  "Subject: $subject\n\n" .
                  "Message:\n$message";

    $headers = "From: $name <$email>";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
