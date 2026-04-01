<?PHP
// Pear Mail Library
require_once "Mail.php";

$from = 'support@roots.ac.in'; //change this to your email address
$to = 'doondeswar@gmail.com'; // change to address
$subject = 'Insert subject here'; // subject of mail
$body = "Hello world! this is the content of the email"; //content of mail

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'webleads@roots.ac.in', //your gmail account
        'password' => 'Roots#123' // your password
    ));

// Send the mail
$mail = $smtp->send($to, $headers, $body);
?>