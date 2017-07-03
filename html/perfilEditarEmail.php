<?php
require("../php/soporte.php");
require_once("../php/clases/validadorUsuario.php");

$repoUsuarios = $repo->getRepositorioUsuarios();
$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if (!$auth->estaLogueado()) {
    header("Location:login.php");exit;
}
// var_dump($usuarioLogueado);
// echo "<hr>";
// print_r($_SESSION['usuarioLogueado']);


$validador = new ValidadorUsuario();


$repoUsuarios = $repo->getRepositorioUsuarios();
$repoUsuarios2 = $repo2->getRepositorioUsuarios();

$campo = 'email';
$valorDefault = $usuarioLogueado->getEmail();

if ($validador->estaEnFormulario($campo)) {
	$errores = $validador->validar($_POST, $repo);
}
$errores = $errores[$campo] ?? '';

if(!empty($_POST)){
    if ($_POST[$campo]!== $_POST['email2']){
        $errores = '*los email no coinciden';
    }
    if ($errores=='' && $_POST[$campo]!==''&& $_POST[$campo]!==$valorDefault){
        $current = $_POST[$campo];
        $usuarioLogueado->setEmail($current);
        $usuarioLogueado->modificar($repoUsuarios);
        $usuarioLogueado->modificar($repoUsuarios2);

        $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($current);
        $auth->loguear($usuario);
        $_SESSION['estaLogueado']=$current;

        header('Location: perfil.php');


        $valorDefault =$current;
    }
}

?>

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
			<h1>Cambiar email</h1>
			<hr>

		</div>
		<form class='formulario' action='' method='post'>

			<input class='decorative-input-mail' type='text' placeholder='Nuevo email' name='email' value='<?=$valorDefault?>'>
			<br>

			<input class='decorative-input-mail' type='text' placeholder='Confirme email' name='email2' value='<?=$valorDefault?>'>
			<br>

			<div class='checkbox'>
				<input  id="mail-promociones" name='mail-promociones' type='checkbox' value='1' checked>
			</div>

            <p class='msj_error'>
                <?=$errores?>
            </p><br>


			<label for='mail-promociones' class='me-gustaria'>
				Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre Soy Mi Planner y sus socios.
			</label>

			<button type='submit' class='enviar' name='submit' value='registrate'><strong>CONFIRMAR</strong></button>
			<br>

		</div>
	</form>
</div>

<div class='registro-container' style="margin-top: -50px;">
	<div class='formulario'>
		<a class='volver' href="perfil.php">VOLVER</a>
	</div>
</div>

<?php include('footer.html'); ?>


</body>
</html>