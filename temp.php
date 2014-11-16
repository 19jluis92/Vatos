<?php 
	$to = "malejandro27@outlook.com";
	$subject = "Practica Correos";
	$message = "Miguel Alejandro Sandoval Gómez";
	$headers = 'From: hello@vatos.com';
	mail($to,$subject,$message,$headers);
	$to = "malejandro27@outlook.com";
	$subject = "Practica Correos";
	$message = "Erick Alfonso Fabian";
	$headers = 'From: malejandro27@outlook.com';
	mail($to,$subject,$message,$headers);
echo "hola";
 ?>