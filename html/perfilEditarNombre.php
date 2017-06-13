<?php
require("../php/soporte.php");
require_once("../php/clases/validadorUsuario.php");

$repoUsuarios = $repo->getRepositorioUsuarios();
$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if (!$auth->estaLogueado()) {
header("Location:login.php");exit;
}

$validador = new ValidadorUsuario();


$repoUsuarios = $repo->getRepositorioUsuarios();
$repoUsuarios2 = $repo2->getRepositorioUsuarios();

$campo = 'nombre';
$valorDefault = $usuarioLogueado->getNombre();

if ($validador->estaEnFormulario($campo)) {
	$errores = $validador->validar($_POST, $repo);
}
$errores = $errores[$campo] ?? '';

if(!empty($_POST)){

    if ($errores=='' && $_POST[$campo]!=='' && $_POST[$campo]!==$valorDefault){
        $current = $_POST[$campo];
        $usuarioLogueado->setNombre($current);
        $usuarioLogueado->modificar($repoUsuarios);
        $usuarioLogueado->modificar($repoUsuarios2);
        $valorDefault =$current;

        header('Location: perfil.php');

    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Registro</title>
	<link rel='stylesheet' href='../css/style.css'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

	<!-- navegación -->
	<?php include('nav.php') ;?>

	<!-- inicia el CONTENEDOR para el Registro -->

	<div class='registro-container'>
		<div class='crear-cuenta'>
			<h1>Editar Nombre</h1>
			<hr>

		</div>
		<form class='formulario' action='' method='post'>

			<input class='decorative-input' type='text' placeholder='Nombre' name='nombre' value='<?=$valorDefault?>'> <br>

			<p class='msj_error'><?=$errores?></p><br>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>

		</form>
	</div>

	<div class='registro-container' style="margin-top: -50px;">
		<div class='formulario'>
			<a class='volver' href="perfil.php">VOLVER</a>
		</div>
	</div>

	<?php include 'footer.html' ?>

</body>
</html>
