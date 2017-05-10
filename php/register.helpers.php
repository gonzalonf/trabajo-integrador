<?php

// DATOS A GUARDAR...
// -nombre
// -apellido
// -email
// -hash
// -NOMBRE del avatar SI ESTA (email-id.EXTENSION)

function validacionRegistro() {

	$errores = [];

	$nombre = trim($_POST['nombre']);
	$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	if ($nombre == '') {
		$errores['nombre'] = '* Completar el nombre.';
    } elseif (!ctype_alpha($nombre)) {
        $errores['nombre'] = '* El nombre sólo puede tener caracteres alfabéticos.';
    } elseif (strlen($nombre) >= 15) {
       $errores['nombre'] = '* El nombre no puede tener mas de 15 caracteres.';
    } else {
		$_SESSION['nombre'] = $nombre;
	}

	$apellido = trim($_POST['apellido']);
	$apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
	if ($apellido == '') {
		$errores['apellido'] = '* Completar el apellido.';
    } elseif (!ctype_alpha($apellido)) {
        $errores['apellido'] = '* El apellido sólo puede tener caracteres alfabéticos.';
    } elseif (strlen($apellido) >= 15) {
       $errores['apellido'] = '* El apellido no puede tener mas de 15 caracteres.';
    } else {
		$_SESSION['apellido'] = $apellido;
	}

	$fecha_nac = $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['anio'];
	if (($_POST['anio'] == '') || ((date("Y") - ($_POST['anio']) < 18))) {
		$errores['fecha_nac'] = '* Para registrarse debe ser mayor de edad (fecha ingresada: '.$_POST['dia'].'  '.$_POST['mes'].'  '.$_POST['anio'].')';
	} else{
		$_SESSION['fecha_nac'] = $fecha_nac;
	}

	$email =trim($_POST['email']);
	if (($email == '') || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
		$errores['email'] = '* El e-mail no es valido.';
	} else{
		$_SESSION['email'] = $email;
	}

	$password = $_POST['password'];
	if ($password == ''){
		$errores['password'] = '* Completar la contraseña.';
	}

	$password2 = $_POST['password2'];
	if ($password2 == ''){
		$errores['password2'] = '* Confirmar la contraseña.';
	}

	if ($password != $password2){
		$errores['password2']  = '* Las contraseñas no coinciden.';
	}

	return $errores;
}

//--------------------------------------------------------------------------------

function guardarUsuario(){
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	$users=file_get_contents('../users/users.json');
	$users=json_decode($users,true);
	$i=1;
	$i=count($users)+1;
	$users[$i]=[
				'nombre'=>$_POST['nombre'],
				'apellido'=>$_POST['apellido'],
				'email'=>$_POST['email'],
				'passwordHash'=>$password,
				'avatar'=>  $avatar ?? 'default.png',
			];

	file_put_contents('../users/users.json', json_encode($users));

}
 function emailExistente(){
	 $error=[];
	 $miArray=file_get_contents('../users/users.json');
	 $miArray=json_decode($miArray, true);
	 foreach ($miArray as $key => $user) {
	 	if (in_array($_POST['email'], $user, true )) {
	 		$error='*el email ya esta registrado';
	 	}
	 }
	 return $error;

 }

// ------------todo esto es para hacer el json linea por linea------------------------
// function guardarUsuario2() {

	/* la hace MIJA */
	// en  users/users.Json

	// estructura de db:
	// [1 => ['nombre'=> nombre,'apellido'=> apellido2, 'hash'=>hash1, 'nombre_avatar'],[2 => ['nombre'=> nombre2,'apellido'=> etc...]
	//
	// email
	// -hash
	// -NOMBRE del avatar SI ESTA (email-id.EXTENSION)
	//asi se guardaria linea por linea y no seria formato json
// 		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
// 		$new_user=[
// 					'nombre'=>$_POST['nombre'],
// 					'apellido'=>$_POST['apellido'],
// 					'email'=>$_POST['email'],
// 					'passwordHash'=>$password,
// 					'avatar'=>  $avatar ?? 'default.jpg',
// 				];
//
// 		$users=json_encode($new_user);
// 		file_put_contents('../users/users.json', $users . PHP_EOL, FILE_APPEND | LOCK_EX );
//
//
// }


// function users2(){
// 	//devuelve todos los usuarios, cuando esta linea por linea
// 	$recurso = fopen('../users/users.json', 'r');
// 	while ( ($linea = fgets($recurso)) !==false) {
// 		$usuario=json_decode($linea, true);
//
// 	}
// }
// function usuarioExistente(){
// 	// funcion no anda
// 	$error=[];
// 	$email=$_POST=['email'];
// 	$usuario=users();
// 		if ( in_array($email, $usuario) ) {
// 			$error[]='* el email ya está registrado';
// 		}
// 	return $error;
// }
//

//--------------------------------------------------------------------------------

function recuperarUsuario($nombre,$rutaArchivo){
    $json = file_get_contents($rutaArchivo);
    $users = json_decode($json, true);
    $userData = [];
    foreach ($users as $id => $userArray) {
        if ( in_array($nombre,$userArray) ){
            $userData = [
            'id' => $id,
            'usuario'=> $userArray['usuario'],
            'nombre'=> $userArray['nombre'],
            'apellido'=> $userArray['apelido'],
            'email'=> $userArray['email'],
            'fecha_nac'=> $userArray['fecha_nac'],
            'password' => $userArray['password'],
            'avatar' => ($userArray['avatar'])??''
            ];
        }
    }
    return $userData;
}


//--------------------------------------------------------------------------------

function guardarImagen() {

	/* EN PROCESO */
}

//--------------------------------------------------------------------------------

function recuperarImagen() {

	/* EN PROCESO */
}
