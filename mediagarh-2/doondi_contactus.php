<?php

//$recipient_email    = "support@modygroup.co.in"; //recepient
$recipient_email = implode(", ", [
    "info@roots.ac.in",
    "design@roots.ac.in",
    "webleads@roots.ac.in",
    "doondeswar@gmail.com",
    "doondi@margindia.org",
    "ceo@brandebuzz.com"
]);

//$recipient_email    = "doondeswar@gmail.com"; //recepient
$from_email = "ROOTS FOOD PREPARATION & CULINARY ARTS<support@roots.ac.in>"; //from email using site domain.


if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('Sorry Request must be Ajax POST'); //exit script
}

if ($_POST) {
    /* doondi start */

    date_default_timezone_set("Asia/Kolkata");

    $dt = date('d-m-Y h:i:s A');
    include('charrand.php');
    $refno = generateRandomString();
    /* doondi end */
    $sender_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //capture sender name
    $sender_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //capture sender email
    /*  $country_code   = filter_var($_POST["phone1"], FILTER_SANITIZE_NUMBER_INT);*/
    $phone_number = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
    $subject = "FOOD PREPARATION & CULINARY ARTS";

    //php validation
    if (strlen($sender_name) < 2) { // If length is less than 4 it will output JSON error.
        print json_encode(array('type' => 'error', 'text' => 'Name is too short or empty!'));
        exit;
    }
    if (!filter_var($sender_email, FILTER_VALIDATE_EMAIL)) { //email validation
        print json_encode(array('type' => 'error', 'text' => 'Please enter a valid email!'));
        exit;
    }

    if (!filter_var($phone_number, FILTER_SANITIZE_NUMBER_FLOAT)) { //check for valid numbers in phone number field
        print json_encode(array('type' => 'error', 'text' => 'Enter only digits in phone number'));
        exit;
    }
    if (strlen($subject) < 1) { //check emtpy subject
        print json_encode(array('type' => 'error', 'text' => 'Subject is required'));
        exit;
    }


    $subject1 = "ROOTS FOOD PREPARATION & CULINARY ARTS";
    $message = '
    <table width="640" cellspacing="0" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51);background-color:rgb(255,255,255);margin:0 auto" cellpadding="0"> 

   <tbody> 

    <tr> 

     <td valign="top" style="padding:20px 0px 10px 10px;width:100px;border-collapse:collapse"><img alt="logo" border="0" height="45" src="https://roots.ac.in/diploma-in-food-preparation-and-culinary-arts/images/roots_1.png"  style="font-size:11px" width="168" class="CToWUd"></td> 

     <td style="text-align:right;padding:0px 20px"> 

      <table cellspacing="0" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51);margin:0 auto;border-collapse:collapse" cellpadding="0"> 

       <tbody> 

        <tr> 

         <td style="border-bottom:1px solid rgb(204,204,204);width:490px"> 

          <table align="right" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51)"> 

           <tbody> 

            <tr style="padding:5px 0px 5px 0px;white-space:nowrap;border-collapse:collapse;text-align:right;width:490px"> 

             <td> <a href="" style="text-decoration:none;color:rgb(0,102,153);font-family:Arial,san-serif" target="_blank">Date</a> </td> 

             <td> <span style="text-decoration:none;color:#ccc;font:15px Arial,san-serif">&nbsp;|&nbsp;</span> </td> 

             <td>' . $dt .

        '</td> 

            </tr> 

           </tbody> 

          </table> </td> 

        </tr> 

         

         

       </tbody> 

      </table> </td> 

    </tr> 

    <tr> 

     <td colspan="2" style="width:640px"> <p style="font:22px \'Times New Roman\', Times, serif;color:#cc6600;margin:15px 20px 0 20px">Dear Team,</p>  <p style="margin:4px 20px 18px 20px;width:640px; font:14px \'Times New Roman\', Times, serif;text-decoration:none;color:#006699;  font-size:16px;"> below is the Query message from ' . ucwords($sender_name) . ' And the Reference Number is <span style="color:red;"/>' . $refno . '</span></p> </td> 

    </tr> 

    <tr> 

     <td colspan="2" valign="top" style="padding:10px 0px 20px 30px;width:640px"><table cellspacing="0" style="width:640px" cellpadding="0">
       <tbody>
         <tr>
           <td colspan="2" valign="top" style="font:18px \'Times New Roman\', Times, serif;color:#cc6600;border-bottom:1px solid #ccc;"> Message Details</td>
         </tr>
		 
		 
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Name</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $sender_name . '</p></td>
         </tr>
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">E-Mail</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $sender_email . '</p></td>
         </tr>
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Mobile</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $phone_number . '</p></td>
         </tr>
		 <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Subject</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $subject . '</p></td>
         </tr>
		 
         
       </tbody>
     </table></td> 

    </tr> 

     

     <tr> 

     <td colspan="2" style="width:640px"> <p style="font:22px \'Times New Roman\', Times, serif;color:#cc6600;margin:0px 20px 0 20px"></p> <p style="margin:0px 20px 12px 20px;width:640px; font:14px \'Times New Roman\', Times, serif;text-decoration:none;color:#666;  font-size:11px; line-height:14px;align:left;"> * Terms & conditions apply.<br />
