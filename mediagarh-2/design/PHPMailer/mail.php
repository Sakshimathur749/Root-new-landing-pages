<?php
require "PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 		$mail->SMTPDebug  = 2;
	
	$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
   				 )
			);
 
  		$mail->SMTPSecure = 'tsl';
        $mail->Host = 'localhost';
     
        $mail->Username = 'support@roots.ac.in';
        $mail->Password = 'Support@123#';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="admissions@roots.ac.in";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
           
            echo "Please try Later, Error Occured while Processing...". $mail->ErrorInfo;
           
        }
        else 
        {
            echo "Thanks You !! Your email is sent.";  
           
        }
    }
    
  // $to   = 'test-m1ulck3et@srv1.mail-tester.com';
   //$to   = 'doondeswar@gmail.com';
$to   = 'webleads@roots.ac.in';
    $from = 'admissions@roots.ac.in';
    $name = 'mallareddy university';
    $subj = 'PHPMailer 5.2 testing from DomainRacer';
    $msg = 'This is mail about testing mailing using PHP.';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
?>
