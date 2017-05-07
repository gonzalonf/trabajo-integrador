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
				'avatar'=>  $avatar ?? 'default.jpg',
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

	/* LO HACE CARO */
}

//--------------------------------------------------------------------------------

function recuperarImagen() {

	/* lo hace CARO */
}
