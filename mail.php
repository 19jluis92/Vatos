<?php  
require 'Mailer/PHPMailerAutoload.php';
   class mail
   {
      function __construct($email, $email_subject ,$message)
      {
         $mail = new PHPMailer;
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtpout.asia.secureserver.net';                // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'hello@parapentestudio.com';                 // SMTP username
         $mail->Password = 'P@ssw0rd';                           // SMTP password
         $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 465;                                    // TCP port to connect to

         $mail->From = 'hello@carservice.com';

         $mail->FromName = 'Vatos Car Service';
         $mail->addAddress($email);     // Add a recipient
         $mail->WordWrap = 50;                                 // Set word wrap 
         $mail->isHTML(true);                                  // Set email 
         $mail->Subject = $email_subject;
         $mail->Body    = $message;
         $mail->AltBody = 'Vatos';
         $mail->SMTPDebug = 1;
         if(!$mail->send())
         {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
         }
         else
         {
           echo 'Message has been sent';
         }
      }
   }
?>