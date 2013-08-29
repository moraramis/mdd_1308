<?php
    $username = $_REQUEST['userName'];
    $firstname = $_REQUEST['firstName'];
    $lastname = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $reason = $_REQUEST['reason'];
    $details = $_REQUEST['details'];

    $message_proper =
        "This message was sent from the InterestPoint Contact form.\n" .
            "\n" .
            "-----------------------Contact Details-----------------\n" .
            "\nUser Name: $username" .
            "\nFirst Name: $firstname" .
            "\nLast Name: $lastname" .
            "\nEmail Address: $email" .
            "\n" .
            "----------------Reason for Contact--------------------\n" .
            "\nReason: $reason" .
            "\nDetails: $details" .
            "\n";

    mail("moraramis@yahoo.com", "InterestPoint Contact Form", $message_proper, "From: $username");
    header("Location:index.php");
    exit;
?>

