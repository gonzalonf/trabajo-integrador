<?php
session_start();

include('../php/register.helpers.php');


$nombre = $_SESSION['login']['nombre']??'';
$apellido = $_SESSION['login']['apellido']??'';
$fecha_nac = $_SESSION['login']['fecha_nac']??'';
$email = $_SESSION['login']['email']??'';
$usuario = $_SESSION['login']['usuario']??'';

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
			<h1>Editar Perfil</h1>
			<hr>
			<?php if (isset($_SESSION['emailExistente'])): ?>
				<script language="JavaScript" type="text/javascript">
				alert("El email ya esta registrado, Intenta con otro");
				</script>

			<?php endif; ?>
		</div>
		<form class='formulario' action='../php/editar.controller.php' method='post'>

			<input class='decorative-input' type='text' placeholder='Nombre' name='nombre' value='<?php echo $nombre;?>'> <br>
			<?php if (isset($_SESSION['errores']['nombre'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['nombre']; ?> </p>
			<?php endif; ?><br>



			<input class='decorative-input' type='text' placeholder='Apellido' name='apellido' value='<?php echo $apellido;?>'> <br>

			<?php if (isset($_SESSION['errores']['apellido'])): ?>
					<p class='msj_error'> <?php echo $_SESSION['errores']['apellido']; ?> </p>
				<?php endif; ?><br>




			<input class='decorative-input-mail' type='text' placeholder='Correo electronico' name='email' value='<?php echo $email;?>'> <br>

			<?php if (isset($_SESSION['errores'])): ?>
					<p class='msj_error'> <?php echo $_SESSION['errores']['email']??''; ?> </p>
				<?php endif; ?><br>





			<input class='decorative-input-password' type='password' placeholder='Contraseña' name='password'> <br>


			<input class='decorative-input-password' type='password' placeholder='Confirmar contraseña' name='password2'> <br>


			<?php if (isset($_SESSION['errores']['password2'])): ?>
					<p class='msj_error'> <?php echo $_SESSION['errores']['password2']??''; ?> </p>
				<?php endif; ?><br>



			<div class='checkbox'>
				<input  name='mail-promociones' type='checkbox' value='1'>
			</div>
			<label for='mail-promociones' class='me-gustaria'>  Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
			</label>
			<br>
			<br>
			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>
			<br>
			<div class='aclaracion'>
				<p>Al registrarme, acepto las Condiciones del servicio, la Política de Privacidad y de Cookies.</p>
				<br>
			</div>
		</form>
	</div>


	</body>
	</html>

<?php
 // session_unset();
?>
