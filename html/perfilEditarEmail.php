<?php
session_start();

include('../php/perfilEditar.helpers.php');

$error = $_SESSION['error_email']??'';

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
						<h2><?php echo $_SESSION['login']['email']; ?></h2>

					</div>
					<form class='formulario' action='../php/editarEmail.controller.php' method='post'>


						<p class='msj_error'> <?php echo $error ?> </p>


					<input class='decorative-input-mail' type='text' placeholder='Nuevo email' name='email' value=''> <br>

					<input class='decorative-input-mail' type='text' placeholder='Confirme email' name='email2' value=''> <br>


					<div class='checkbox'>
						<input  id="mail-promociones" name='mail-promociones' type='checkbox' value='1' checked>
					</div>
					<label for='mail-promociones' class='me-gustaria'>
						 Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
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

			<a style="background-color:pink; text-align:center ; text-decoration:none; color:black" href="perfil.php">VOLVER</a>

			<?php include('footer.html'); ?>


	</body>
</html>

<?php
 unset($_SESSION['error_email']);
?>
