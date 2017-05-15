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

function validarCambioPass($psw,$psw2){

	$error = '';

	if ($psw == ''){
		$error = '* Completar la contraseña.';
	}elseif ($psw2 == ''){
		$error  = '* Confirmar la contraseña.';
	} elseif ($psw !== $psw2){
		$error = '* Las contraseñas no coinciden.';
	}

	return $error;

}
//-------------------

function cambiarEmail($id,$nuevoMail,$ruta){
	$fh = file_get_contents($ruta);
	$users = json_decode($fh,true);

	$users[$id]['email'] = $nuevoMail;
	$users = json_encode($users);

	file_put_contents($ruta,$users);

	$_SESSION['login']['email'] = $nuevoMail;
}

//----------------

function cambiarPassword($id,$nuevoPass,$ruta){
	$fh = file_get_contents($ruta);
	$users = json_decode($fh,true);

	$pswHash = password_hash($nuevoPass,PASSWORD_DEFAULT);
	$users[$id]['passwordHash'] = $pswHash;
	$users = json_encode($users);

	file_put_contents($ruta,$users);
}

//-------------------

function cambiarNombre($id,$nuevoNombre, $nuevoApellido, $ruta){
	$json = file_get_contents($ruta);
	$users = json_decode($json,true);

	$users[$id]['nombre'] = $nuevoNombre;
	$users[$id]['apellido'] = $nuevoApellido;
	$users = json_encode($users);

	file_put_contents($ruta,$users);

	$_SESSION['login']['nombre'] = $nuevoNombre;
	$_SESSION['login']['apellido'] = $nuevoApellido;
}

//-------------------

function cambiarAvatar($id, $nuevo_avatar, $ruta){
	$json = file_get_contents($ruta);
	$users = json_decode($json,true);

	$users[$id]['avatar'] = $nuevo_avatar;
	$users = json_encode($users);

	file_put_contents($ruta,$users);

	$_SESSION['login']['avatar'] = $nuevo_avatar;
}
