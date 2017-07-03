<?php require("../php/registroController.php"); ?>

<script src="../js/register.js" charset="utf-8"></script>

<!DOCTYPE html>
    <html>
    <head>
    	<meta charset='utf-8'>
    	<title>Registro</title>
    	<link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
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

    		</div>

    		<form class='formulario' action='' method='post' enctype="multipart/form-data">

    			<input class='decorative-input' type='text' placeholder='Nombre' name='nombre' value='<?=$nombreDefault?>'> <br>

    			<p class='msj_error'><?php if (isset($errores["nombre"])) {
    				echo $errores["nombre"];
    			}
    			?></p>

    			<input class='decorative-input' type='text' placeholder='Apellido' name='apellido' value='<?=$apellidoDefault?>'> <br>

    			<p class='msj_error'><?php if (isset($errores["apellido"])) {
    				echo $errores["apellido"];
    			}
    			?></p>

    			<input class='decorative-input' type='text' placeholder='Localidad' name='localidad' value='<?=$localidadDefault?>'> <br>

    			<p class='msj_error'><?php if (isset($errores["localidad"])) {
    				echo $errores["localidad"];
    			}
    			?></p>

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

			<input class='decorative-input-mail' type='text' placeholder='Correo electronico' name='email' value='<?=$emailDefault?>'> <br>

			<p class='msj_error'><?php if (isset($errores["email"])) {
				echo $errores["email"];
			}
			?></p>

			<input class='decorative-input-password' type='password' placeholder='Contraseña' name='password'> <br>

			<p class='msj_error'><?php if (isset($errores["password"])) {
				echo $errores["password"];
			}
			?></p>

			<input class='decorative-input-password' type='password' placeholder='Confirmar contraseña' name='password2'> <br>

			<p class='msj_error'><?php if (isset($errores["password2"])) {
				echo $errores["password2"];
			}
			?></p>

			<label for='avatar' class='text-label'>Imagen de perfil: </label> <br>
			<input class='decorative-input-imagen-boton' type='file' name='avatar'> <br>

			<p class='msj_error'><?php if (isset($errores["avatar"])) {
				echo $errores["avatar"];
			}
			?></p>

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