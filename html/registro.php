<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!-- navegación -->
	<?php include('nav.html') ;?>


	<!-- inicia el CONTENEDOR para el Registro -->

	<div class="registro-container">
			<div class="crear-cuenta">
				<h1>CREAR CUENTA</h1>
				<hr>
			</div>
			<form class="formulario" action="script.php" method="post">
				<input type="mail" name="mail" placeholder="Correo electrónico" class="decorative-input-mail" required id=mail>
				<br><br>
				<input type="text" name="nombre"  id=name placeholder="Nombre" class="decorative-input" required>
				<br> <br>
				<input type="text" name="last" id=last placeholder="Apellido" class="decorative-input" required>
				<br> <br>
				<input type="password" name="password" id=password placeholder="Contraseña" class="decorative-input-password" required >
				<br><br>
				<input type="password" name="password-confirmation" id=password-confirmation placeholder="Confirmar contraseña" class="decorative-input-password" require >
				<br><br>
				<div class="checkbox">
					<input checked="checked" id="mail-promociones" name="mail-promociones" type="checkbox" value="1">
				</div>
				<label for="mail-promociones" class="me-gustaria">  Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
				</label>
				<br>
				<br>
				<button type="submit" class="enviar" name="submit"><strong>REGISTRATE</strong></button>
				<br>
				<br>
				<div class="aclaracion">
					<p>Al registrarme, acepto las Condiciones del servicio, la Política de Privacidad y de Cookies.</p>
					<br>
				</div>
			</form>
</div>

<!-- login -->
	<?php include('login.html'); ?>

	<!--..JAVASCRIPT! -------------->
	<script>
		var modal = document.getElementById('login-id');
			// cerrar cuando clickea arafue
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>

		<?php include 'footer.html'; ?>

</body>
</html>
