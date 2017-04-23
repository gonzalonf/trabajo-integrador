<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Soy mi Planner</title>
	<link rel="stylesheet" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
<!-- navegación -->
	<?php include('nav.html') ;?>


	<section class="type_portada">
		<div class="video-container">
			<video muted autoplay loop>
				<source src="../videos/vid2.mp4" type="video/mp4">
			</video>
		</div>

		<div class="contenedor-responsive ">
			<h2 class="contenedor-responsive-altura">¡Todo lo que necesitás para planificar TU EVENTO!</h2>

			<div class="mainButton">

				<div class="opciones_principales1">
					<a href="#">ARMÁ TU EVENTO DESDE CERO</a>
				</div>
				<div class="opciones_principales2">
					<a href="#">EXPLORÁ NUESTRAS PROPUESTAS</a>
				</div>
			</div>

			<form class="buscador">
				<label  for="search"> Buscá: <br> </label>
				<input type="search" name="search"  id="search" placeholder="Salones, Catering, Dj, Fotografía, Ambientación, ..." >
				<input type="button" value="">
			</form>
		</div>
	</section>

	<!-- quienes somos -------------------------------------------------->
	<section id=type1 class="type1">
		<div class="contenedor-responsive text-responsive">
			<h2 >¿QUIÉNES SOMOS?</h2>
			<br>
			<p>Somos un grupo de programadores decididos a crear herramientas que hagan más fácil la vida cotidiana. Nos apasionan la tecnología y el diseño. Nuestro objetivo es crear sistemas intuitivos que brinden soluciones integrales y dinámicas, de manera rápida.</p>
			<br>
		</div>
	</section>
	<!-- como funciona_ ------------------------------------------------>
	<section id="type2" class="type2">
		<div class="contenedor-responsive text-responsive">
			<h2 >¿QUÉ ES SOY MI PLANNER?</h2>
			<br>
			<p><strong>Soy mi Planner</strong> es un sitio pensado para ayudarte a organizar cualquier tipo de evento. No importa si estás en el punto de partida o ya arrancaste a planificar: <strong>Soy mi Planner</strong> reúne todos los recursos que buscás, en un mismo lugar. ¿Querés que tu evento sea especial? ¿Necesitás una solución práctica y rápida? ¡Elegí la opción que mas se adapte a tus necesidades!</p>
			<br>

			<ul>
				<li class="como-funciona">
					<div class="como-funciona-imagen">
						<img src="../images/1.png" alt="paso1" width="120px">
					</div>
					<p class="como-funciona-texto">Armá tu evento desde cero: navegá nuestra agenda de profesionales y servicios ordenados por categoría. Consulta referencias de otros  usuarios. Chequeá disponibilidad, precios y obtené un presupuesto en tiempo real.</p>
				</li>

				<li class="como-funciona">
					<div class="como-funciona-imagen">
						<img src="../images/2.png" alt="paso2" width="120px">
					</div>
					<p class="como-funciona-texto">Explorá nuestras propuestas y conocé nuestras soluciones express: eventos temáticos con todo resuelto, organización de eventos especiales en manos de un planner profesional de nuestra agenda ¡y mucho más!</p>
				</li>
				
				<li class="como-funciona">
					<div class="como-funciona-imagen">
						<img src="../images/3.png" alt="paso3" width="120px">
					</div>
					<p class="como-funciona-texto">Buscá lo que te falta: quizás tenías todo listo y, a último momento, te canceló alguno de los profesionales o servicios que habías contratado. Buscá en nuestra agenda, encontrá exactamente aquello que necesitás ¡y problema resuelto!</p>
				</li>
			</ul>
		</div>
	</section>

	<!-- footer -->
	<?php include('footer.html') ;?>

	<!--LOGIN ----------------->
	<?php include('login.html'); ?>


	<!--...desde acá... JAVASCRIPT! -------------------------------->
	<script>
		var modal = document.getElementById('login-id');
				// cerrar cuando clickea arafue
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			</script>

		</body>
		</html>
