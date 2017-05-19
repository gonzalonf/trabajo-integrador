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

//-----------------------------------------------------------------------------

function guardarCambioAvatar() {

	$error_avatar = '';
	$ruta_avatar = __DIR__ . "/../users/";
	$ext_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

	if ($_FILES['avatar']['error'] == UPLOAD_ERR_OK) {

		$nombre = $_FILES['avatar']['name'];
		$peso_archivo = $_FILES['avatar']['size'];
		$archivo_tmp = $_FILES['avatar']['tmp_name'];
		$ext = pathinfo($nombre, PATHINFO_EXTENSION);

//aca tira warning-
		list($ancho, $alto) = @getimagesize($archivo_tmp);

		if (!in_array ($ext, $ext_permitidas)) {
			$error_avatar = 'Solo se aceptan archivos de extension .jpg, .jpeg, .png o .gif.';
		}
		elseif ($peso_archivo > '2100000') {
			$error_avatar = 'El tamaño del archivo no debe exceder los 2Mb.';
		}

//aca tira warning
		elseif ($ancho < $alto) {
			$error_avatar = 'La imagen no puede ser más alta que ancha.';
		}
		else {
			$nombre = str_replace('@', '-', $_SESSION['login']['email']);
			$nombre = str_replace('.', '-', $nombre);

			move_uploaded_file($archivo_tmp, $ruta_avatar.$nombre.'.'.$ext);
		}
	}

		return $error_avatar;
}

//-----------------------------------------------------------------------------

function recuperarCambioAvatar() {

	if (($_FILES['avatar']['error'] == UPLOAD_ERR_OK)  && (guardarCambioAvatar() == '')) {
		$nombre = str_replace('@', '-', $_SESSION['login']['email']);
		$nombre = str_replace('.', '-', $nombre);
		$ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
		$ruta_imagen = "../users/".$nombre.'.'.$ext;
	} else {
		$ruta_imagen = '../users/default.png';
	}

	return $ruta_imagen;
}
