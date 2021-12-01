<?php

$child_name = $_POST[htmlspecialchars('child_name')];
$child_birthdate = $_POST[htmlspecialchars('child_birthdate')];
$child_pt = $_POST[htmlspecialchars('child_pt')];
$child_gender = $_POST[htmlspecialchars('child_gender')];
$name = $_POST[htmlspecialchars('name')];
$phone = $_POST[htmlspecialchars('phone')];
$work_phone = $_POST[htmlspecialchars('work_phone')];
$visitor_email = $_POST[htmlspecialchars('email')];
$program = $_POST[htmlspecialchars('program')];
$date_needed = $_POST[htmlspecialchars('date_needed')];
$referral = $_POST[htmlspecialchars('referral')];

$url='https://www.glcec.org/index.html';

$email_from = "admin@glcec.org";

$to = "admin@ibigital.com";

$email_subject = "Enroll Form from GLCEC.org";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

$email_body = "You have received a new message from $name.
\r\n Here is the email: \r\n $visitor_email
\r\n Here is the mainphone: \r\n $phone
\r\n Here is the workphone: \r\n $work_phone
\r\n Here is the child's name: \r\n $child_name
\r\n Here is the child's birthday: \r\n $child_birthdate
\r\n Here is the child's gender: \r\n $child_gender
\r\n The child is potty trained: \r\n $child_pt
\r\n Here is the program requested: \r\n $program
\r\n Here is the date: \r\n $date_needed
\r\n Here is their referral: \r\n $referral";

mail($to,$email_subject,$email_body,$headers);

echo '<META HTTP-EQUIV=REFRESH CONTENT="15; '.$url.'">';

echo "<h1> FORM SENT SUCCESS! </h1>";

echo "Thank you " .$name. ", if your browser doesn't automatically redirect you in 30 seconds, please ";

echo "<a href='".$url."'>CLICK HERE.</a>";

?>
