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
      <h1>Perfil</h1>
      <div class="avatar">
          <img src="../images/avatar/default.png" alt="avatar">
      </div>
      <div class="info">
          <?php if ( !isset($_SESSION) || !count($_SESSION)): ?>
               Usted no ha sido correctamente logeado"
         <?php   else: ?>

          <ul>
              <li>Nombre de Usuario: <?php echo $_SESSION['userName']; ?></li>
              <li>Nombre:  <?php echo $_SESSION['nombre']; ?></li>
              <li>Apellido: <?php echo $_SESSION['apellido']; ?></li>
              <li>Email:  <?php echo $_SESSION['email']; ?></li>
          </ul>
<?php endif; ?>
      </div>
      <?php include('footer.html'); ?>

  </body>
</html>
