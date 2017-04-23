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

		<div class="contenedor-responsive " class="contenedor-responsive-altura">
			<h2>¡Todo lo que necesitás para planificar TU EVENTO!</h2>

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

					<!-- estructura vieja
					<li class="imagen1">
						<p>Armá tu evento desde cero: navegá nuestra agenda de profesionales y servicios ordenados por categoría. Consulta referencias de otros  usuarios. Chequeá disponibilidad, precios y obtené un presupuesto en tiempo real.</p>
						<br>
					</li>
				-->
			</ul>

		</div>
	</section>


		<footer>
			<div class="footerContainer">
				<ul>
					<li><a href="#">Prensa</a></li>
					<li><a href="FAQ.php">FAQs</a></li>
					<li><a href="#">Trabajá con nosotros</a></li>
					<li><a href="mailto:soymiplanner@soymiplanner.com?subject=feedback">Contacto</a></li>
				</ul>
				<div class="lugar">
					<img class="map" src="../images/mapMarker.png" alt="map" width="30px"
							style="
						    display: block;
						    margin: auto;
						">

					<a href="https://www.google.com.ar/maps/place/Monroe+860,+C1428BKD+CABA/@-34.5486883,-58.4437777,17z/data=!3m1!4b1!4m5!3m4!1s0x95bcb436f0040d09:0x4aeb76b157369423!8m2!3d-34.5486883!4d-58.4437777" target="_blank">Monroe 860</a>
					<br>
					<a href="#">soymiplanner@soymiplanner.com</a>
					<br>
					<p>011 5263-7400</p>
					<p>Buenos Aires, Argentina</p>
				</div>
				<div class="redesSociales">
					<ul>
						<li><a href="http://www.facebook.com" target="_blank"><img src="../images/f.png" alt="facebook" width="50px"> </a></li>
						<li><a href="http://www.twitter.com" target="_blank"><img src="../images/t.png" alt="twitter" width="50px"> </a></li>
						<li><a href="http://www.youtube.com" target="_blank"><img src="../images/yt.png" alt="YouTube" width="50px"> </a></li>
						<li><a href="http://www.instagram.com" target="_blank"><img src="../images/i.png" alt="Instagram" width="50px"> </a></li>
					</ul>
					<br><br>



				</div>
			</div>

			<p class="copyRight">Copyright © 2017 - Soy mi Planner</p>
			<button onclick="topFunction()" id="myBtn" title="Go to top">INICIO</button>

			<script>
			window.onscroll = function() {scrollFunction()};

	//cuando baja 100px aparece el boton
			function scrollFunction() {
			    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			        document.getElementById("myBtn").style.display = "block";
			    } else {
			        document.getElementById("myBtn").style.display = "none";
			    }
			}

			// vuelve arriba
			function topFunction() {
			    document.body.scrollTop = 0;
			    document.documentElement.scrollTop = 0;
			}
			</script>
		</footer>


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
