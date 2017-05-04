<?php 

function validacionRegistro() {

	$errores = [];

	$nombre = trim($_POST['nombre']);
	if ($nombre == '') {
		$errores['nombre'] = 'Completar el nombre.';
	} else{
		$_SESSION['nombre'] = $nombre;
	}

	$apellido = trim($_POST['apellido']);
	if ($apellido == '') {
		$errores['apellido'] = 'Completar el apellido.';
	} else{
		$_SESSION['apellido'] = $apellido;
	}

	$fecha_nac = trim($_POST['fecha_nac']);
	if (!is_numeric($fecha_nac)) {
		$errores['fecha_nac'] = 'La fecha de nacimiento debe ser un numero';
	} else{
		$_SESSION['fecha_nac'] = $fecha_nac;
	}

	$email =trim($_POST['email']);
	if (($email == '') || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
		$errores['email'] = 'El e-mail no es valido.'; 
	} else{
		$_SESSION['email'] = $email;
	}

	$usuario = trim($_POST['usuario']);
	if ($usuario == '') {
		$errores['usuario'] = 'Completar el usuario.';
	} else{
		$_SESSION['usuario'] = $usuario;
	}

	$password = $_POST['password'];
	if ($password == ''){
		$errores['password'] = 'Completar la contraseña.'; 
	}

	$password2 = $_POST['password2'];
	if ($password2 == ''){
		$errores['password2'] = 'Confirmar la contraseña.'; 
	} 

	if ($password != $password2){
		$errores['password2']  = 'Las contraseñas no coinciden.'; 
	}
	
	return $errores;
}

//--------------------------------------------------------------------------------

function guardarUsuario() { 

	/* fdghdfjkgh */
}

//--------------------------------------------------------------------------------

function recuperarUsuario() { 

	/* fdghdfjkgh */
}

//--------------------------------------------------------------------------------

function guardarImagen() { 

	/* fdghdfjkgh */
}

//--------------------------------------------------------------------------------

function recuperarImagen() { 

	/* fdghdfjkgh */
}