In case you are receiving our e-mail in your Junk-mail/Spam, mark this e-mail as Not Junk/Spam or add it to your Safe Sender\'s list.<br />
If you are not the correct recipient of this mailer please Delete from your mail<br />

If you do not wish to receive such e-mail communication from ROOTS FOOD PREPARATION & CULINARY ARTS in the future, Please mail to support@roots.ac.in<br />

Please do not reply to this e-mail, this is sent from an unattended mail box. In case you have any<br />

 queries/responses, please mail to support@roots.ac.in. <br><br> </p> </td> 

    </tr>

    <tr> 

     <td colspan="2" style="font-size:10px;color:#666;padding:0 20px 20px 20px;line-height:16px;width:640px; border-top:1px solid #eaeaea"> <p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p> </td> 

    </tr> 

   </tbody> 

  </table>
  
  
  
  '; //capture message


    /*   $boundary = md5("sanwebe.com");

       $headers = "MIME-Version: 1.0\r\n";
           $headers .= "From:".$from_email."\r\n";
           $headers .= "Reply-To: ".$sender_email."" . "\r\n";
           $headers .= "Content-Type: text/html; boundary = $boundary\r\n\r\n"; */

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    $headers .= 'To:' . "\r\n";
    $headers .= 'From: ROOTS FOOD PREPARATION & CULINARY ARTS<support@roots.ac.in>' . "\r\n";

    $body = $message;

    $sentMail = mail($recipient_email, $subject1, $body, $headers);
    if ($sentMail) //output success or failure messages
    {
        /* doondi  */
        $message1 = '  <table width="640" cellspacing="0" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51);background-color:rgb(255,255,255);margin:0 auto" cellpadding="0"> 

   <tbody> 

    <tr> 

     <td valign="top" style="padding:20px 0px 10px 10px;width:100px;border-collapse:collapse"><img alt="logo" border="0" height="45" src="https://roots.ac.in/diploma-in-food-preparation-and-culinary-arts/images/roots_1.png"  style="font-size:11px" width="168" class="CToWUd"></td> 

     <td style="text-align:right;padding:0px 20px"> 

      <table cellspacing="0" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51);margin:0 auto;border-collapse:collapse" cellpadding="0"> 

       <tbody> 

        <tr> 

         <td style="border-bottom:1px solid rgb(204,204,204);width:490px"> 

          <table align="right" style="font:12px/16px \'Times New Roman\', Times, serif;color:rgb(51,51,51)"> 

           <tbody> 

            <tr style="padding:5px 0px 5px 0px;white-space:nowrap;border-collapse:collapse;text-align:right;width:490px"> 

             <td> <a href="" style="text-decoration:none;color:rgb(0,102,153);font-family:Arial,san-serif" target="_blank">Date</a> </td> 

             <td> <span style="text-decoration:none;color:#ccc;font:15px Arial,san-serif">&nbsp;|&nbsp;</span> </td> 

             <td>' . $dt .

            '</td> 

            </tr> 

           </tbody> 

          </table> </td> 

        </tr> 

         

         

       </tbody> 

      </table> </td> 

    </tr> 

    <tr> 

     <td colspan="2" style="width:640px"> <p style="font:22px \'Times New Roman\', Times, serif;color:#cc6600;margin:15px 20px 0 20px">Dear ' . ucwords($sender_name) . ',</p>  <p style="margin:4px 20px 18px 20px;width:640px; font:14px \'Times New Roman\', Times, serif;text-decoration:none;color:#006699;  font-size:16px;"> Thank you for your interest, Your Message is received with below details. And your Reference Number is <span style="color:red;"/>' . $refno . '</span></p> </td> 

    </tr> 

    <tr> 

     <td colspan="2" valign="top" style="padding:10px 0px 20px 30px;width:640px"><table cellspacing="0" style="width:640px" cellpadding="0">
       <tbody>
         <tr>
           <td colspan="2" valign="top" style="font:18px \'Times New Roman\', Times, serif;color:#cc6600;border-bottom:1px solid #ccc;"> Message Details</td>
         </tr>
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Name</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $sender_name . '</p></td>
         </tr>
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">E-Mail</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $sender_email . '</p></td>
         </tr>
         <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Mobile</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $phone_number . '</p></td>
         </tr>
		 <tr>
           <td width="102"  valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">Subject</p></td>
           <td width="536" valign="top" style="font:14px \'Times New Roman\', Times, serif;padding:11px 0 14px 18px;background-color:#efefef"><p style="margin:2px 0">' . $subject . '</p></td>
         </tr>
		
        
         </tr>
       </tbody>
     </table></td> 

    </tr> 
	
  <tr> 

     <td colspan="2" style="width:640px"> <p style="font:22px \'Times New Roman\', Times, serif;color:#cc6600;margin:0px 20px 0 20px"></p> <p style="margin:0px 20px 12px 20px;width:640px; font:14px \'Times New Roman\', Times, serif;text-decoration:none;color:#666;  font-size:11px; line-height:14px;align:left;"> * Terms & conditions apply.<br />
