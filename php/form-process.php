<?php

$errorMSG = "";

// EMAIL
if (empty($_POST["email"])) {
	$errorMSG .= "Destination email address is required ";
} else {
	$email = $_POST["email"];
}

// CC
if (empty($_POST["cc"])) {
	$Cc .= "";
} else {
	$Cc = $_POST["cc"];
}

// CC
if (empty($_POST["bcc"])) {
	$Bcc .= "";
} else {
	$Bcc = $_POST["bcc"];
}

// SUBJECT
if (empty($_POST["subject"])) {
	$errorMSG .= "Subject is required ";
} else {
	$subject = $_POST["subject"];
}

// MESSAGE
if (empty($_POST["message"])) {
	$errorMSG .= "Message is required ";
} else {
	$message = $_POST["message"];
}

$EmailTo = $email;
$Subject = $subject;

// prepare email header
$Header = "";
$Header = "From: admin@mvivere.com <admin@mvivere.com>\r\n";
$Header .= "Reply-To: admin@mvivere.com\r\n";
$Header .= 'CC: ' . $Cc . "\r\n";
$Header .= 'BCC: ' . $Bcc . "\r\n";

// prepare email body text
$Body = "";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $Header);

// redirect to success page
if ($success && $errorMSG == "") {
	echo "success";
} else {
	if ($errorMSG == "") {
		echo "Something went wrong :(";
	} else {
		echo $errorMSG;
	}
}

?>