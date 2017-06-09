<?php

require 'lib/PHPMailer/PHPMailerAutoload.php';
include 'olvideContrasenia.helpers.php';
include 'config.php';

$mail = new PHPMailer;

$temporalPass = uniqid();

$destinatario = $_POST['email'];



// if ($error = emailNoExistente()) {
// 	$_SESSION['error_emailNoExistente'] = $error;
// 	header('Location: ../html/olvideContrasenia.php');
// } else {

	cambiarPassword($temporalPass);

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $config['email'];                 // SMTP username
	$mail->Password = $config['pass'];                           // SMTP password
	$mail->SMTPSecure = 'tls';             // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('soymiplanner@gmail.com', 'Soy Mi Planner');
	$mail->addAddress($destinatario);     // Add a recipient

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Recuperar contrasena';
	$mail->Body    = 'Ingresar con esta contrase&ntilde;a: '.$temporalPass.'  . Una vez que haya ingresado, puede modificarla. Saludos cordiales! El equipo de Soy Mi Planner';
	$mail->AltBody = 'Ingresar con esta contrasena: '.$temporalPass.' Una vez que haya ingresado, puede modificarla.';

	if(!$mail->send()) {
		echo 'La contraseña no pudo ser enviada.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'La contraseña ha sido enviada. Si no esta en bandeja de entrada, ver correos no deseados.';
		header('Refresh: 3; URL=../html/login.php');
	}

//}