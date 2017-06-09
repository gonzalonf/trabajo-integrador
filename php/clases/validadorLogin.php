<?php
	require_once("validador.php");
	require_once("repositorio.php");
	
	class ValidadorLogin extends Validador {
		public function Validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

	        if (empty(trim($datos["email"])))
	        {
	            $errores["email"] = "* Completar el e-mail.";
	        }
	        if (empty(trim($datos["password"])))
	        {
	            $errores["password"] = "* Completar la contraseña.";
	        }
	        if (!$repoUsuarios->existeElMail($datos["email"]))
	        {
	            $errores["email"] = "* El e-mail o la contraseña es incorrecta.";
	        }
	        else {
	            $usuario = $repoUsuarios->traerUsuarioPorEmail($datos["email"]);

	            if (!password_verify($datos["password"], $usuario->getPassword())) {
	                $errores["password"] ="* El e-mail o la contraseña es incorrecta.";
	            }
	        }

	        return $errores;
		}
}