<?php
session_start();

include('../php/register.helpers.php');


$nombre = $_SESSION['login']['nombre']??'';
$apellido = $_SESSION['login']['apellido']??'';

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
			<h1>Editar Imagen de Perfil</h1>
			<hr>

		</div>
		<form class='formulario' action='../php/editarAvatar.controller.php' method='post' enctype="multipart/form-data">

			<label for='avatar' class='text-label'>Imagen de perfil: </label> <br>
			<input class='decorative-input-imagen-boton' type='file' name='avatar'> <br>

			<?php if (isset($_SESSION['errorAvatar'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errorAvatar']; ?> </p>
			<?php endif; ?><br>
			<br>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>

		</form>
	</div>

	<div class='registro-container' style="margin-top: -50px;">
		<div class='formulario'>
			<button class='volver'> <a href="perfil.php">VOLVER</a> </button>
		</div>
	</div>
	
	<?php include 'footer.html' ?>

</body>
</html>

<?php
unset($_SESSION['errores']);
?>
