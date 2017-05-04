<?php session_start() ?>
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
              <img src="../images/avatar/default.png" alt="avatar" width="200px">
          </div>
          <div class="info">
                  <?php if ( !isset($_SESSION) || !count($_SESSION)): ?>
                       Usted no ha sido correctamente logeado
                 <?php   else: ?>

                  <ul> <!-- en nuestros prox avances, estos datos van a provenir del json, el cual se podra editar desde esta pantalla de perfil -->
                      <li>Nombre de Usuario: <?php echo $_SESSION['usuario']; ?></li>
                      <li>Nombre:  <?php echo $_SESSION['nombre']; ?></li>
                      <li>Apellido: <?php echo $_SESSION['apellido']; ?></li>
                      <li>Fecha de nacimiento: <?php echo $_SESSION['fecha_nac']; ?></li>
                      <li>Email:  <?php echo $_SESSION['email']; ?></li>
                  </ul>
                <?php endif; ?>
          </div>
      </div>
      <?php include('footer.html'); ?>

  </body>
</html>
