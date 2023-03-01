<?php

$name = $_POST[htmlspecialchars('name')];
$phone = $_POST[htmlspecialchars('phone')];
$visitor_email = $_POST[htmlspecialchars('email')];
$message = $_POST[htmlspecialchars('message')];

$site_url='https://www.glcec.org/';

$email_from = "admin@glcec.org";

$to = "admin@ibigital.com, shanta@glcec.org";

$email_subject = "Contact Form from GLCEC.org";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

$email_body = "You have received a new message from $name (email: $visitor_email | phone#: $phone). \r\n Here is the message: \r\n $message";

if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}

$secretKey = file_get_contents('key.txt');

$ip = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip;

$response = file_get_contents($url);

$response = json_decode($response);

if (empty($name)) {
    echo "Sorry, a name is required.";
    return false;
}

if (empty($visitor_email)) {
    echo "Sorry, a return email is required.";
    return false;
}

if($response->success==true){
    
        mail($to,$email_subject,$email_body,$headers);
    
        echo '<META HTTP-EQUIV=REFRESH CONTENT="15; '.$site_url.'">';
    
        echo "<h1> FORM SENT SUCCESS! </h1>";
    
        echo "Thank you " .$name. ", if your browser doesn't automatically redirect you in 30 seconds, please ";
    
        echo "<a href='".$site_url."'>CLICK HERE.</a>";
    }

else {

    echo "<h1> Verification Error </h1>";

    echo "Sorry " .$name. ", please contact us if the problem persists. ";

}

?>
