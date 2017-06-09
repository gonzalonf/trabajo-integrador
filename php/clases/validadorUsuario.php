<?php
require_once("validador.php");
require_once("repositorio.php");

class ValidadorUsuario extends Validador {
	public function validar(Array $datos, Repositorio $repo) {

		$repoUsuarios = $repo->getRepositorioUsuarios();

		$errores = [];

		$nombre = trim($datos['nombre']);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
		if ($nombre == '') {
			$errores['nombre'] = '* Completar el nombre.';
		} elseif ( (!ctype_alpha(str_replace(' ', '', (str_replace('´', '', $nombre)) ))) ) {
			$errores['nombre'] = '* El nombre sólo puede tener caracteres alfabéticos, espacios y apóstrofes(´).';
		} elseif (strlen($nombre) >= 15) {
			$errores['nombre'] = '* El nombre no puede tener mas de 15 caracteres.';
		}

		$apellido = trim($datos['apellido']);
		$apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
		if ($apellido == '') {
			$errores['apellido'] = '* Completar el apellido.';
		} elseif ( (!ctype_alpha(str_replace(' ', '', (str_replace('´', '', $apellido)) ))) ) {
			$errores['apellido'] = '* El apellido sólo puede tener caracteres alfabéticos, espacios y apóstrofes(´).';
		} elseif (strlen($apellido) >= 15) {
			$errores['apellido'] = '* El apellido no puede tener mas de 15 caracteres.';
		}

		$localidad = trim($datos['localidad']);
		$localidad = filter_var($localidad, FILTER_SANITIZE_STRING);
		if ($localidad == '') {
			$errores['localidad'] = '* Completar la localidad.';
		} elseif ( (!ctype_alpha(str_replace(' ', '', (str_replace('´', '', $localidad)) ))) ) {
			$errores['localidad'] = '* La localidad sólo puede tener caracteres alfabéticos, espacios y apóstrofes(´).';
		} elseif (strlen($localidad) >= 15) {
			$errores['localidad'] = '* La localidad no puede tener mas de 15 caracteres.';
		}

		if (empty(trim($datos["email"])))
		{
			$errores["email"] = "Por favor ingrese mail";
		}
		elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
			$errores["email"] = "Por favor ingrese un mail correcto";   
		}
		elseif ($repoUsuarios->existeElMail($datos["email"]))
		{
			$errores["email"] = "El email ya esta registrado";      
		}

		$password = $datos['password'];
		if ($password == ''){
			$errores['password'] = '* Completar la contraseña.';
		} elseif (strlen($password) < 6) {
			$errores['email'] = '* El password debe tener al menos 6 caracteres.';
		}

		$password2 = $datos['password2'];
		if ($password2 == ''){
			$errores['password2'] = '* Confirmar la contraseña.';
		}

		if ($password != $password2){
			$errores['password2']  = '* Las contraseñas no coinciden.';
		}
		
		if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
			$errores["avatar"] = "Hubo un error al subir la imagen, intentelo de nuevo más tarde.";
		}

		return $errores;
	}
}