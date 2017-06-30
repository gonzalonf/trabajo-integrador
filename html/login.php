<?php require("../php/loginController.php"); ?>

<script src="../js/login.js" charset="utf-8"></script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
  <link id="pagestyle" rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <?php include('nav.php'); ?>

  <form class="caja-login animate" action="" method="post">

    <div class="login-container-arriba">

    </div>
    <div class="logear-con">
      <ul>
        <h2>INGRESAR CON</h2>
        <li><a class="boton-logear-con-red" href="#"><img src="../images/facebook.png" alt="facebook"></a></li>
        <li><a class="boton-logear-con-red" href="#"><img src="../images/linkedin.png" alt="linkedIn"></a></li>
      </ul>
    </div>
    <div class="login-container">

      <label for='email'><b>Usuario</b></label>
      <input id='email' class="login-input" type="email" placeholder="email" name="email">

      <label for='password'><b>Clave</b></label>
      <input id='password' class="login-input" type="password" placeholder="contraseña" name="password">

      <div class="msj_error">
          <ul>
                <?php if (!empty($errores)): ?>

                    <?php foreach ($errores as $error): ?>
                        <li>  <?= $error  ?>  </li>
                    <?php endforeach; ?>

                <?php endif; ?>
            </ul>
        </div>

      <button type="submit" class="login-botones">INGRESAR</button>

          <label for="recordarme" >Recordarme</label>
          <input style="float:left" type="checkbox" name="recordarme" value="true" id='recordarme' checked>


    </div>

    <div class="login-container-abajo">
      <span class="login-olvidaste"> <a href="olvideContrasenia.php">¿Olvidaste tu contraseña?</a></span>
      <span class="ir-registro"> <a href="registro.php">REGISTRATE!</a></span>
    </div>
  </div>
</form>

<?php include('footer.html');

?>
</body>
</html>
