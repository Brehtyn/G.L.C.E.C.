<?php

$name = $_POST[htmlspecialchars('private_name')];
$phone = $_POST[htmlspecialchars('private_phone')];
$visitor_email = $_POST[htmlspecialchars('private_email')];
$message = $_POST[htmlspecialchars('private_message')];

$url='https://www.glcec.org/index.html';

$email_from = "admin@glcec.org";

$to = "admin@ibigital.com, shanta@glcec.org";

$email_subject = "Private Form from GLCEC.org";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

$email_body = "You have received a private concern from $name (email: $visitor_email | phone#: $phone). \r\n Here is the message: \r\n $message";

mail($to,$email_subject,$email_body,$headers);

echo '<META HTTP-EQUIV=REFRESH CONTENT="15; '.$url.'">';

echo "<h1> FORM SENT SUCCESS! </h1>";

echo "Thank you " .$name. ", if your browser doesn't automatically redirect you in 30 seconds, please ";

echo "<a href='".$url."'>CLICK HERE.</a>";

?>
