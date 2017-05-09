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
      <div class="" style="text-align:center">
          <h1>Perfil</h1>
          <div class="avatar">
              <img src="<?php echo '../users/'.$avatar; ?>" alt="avatar" width="200px">
          </div>
          <div class="info">

                  <ul> <!-- en nuestros prox avances, estos datos van a provenir del json, el cual se podra editar desde esta pantalla de perfil -->

                      <li>Email:  <?php echo $email; ?></li>
                      <li>Nombre:  <?php echo $nombre;?> </li>
                      <li>Apellido: <?php echo $apellido;?></li>
                  </ul>
          </div>
          <form class="" action="perfilEditar.php" method="post">
             <input class="editar" type="submit" name="editar" value="Editar">
          </form>


          <br><br>
          <br><br><a href="../php/logout.php">LOGOUT</a>
      </div>
      <?php include('footer.html'); ?>

  </body>
</html>
