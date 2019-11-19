
<?php

if($_POST) 
{
	$customer_name = "";
	$customer_email = "";
	$subject = "";
	$department = "";
	$customer_message = "";
	 
	if(isset($_POST['customer_name'])) 
	{
		$customer_name = filter_var($_POST['customer_name'], FILTER_SANITIZE_STRING);
	}
	 
	if(isset($_POST['customer_email'])) 
	{
		$customer_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['customer_email']);
		$customer_email = filter_var($customer_email, FILTER_VALIDATE_EMAIL);
	}
	 
	if(isset($_POST['subject'])) 
	{
		$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
	}
	 
	if(isset($_POST['department'])) 
	{
		$department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
	}
	 
	if(isset($_POST['customer_message'])) 
	{
		$customer_message = htmlspecialchars($_POST['customer_message']);
	}
	 
	if($department == "product enquiry") 
	{
		$recipient = "productenquiry@domain.com";
	}
	else if($department == "other") 
	{
		$recipient = "customersupport@domain.com";
	}
	else if($department == "technical support") 
	{
		$recipient = "tech.support@domain.com";
	}
	else 
	{
		$recipient = "customerserviceteam@domain.com";
	}
	
	$headers  = 'MIME-Version: 1.0' . "\r\n"
	.'Content-type: text/html; charset=utf-8' . "\r\n"
	.'From: ' . $customer_email . "\r\n";
	 
	if(mail($recipient, $subject, $customer_message, $headers)) 
	{
		echo "<p>Thank you for contacting us, $customer_name. You will get a reply within 24 hours.</p>";
	} 
	else 
	{
		echo '<p>We are sorry but the email did not go through.</p>';
	}
	 
} 
else 
{
	echo '<p>Something went wrong</p>';
}

?>