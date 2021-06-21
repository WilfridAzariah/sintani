<?php
	require_once('function.php');
	
    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["Name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["Phone"]));
    $message = trim($_POST["Message"]);

    // Check the data.
    if (empty($name) OR empty($message) OR empty(phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.sintani.xyz/sintani/index.html?success=-1#form");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "superwilfrid@gmail.com";

    // Set the email subject.
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    //mail($recipient, $subject, $email_content, $email_headers);
    //mail($recipient, $subject, $email_content);
	smtp_mail($recipient, $subject, $email_content, '', '', 0, 0, true);

    
    // Redirect to the index.html page with success code
    header("Location: http://www.sintani.xyz/sintani/index.html?success=1#form");

?>