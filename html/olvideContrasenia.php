<?php
session_start();

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
			<h1>Olvide Contraseña - Solicitar nueva contraseña al correo</h1>
			<hr>
		</div>

		<form class='formulario' action='../php/olvideContrasenia.controller.php' method='post'>

			<input class='decorative-input-mail' type='text' placeholder='Correo electronico' name='email' value=''> <br>

			<?php if (isset($_SESSION['error_emailNoExistente'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['error_emailNoExistente']; ?> </p>
			<?php endif; ?>

			<br>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>

		</div>
	</form>
</div>

<div class='registro-container' style="margin-top: -50px;">
	<div class='formulario'>
		<button class='volver'> <a href="perfil.php">VOLVER</a> </button>
	</div>
</div>

<?php include('footer.html'); ?>


</body>
</html>

<?php
unset($_SESSION['error_email']);
?>
