<?php
session_start();
include('login.helpers.php');
include 'perfilEditar.helpers.php';

$id = $_SESSION['login']['id'];
$email = $_POST['email'];
$email2 = $_POST['email2'];
$ruta='../users/users.json';

// validar mails:
$errores = validarCambioMail($email,$email2);

$_SESSION['error_email'] = $errores;

// guardar cambios, si no hay error:
if ($errores==''){  
    cambiarEmail($id,$email2,$ruta);
    header('Location: ../html/perfil.php'); exit;

}

header('Location: ../html/perfilEditarEmail.php'); exit;
