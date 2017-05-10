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

					<?php if (!isset($_SESSION['login'])): ?>
						<li class="ingresa"><a href="login.php">INGRESA</a></li>
						<li class="registrate"><a href="registro.php">REGISTRATE</a></li>
					<?php endif; ?>

					<?php if (isset($_SESSION['login'])): ?>
						<li  class="dropdown">
							<!-- <img src="../images/dropdown.png" alt=""> --> <?php  echo $_SESSION['login']['nombre'] ?>
							<div class="dropdown-menu">
								<ul>
									<li><a href="perfil.php">PERFIL</a></li>
									<li><a href="../php/logout.php">LOGOUT</a></li>
								</ul>
							</div>
						</li>
					<?php endif; ?>


				</ul>
			</nav>
		</div>
	</div>
</header>
