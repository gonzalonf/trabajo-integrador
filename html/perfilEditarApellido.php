<?php
require("../php/soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if ($usuarioLogueado) {
	$apellidoDefault = $usuarioLogueado->getApellido();
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
			<h1>Editar Apellido</h1>
			<hr>

		</div>
		<form class='formulario' action='' method='post'>

			<input class='decorative-input' type='text' placeholder='Apellido' name='apellido' value='<?=$apellidoDefault?>'> <br>

			<p class='msj_error'><?php if (isset($errores["apellido"])) { 
				echo $errores["apellido"];
			} else {
				//$usuarioLogueado->setApellido($_POST["apellido"]);
				//$usuarioLogueado->guardar($repoUsuarios);
			}
			?></p>
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
