<?php
session_start();

// si NO ESTA LOGEADO... no puede acceder
if ( !isset($_SESSION['login']) ){
    header('Location: home.php'); exit;
}