<?php
session_start();
include('login.helpers.php');
include ('login.check.php');

$email = $_POST['email'];
$psw = $_POST['password'];
$ruta = __DIR__.'/../users/users.json';

$_SESSION['error_login']='';

if($email=='' || $psw==''){
    $_SESSION['error_login']='* debe completar todos los campos';
    header('Location: ../html/login.php'); exit;
}


$user = recuperarUsuario($email,$ruta);

if (!$user==[]){
        $userHash = $user['password'];
}


if ($user==[] || !password_verify($psw,$userHash) ){
    if (!isset($_COOKIE['password']) ){
        $_SESSION['error_login']='* usuario o contraseña incorrectos';
        header('Location: ../html/login.php'); exit;
    }elseif (isset($_COOKIE['password']) &&  $userHash!=$_COOKIE['password']) {
        $_SESSION['error_login']='* usuario o contraseña incorrectos';
        header('Location: ../html/login.php'); exit;
    }
}

unset($_SESSION['error_login']);


$_SESSION['login']['id'] = $user['id'];
$_SESSION['login']['email'] = $user['email'];
$_SESSION['login']['nombre'] = $user['nombre'];
$_SESSION['login']['apellido'] = $user['apellido'];
$_SESSION['login']['avatar'] = $user['avatar'];


if (isset($_POST['recordarme'])){
    guardarCookie($user['email'],$userHash);
}
header('Location: ../html/perfil.php');