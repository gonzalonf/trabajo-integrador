<?php

function validarCambioMail($email,$email2){

	$email = trim($email);
	$email2 = trim($email2);

	$error = '';

	if ($email=='' || $email2==''){
		$error = '* Debe completar ambos campos.';
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) )  {
		$error = '* El e-mail no es valido.';
	} elseif ($email!==$email2){
		$error = '* Los e-mails no coinciden.';
	}
	return $error;
}

// ------------------

function cambiarEmail($id,$nuevoMail,$ruta){
	$fh = file_get_contents($ruta);
	$users = json_decode($fh,true);

	$users[$id]['email'] = $nuevoMail;
	$users = json_encode($users);

	file_put_contents($ruta,$users);

	$_SESSION['login']['email'] = $nuevoMail;
}