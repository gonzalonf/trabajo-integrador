<?php
session_start();

include('../php/login.check.secret.php');

$email = $_SESSION['login']['email'];
$nombre = $_SESSION['login']['nombre'];
$apellido = $_SESSION['login']['apellido'];
$avatar = $_SESSION['login']['avatar'];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
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
        <img src="<?php echo '../users/'.$avatar; ?>" alt="avatar">
      </div>
      
      <div class="info">
        <ul> <!-- en nuestros prox avances, estos datos van a provenir del json, el cual se podra editar desde esta pantalla de perfil -->
          <li class="editarNav">Imagen de Perfil: <a href="perfilEditarAvatar.php">Cambiar</a></li> 
          <li class="editarNav">Email: <b> <?php echo $email; ?></b> <a href="perfilEditarEmail.php">Cambiar</a> </li>
          <li class="editarNav">Nombre: <b> <?php echo $nombre;?> </b> <a href="perfilEditarNombre.php">Cambiar</a> </li>
          <li class="editarNav">Apellido: <b> <?php echo $apellido;?> </b> <a href="perfilEditarApellido.php">Cambiar</a> </li>
          <li class="editarNav">Contraseña: <b> ●●●●●● </b> <a href="perfilEditarContrasenia.php">Cambiar</a></li> 
        </ul>
      </div>

    </div>
  </div>

  <div class='registro-container' style="margin-top: 0;">
    <div class='formulario'>
      <button class='volver'> <a href="../php/logout.php">SALIR</a> </button>
    </div>
  </div>

      <?php include('footer.html'); ?>

  </body>
</html>
