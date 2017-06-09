<?php
require("../php/soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if ($usuarioLogueado) {
	$emailDefault = $usuarioLogueado->getEmail();
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
			<h1>Cambiar email</h1>
			<hr>
			
		</div>
		<form class='formulario' action='' method='post'>

			<input class='decorative-input-mail' type='text' placeholder='Nuevo email' name='email' value='<?=$emailDefault?>'>
			<br>

			<input class='decorative-input-mail' type='text' placeholder='Confirme email' name='email2' value='<?=$emailDefault?>'>
			<br>

			<div class='checkbox'>
				<input  id="mail-promociones" name='mail-promociones' type='checkbox' value='1' checked>
			</div>

			<label for='mail-promociones' class='me-gustaria'>
				Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
			</label>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>

		</div>
	</form>
</div>

<div class='registro-container' style="margin-top: -50px;">
	<div class='formulario'>
		<a class='volver' href="perfil.php">VOLVER</a>
	</div>
</div>

<?php include('footer.html'); ?>


</body>
</html>