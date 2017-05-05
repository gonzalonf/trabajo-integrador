<?php

include('../php/login.check.php');

include('../php/cookie.check.php');

$usuarioFill = $_SESSION['usuario']??'';
$passwordFill = (isset($_SESSION['login']) )?'*********':'';

 ?>
<div id="login-id" class="login-modal">
  <form class="caja-login animate" action="#">
    <div class="login-container-arriba">
      <span onclick="document.getElementById('login-id').style.display='none'" class="close" title="Close Modal">&times;</span>

    </div>
    <div class="logear-con">
      <ul>
        <h2>INGRESAR CON</h2>
        <li><a class="boton-logear-con-red" href="#"><img src="../images/facebook.png" alt="facebook"></a></li>
        <li><a class="boton-logear-con-red" href="#"><img src="../images/linkedin.png" alt="linkedIn"></a></li>
      </ul>
    </div>
    <div class="login-container">

      <label for='usuario'><b>Usuario</b></label>
      <input id='usuario' class="login-input" type="text" placeholder="Nombre de usuario" name="usuario" value="<?php echo  $usuarioFill ;?>">

      <label for='clave'><b>Clave</b></label>
      <input id='clave' class="login-input" type="password" placeholder="Contraseña" name="password" value="<?php echo  $passwordFill ;?>">

      <button type="submit" class="login-botones">INGRESAR</button>

      <label for="recordarme" >Recordarme</label>
      <input style="float:left" type="checkbox" name="recordarme" value="true" id='recordarme' checked="checked">


    </div>

    <div class="login-container-abajo">
      <span class="login-olvidaste"> <a href="#">¿Olvidaste tu contraseña?</a></span>
      <span class="ir-registro"> <a href="registro.php">REGISTRATE!</a></span>
    </div>
  </form>

</div>
