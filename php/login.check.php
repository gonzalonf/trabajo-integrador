<?php
// si ESTA LOGEADO
if (isset($_SESSION['login']) ){
    header('Location: perfil.php'); exit;
}