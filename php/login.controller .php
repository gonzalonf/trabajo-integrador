<?php
// NOTE: este controller NO TIENE SENTIDO, no se lo gasten buscándolo
// no le econtré la lógica todavía
// supongo que se tiene que procesar en el mismo login y hacer un include del controller
session_start();
include('login.helpers.php');
include('login.check.php');

$ruta = __DIR__.'/../users/users.json';
$user = recuperarUsuario($_POST['nombre'],$ruta);
$userHash = $users['password'];
$passwordPost = $_POST['password'];

$_SESSION['error_login']='';
if ( $user==[] || !password_verify($passwordPost,$userHash)) {
    $_SESSION['error_login'] = '**usuario o contraseña incorrectos';
    // error... ver bien COMO SE HACE en login modal,
} else{
    $_SESSION['login']['id'] = $users['id'];
    $_SESSION['login']['usuario'] = $users['usuario'];
    $_SESSION['login']['avatar'] = $users['avatar'];
    guardarCookie();
}

if ($_SESSION['error_login']=='') {
    header('Location: ../html/perfil.php')
}

