<?php
require("../php/soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if ($usuarioLogueado) {

	$imagenPerfil = $usuarioLogueado->getAvatar();
}

?>

<header>
	<div class="barra_superior">
		<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>

		<label class="switch">
			<input type="checkbox" id="miCheckbox" onclick="cambiarEstilo(setearCookie());"/>
			<div class="slider round"></div>
		</label>

		<script type="text/javascript">

			window.onload = cambiarEstilo(document.cookie.replace(/(?:(?:^|.*;\s*)checkStatus\s*\=\s*([^;]*).*$)|^.*$/, "$1"))

			function setearCookie(){
				var estado = document.querySelector("#miCheckbox").checked;
				document.cookie = 'checkStatus=' + estado; // aca estoy creando la cookie
				var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)checkStatus\s*\=\s*([^;]*).*$)|^.*$/, "$1"); // aca etoy asignando la cookie a una variable
				return cookieValue
			}
			
			function cambiarEstilo(miCookie) {
				if (miCookie == 'true') {
					document.querySelector('link#pagestyle').setAttribute('href', '../css/style2.css');
					document.querySelector("#miCheckbox").checked = true;
				} else {
					document.querySelector('link#pagestyle').setAttribute('href', '../css/style.css');
				}
			}

		</script>

		<div class="logo-marca">
			<a href="index.php#">
				<img src="../images/logo2.png" alt="logotipo" class="logo">
			</a>
		</div>

		<div class="desplegable">
			<nav>
				<ul class="botonera">
					<li><a href="index.php">INICIO</a></li>
					<li><a href="index.php#type1">NOSOTROS</a></li>
					<li class="preguntas"><a href="FAQ.php">PREGUNTAS</a></li>

					<?php if ($auth->estaLogueado()) { ?>
					<li  class="dropdown">
						<!-- <img src="../images/dropdown.png" alt=""> -->
						<?=$usuarioLogueado->getNombre() ?>
						<div class="dropdown-menu">
							<ul>
								<li><a href="perfil.php">PERFIL</a></li>
								<li><a href="../php/logout.php">LOGOUT</a></li>
							</ul>
						</div>
					</li>

					<script src="../js/navPopup.js" charset="utf-8"></script>

					<?php } else { ?>
					<li class="ingresa"><a href="login.php">INGRESA</a></li>
					<li class="registrate"><a href="registro.php">REGISTRATE</a></li>
					<?php } ?>

				</ul>
			</nav>
		</div>
	</div>
</header>
