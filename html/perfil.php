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
      <div class="editarContainer" style="text-align:center">
          <h1>Perfil</h1>

          <div class="perfil1">
          <div class="avatar">
              <img src="<?php echo '../users/'.$avatar; ?>" alt="avatar" width="200px">
          </div>
          <div class="info">

                  <ul> <!-- en nuestros prox avances, estos datos van a provenir del json, el cual se podra editar desde esta pantalla de perfil -->

                      <li>Email: <b> <?php echo $email; ?> </b></li>
                      <li>Nombre: <b> <?php echo $nombre;?> </b> </li>
                      <li>Apellido: <b> <?php echo $apellido;?> </b></li>
                  </ul>
        </div>


        </div>
                  <div class="editarNav">
                      <ul>
                      <li><a href="perfilEditarNombre.php">Cambiar Nombre y apellido</a></li>
                      <li><a href="perfilEditarEmail.php">Cambiar Email</a></li>
                      <li><a href="perfilEditarContrasenia.php">Cambiar Contraseña</a></li>
                      <li><a style='color:black' href="../php/logout.php">Salir</a></li>
                      </ul>
                  </div>
          </div>
          <!-- <form class="" action="perfilEditarNombre.php" method="post">
             <input class="editar" type="submit" name="editar" value="Editar Nombre">
          </form>
          <form class="" action="perfilEditarEmail.php" method="post">
             <input class="editar" type="submit" name="editar" value="Cambiar Email">
          </form>
          <form class="" action="perfilEditarContrasenia.php" method="post">
             <input class="editar" type="submit" name="editar" value="Cambiar Contraseña">
          </form> -->

      </div>
      <?php include('footer.html'); ?>

  </body>
</html>
