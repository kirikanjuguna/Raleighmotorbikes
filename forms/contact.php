<?php
// contact.php

// Replace with your receiving email address
$receiving_email_address = 'njugunakirika@gmail.com';

// Include the PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new instance of PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set email parameters
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['full_name'];
$contact->from_email = $_POST['email'];
$contact->subject = 'New distributor request';

// Add messages for other fields
$contact->add_message($_POST['full_name'], 'Full Name');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['company_name'], 'Company Name');
$contact->add_message($_POST['mobile_number_1'], 'Mobile Number 1');
$contact->add_message($_POST['mobile_number_2'], 'Mobile Number 2');
$contact->add_message($_POST['physical_address'], 'Physical Address');

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
);
*/

// Send email
echo $contact->send();
?>
