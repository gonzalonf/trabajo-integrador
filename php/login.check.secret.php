<?php
// si NO ESTA LOGEADO... no puede acceder
if ( !isset($_SESSION['login']) ){
    header('Location: index.php'); exit;
}