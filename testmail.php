<?php
ini_set( 'display_erros', 1 );
error_reporting( E_ALL );
$to = "superwilfrid@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail works";
$headers = "From: ";
mail($to,$subject,$message,$headers);
echo "the mail has been sent";
?>