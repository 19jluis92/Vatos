<?php  
   class mail{
      public $email;
      public $message;

      private $email_to = 'VatosCarService@gmail.com';
      private $email_subject = 'VatosCarService';
      
      function __construct($email, $message)
      {
         $this->email = $email;
         $this->message = $message;
      }

      function send_mail()
      {
         ini_set("SMTP","aspmx.l.google.com");
         mail($this->email_to, $this->email_subject, $this->message);
      }

   }
?>