<?php
require_once("../php/soporte.php");
require_once("../php/clases/validadorUsuario.php");

// Aca llamo a una funcion de la clase repositorio,
// que como es abstracta, se llama a traves de su hijo: repositorioJSON o repositorioSQL (repo fue instanciada en soporte.php, fijarse ahi)
// Entonces, usando el __constructor de repositorioJSON o repositorioSQL, crea un nuevo repositorioUsuarios, que como tb es abstracta, en realidad lo que se instancia es su hijo, que es repositorioUsuariosJSON o repositorioUsuariosSQL
$repoUsuarios = $repo->getRepositorioUsuarios();
$repoUsuarios2 = $repo2->getRepositorioUsuarios();

if ($auth->estaLogueado()) {
header("Location:perfil.php");exit;
}

$errores = [];
$nombreDefault = "";
$apellidoDefault = "";
$localidadDefault = "";
$emailDefault = "";

if (!empty($_POST))
{
	$validador = new ValidadorUsuario();
//Se envió información
	$errores = $validador->validar($_POST, $repo);

// evaluo AJAX
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

        header('Content-Type: application/json');



        if ($errores){

                header('HTTP/1.0 422 Unprocessable entity.');
        } else {
            $errores = ['error'=>'none'];
            if (empty($_SERVER['HTTP_X_MAIL'])){
                // si envío formulario ENTERO y no tiene errores
                // guardo y logueo
                $usuario = new Usuario(
                    null,
                    $_POST["nombre"],
                    $_POST["apellido"],
                    $_POST["localidad"],
                    $_POST["email"],
                    $_POST["password"]
                    );
                $usuario->setPassword($_POST["password"]);
                $usuario->guardar($repoUsuarios);
                $usuario->guardar($repoUsuarios2);
                $usuario->setAvatar($_FILES["avatar"]);
                $auth->loguear($usuario);
            }

        }
        print json_encode($errores);


        exit;
    }


// ESTA ES LA PARTE DONDE SE LOGEA Y GUARDA..........
	if (empty($errores)) // Si no hay errores
	{

//Primero: Lo registro
		$usuario = new Usuario(
			null,
			$_POST["nombre"],
			$_POST["apellido"],
			$_POST["localidad"],
			$_POST["email"],
			$_POST["password"]
			);
		$usuario->setPassword($_POST["password"]);
		$usuario->guardar($repoUsuarios);
		$usuario->guardar($repoUsuarios2);
		$usuario->setAvatar($_FILES["avatar"]);
        $auth->loguear($usuario);

//Segundo: Lo envio al login
		header("Location:login.php");exit;
	}

	if (!isset($errores["nombre"]))
	{
		$nombreDefault = $_POST["nombre"];
	}
	if (!isset($errores["apellido"]))
	{
		$apellidoDefault = $_POST["apellido"];
	}
	if (!isset($errores["localidad"]))
	{
		$localidadDefault = $_POST["localidad"];
	}
	if (!isset($errores["email"]))
	{
		$emailDefault = $_POST["email"];
	}

}
?>