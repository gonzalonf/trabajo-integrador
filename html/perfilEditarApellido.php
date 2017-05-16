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
			<h1>Editar Apellido</h1>
			<hr>

		</div>
		<form class='formulario' action='../php/editarApellido.controller.php' method='post'>

			<input class='decorative-input' type='text' placeholder='Apellido' name='apellido' value='<?php echo $apellido;?>'> <br>

			<?php if (isset($_SESSION['errores']['apellido'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['apellido']; ?> </p>
			<?php endif; ?>
			<br>

			<input class="input-oculto" type='text' placeholder='Nombre' name='nombre' value='<?php echo $nombre;?>'> <br>
			
			<?php if (isset($_SESSION['errores']['nombre'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['nombre']; ?> </p>
			<?php endif; ?><br>

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