In case you are receiving our e-mail in your Junk-mail/Spam, mark this e-mail as Not Junk/Spam or add it to your Safe Sender\'s list.<br />
If you are not the correct recipient of this mailer please Delete from your mail<br />

If you do not wish to receive such e-mail communication from ROOTS FOOD PREPARATION & CULINARY ARTS in the future, Please mail to support@roots.ac.in<br />

Please do not reply to this e-mail, this is sent from an unattended mail box. In case you have any<br />

 queries/responses, please mail to support@roots.ac.in. <br><br> </p> </td> 

    </tr>

    <tr> 

     <td colspan="2" style="font-size:10px;color:#666;padding:0 20px 20px 20px;line-height:16px;width:640px; border-top:1px solid #eaeaea"> <p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p> </td> 

    </tr> 

   </tbody> 

  </table>';
        $subject1 = "ROOTS FOOD PREPARATION & CULINARY ARTS";
//$to="doondeswar@gmail.com";

        $headers1 = 'MIME-Version: 1.0' . "\r\n";
        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers1 .= 'To:' . "\r\n";
        $headers1 .= 'From: ROOTS FOOD PREPARATION & CULINARY ARTS<support@roots.ac.in>' . "\r\n";
        // Mail it
        // $status =mail($sender_email, $subject1, $message1, $headers1);//customer, $sender_email
        $datetime = date('Y-m-d h:i:s');
        // include("2-admin/config.php");
        $con = mysqli_connect("localhost", "roots", "@7ocoN48", "admin");
        $sql_ins = "INSERT INTO `diplomo_in_fashion_designing`(`name`, `email`, `contact`, `added_date`,`category`) VALUES (\"$sender_name\",\"$sender_email\",\"$phone_number\",\"$datetime\",\"diploma-in-food-preparation-and-culinary-arts\")";
        mysqli_query($con, $sql_ins);
        mysqli_close($con);
        /* end doondi */
        print json_encode(array('type' => 'done', 'text' => "Request Received"));
        exit;
    } else {

        print json_encode(array('type' => 'error', 'text' => error_get_last(line)));
        exit;
    }
}
?>