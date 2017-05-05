<header>
	<div class="barra_superior">
		<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>
		<div class="logo-marca">
			<a href="index.php#">
				<img src="../images/logo.png" alt="logotipo" class="logo">
			</a>
		</div>
		<div class="desplegable">
			<nav>
				<ul class="botonera">
					<li><a href="index.php">INICIO</a></li>
					<li><a href="index.php#type1">NOSOTROS</a></li>
					<li class="preguntas"><a href="FAQ.php">PREGUNTAS</a></li>

					<!--si NO está logeado(!isset($_SESSION['login'])): -->
					<li class="ingresa"><a href="#" onclick="document.getElementById('login-id').style.display='block'">INGRESA</a></li>
					<li class="registrate"><a href="registro.php">REGISTRATE</a></li>
					<!-- si está logeado: -->
					<!--    nombre usuario con dropdown menu -->
					<!-- -logout -->
					<!-- perfil -->

				</ul>
			</nav>
		</div>
	</div>
</header>
