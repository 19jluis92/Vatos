<?php  
   class mail{
      public $email_to;
      public $email_subject;
      public $message;

      private $headers = 'From: hello@carservice.com Reply-To: hello@carservice.com';
      function __construct($email, $email_subject ,$message)
      {
         $this->email_to = $email;
         $this->email_subject = $email_subject;
         $this->message = $message;
      }

      function send_mail()
      {
         ini_set("SMTP","aspmx.l.google.com");
         ini_set("smtp_port","25");
         mail($this->email_to, $this->email_subject, $this->message, $this->headers);
      }

   }
?>