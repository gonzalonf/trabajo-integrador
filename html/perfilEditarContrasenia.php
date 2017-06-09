<?php
require("../php/soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

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
			<h1>Cambiar contraseña</h1>
			<hr>

		</div>
		<form class='formulario' action='' method='post'>


			<input class='decorative-input-password' type='password' placeholder='Nueva contraseña' name='psw' value=''>
			<br>

			<input class='decorative-input-password' type='password' placeholder='Confirme contraseña' name='psw2' value=''>
			<br>

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

<?php
unset($_SESSION['error_psw']);
?>
