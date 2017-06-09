<?php

function emailNoExistente(){
	$error = '';

	$miArray = file_get_contents('../users/usuarios.json');
	$miArray = json_decode($miArray, true);
	$error = '* El e-mail no esta registrado.';

	foreach ($miArray as $key => $user) {
		if (in_array($_POST['email'], $user)){
			$error = '';
		}
	}

	return $error;
}

//---------------------------------------

function cambiarPassword($temporalPass){
	
	$pswHash = password_hash($temporalPass,PASSWORD_DEFAULT);

	$miJson = file_get_contents('../users/usuarios.json');
	$users = json_decode($miJson, true);

	$users = (is_array($users))?$users:[];
	$userData = [];
	foreach ($users as $id => $userArray) {
		if ( in_array($_POST['email'],$userArray) ){
			$userData = [
			'id' => $id,
			'nombre'=> $userArray['nombre'],
			'apellido'=> $userArray['apellido'],
			'localidad'=> $userArray['localidad'],
			'email'=> $userArray['email'],
			'password' => $userArray['passwordHash'],
			];

			$users[$id]['passwordHash'] = $pswHash;

			$users = json_encode($users);

			file_put_contents('../users/usuarios.json',$users);
			
		}
	}
}

//---------------------------------------