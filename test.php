<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>test</title>
</head>
<body>
    <?php
    echo "valid email";
    $to_email = "receipient@gmail.com";
    $subject = "Simple Email Test via PHP";
    $body = "Hi, This is test email send by PHP Script";
    $headers = "From: sender email";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }


    ?>
</body>
</html>