<?php
session_start();

include('../php/login.check.php');
include('../php/register.helpers.php');

$nombre = $_SESSION['nombre']??'';
$apellido = $_SESSION['apellido']??'';
$fecha_nac = $_SESSION['fecha_nac']??'';
$email = $_SESSION['email']??'';
$usuario = $_SESSION['usuario']??'';

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
			<h1>CREAR CUENTA</h1>
			<hr>
			<?php if (isset($_SESSION['emailExistente'])): ?>
				<script language="JavaScript" type="text/javascript">
					alert("El email ya esta registrado, Intenta con otro");
				</script>

			<?php endif; ?>
		</div>
		<form class='formulario' action='../php/register.controller.php' method='post' enctype="multipart/form-data">

			<input class='decorative-input' type='text' placeholder='Nombre' name='nombre' value='<?php echo $nombre;?>'> <br>

			<?php if (isset($_SESSION['errores']['nombre'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['nombre']; ?> </p>
			<?php endif; ?><br>

			<input class='decorative-input' type='text' placeholder='Apellido' name='apellido' value='<?php echo $apellido;?>'> <br>

			<?php if (isset($_SESSION['errores']['apellido'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['apellido']; ?> </p>
			<?php endif; ?><br>

			<!-- empieza fecha de nacimiento
			<label for="dia" class='text-label'>Fecha de nacimiento:</label> 
			<select class='decorative-input-fecha' name="dia">
				<option value="">Dia</option>
				<?php for ($i=1; $i < 32; $i++) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>

			<select class='decorative-input-fecha' name="mes">
				<option value="">Mes</option>
				<?php for ($i=1; $i < 13; $i++) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>

			<select class='decorative-input-fecha' name="anio">
				<option value="">Año</option>
				<?php for ($i = date("Y"); $i >= 1900; $i--) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select> <br><br>

			<?php if (isset($_SESSION['errores']['fecha_nac'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['fecha_nac']; ?> </p>
			<?php endif; ?><br>
			termina fecha de nacimiento -->
			
			<input class='decorative-input-mail' type='text' placeholder='Correo electronico' name='email' value='<?php echo $email;?>'> <br>

			<?php if (isset($_SESSION['errores']['email'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['email']; ?> </p>
			<?php endif; ?>

			<?php if (isset($_SESSION['emailExistente'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['emailExistente']; ?> </p>
			<?php endif; ?><br>

			<input class='decorative-input-password' type='password' placeholder='Contraseña' name='password'> <br>

			<?php if (isset($_SESSION['errores']['password'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['password']; ?> </p>
			<?php endif; ?><br>

			<input class='decorative-input-password' type='password' placeholder='Confirmar contraseña' name='password2'> <br>

			<?php if (isset($_SESSION['errores']['password2'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errores']['password2']; ?> </p>
			<?php endif; ?><br>
			
			<label for='avatar' class='text-label'>Foto de perfil: </label> <br>
			<input class='decorative-input-imagen-boton' type='file' name='avatar'> <br>

			<?php if (isset($_SESSION['errorAvatar']['error'])): ?>
				<p class='msj_error'> <?php echo $_SESSION['errorAvatar']['error']; ?> </p>
			<?php endif; ?><br>

			<div class='checkbox'>
				<input checked='checked' name='mail-promociones' type='checkbox' value='1'>
			</div>
			
			<label for='mail-promociones' class='me-gustaria'>  Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
			</label>
			<br>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>REGISTRATE</strong></button>
			<br>

			<div class='aclaracion'>
				<p>Al registrarme, acepto las Condiciones del servicio, la Política de Privacidad y de Cookies.</p>
				<br>
			</div>

		</form>
	</div>

	<?php include 'footer.html'; ?>
</body>
</html>

<?php
session_unset();
?>
