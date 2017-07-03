<?php
require("../php/soporte.php");
require_once("../php/clases/validadorUsuario.php");

$repoUsuarios = $repo->getRepositorioUsuarios();
$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if (!$auth->estaLogueado()) {
	header("Location:login.php");exit;
}

if (isset($_FILES['avatar'])) {
	$usuarioLogueado->setAvatar($_FILES['avatar']);
	header('Location: perfil.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Registro</title>
	<link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

	<!-- navegación -->
	<?php include('nav.php') ;?>

	<!-- inicia el CONTENEDOR para el Registro -->

	<div class='registro-container'>
		<div class='crear-cuenta'>
			<h1>Editar Imagen de Perfil</h1>
			<hr>

		</div>
		<form class='formulario' action='' method='post' enctype="multipart/form-data">

			<label for='avatar' class='text-label'>Imagen de perfil: </label> <br>
			<input class='decorative-input-imagen-boton' type='file' name='avatar'> <br>

			<p class='msj_error'><?php if (isset($errores["avatar"])) {
				echo $errores["avatar"];
			}?>
		</p>
		<br>

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

<?php
unset($_SESSION['errores']);
?>
