<?php
require("../php/soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

if ($usuarioLogueado) {

  $imagenPerfil = $usuarioLogueado->getAvatar();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title></title>
  <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

  <?php if ($auth->estaLogueado()) { ?>

  <?php include('nav.php'); ?>


  <div class='registro-container'>
    <div class='crear-cuenta'>
      <h1 style='font-size: 30px; '>Mi Perfil</h1>
      <hr>
    </div>
  </div>

  <div class="editarContainer">

    <div class="perfil1">

      <div class="avatar">
        <img src="<?=$imagenPerfil?>" alt="avatar">
      </div>
      
      <div class="info">
        <ul> 
          <li class="editarNav">Imagen de Perfil: <a href="perfilEditarAvatar.php">Cambiar</a></li> 
          <li class="editarNav">Email: <b> <?= $usuarioLogueado->getEmail() ?></b> <a href="perfilEditarEmail.php">Cambiar</a> </li>
          <li class="editarNav">Nombre: <b> <?= $usuarioLogueado->getNombre() ?> </b> <a href="perfilEditarNombre.php">Cambiar</a> </li>
          <li class="editarNav">Apellido: <b> <?= $usuarioLogueado->getApellido() ?> </b> <a href="perfilEditarApellido.php">Cambiar</a> </li>
          <li class="editarNav">Localidad: <b> <?= $usuarioLogueado->getLocalidad() ?> </b> <a href="perfilEditarLocalidad.php">Cambiar</a> </li>
          <li class="editarNav">Contraseña: <b> ●●●●●● </b> <a href="perfilEditarContrasenia.php">Cambiar</a></li> 
        </ul>
      </div>

    </div>
  </div>

  <div class='registro-container' style="margin-top: 0;">
    <div class='formulario'>
      <a class='volver' href="../php/logout.php">SALIR</a>
    </div>
  </div>

  <?php include('footer.html'); ?>

  <?php } else {  
   header("Location:login.php");exit;
 }
 ?>

</body>
</html>
