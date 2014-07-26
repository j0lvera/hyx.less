<?php 
	$toemail = 'jolvera@adwhite.com';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$procedence = $_POST['procedence'];
	$comments = $_POST['comments'];
	$landing = $_POST['landing'];

	$text = 
	"Landing Page: --> ".$landing."\r\n
	"."Name: --> ".$name."\r\n
	"."Email: --> ".$email."\r\n
	"."Phone: --> ".$phone."\r\n
	"."Procedence: --> ".$procedence."\r\n
	"."Comments: --> ".$comments."\r\n";

	mail($toemail, 'Lead From adWhite Landing Page', $text);
?>
