<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'Portfolio Contact';
    $email_subject = 'New Message from Portfolio Contact';
    $email_body = "Name: $name.\n";
                  "Email: $email.\n";
                  "Message: $message.\n";

    $to = "agbachicha@outlook.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";

    mail($to,$email-subject,$email_body,$headers);

    header("location: index.html");
?>