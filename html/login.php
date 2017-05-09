<?php
session_start();
include('../php/login.check.php');

$cookieEmail = $_COOKIE['email'] ?? '';
$passwordFill =  (isset($_COOKIE['password'])) ? '*******':'';

$error = $_SESSION['error_login']??'';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LOGIN</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include('nav.php'); ?>

        <form class="caja-login animate" action="../php/login.controller.php" method="post">
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
              <div class="msj_error">
                  <?php echo $error; ?>
              </div>

            <label for='email'><b>Usuario</b></label>
            <input id='email' class="login-input" type="email" placeholder="email" name="email" value="<?php echo $cookieEmail; ?>">

            <label for='clave'><b>Clave</b></label>
            <input id='clave' class="login-input" type="password" placeholder="Contraseña" name="password" value="<?php echo $passwordFill; ?>">

            <button type="submit" class="login-botones">INGRESAR</button>

            <label for="recordarme" >Recordarme</label>
            <input style="float:left" type="checkbox" name="recordarme" value="true" id='recordarme'>


          </div>

          <div class="login-container-abajo">
            <span class="login-olvidaste"> <a href="#">¿Olvidaste tu contraseña?</a></span>
            <span class="ir-registro"> <a href="registro.php">REGISTRATE!</a></span>
          </div>
        </div>
    </form>

      <?php include('footer.html'); ?>
    </body>
</html>
<?php session_unset(); ?>