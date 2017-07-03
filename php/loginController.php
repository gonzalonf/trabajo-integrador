<?php
require_once("../php/soporte.php");
require_once("../php/clases/validadorLogin.php");

if ($auth->estaLogueado()) {
  header("Location:perfil.php");exit;
}


$errores = [];
if ($_POST) {

$validador = new ValidadorLogin();

$errores = $validador->validar($_POST, $repo);

// evaluo AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

  header('Content-Type: application/json');

  if (!empty($errores)){
          header('HTTP/1.0 422 Unprocessable entity.');
  } else {
      $errores = ['error'=> 'none'];
      $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
      $auth->loguear($usuario);
      if ($validador->estaEnFormulario("recordarme"))
      {
        $auth->guardarCookie($usuario);
      }
  }
  print json_encode($errores);
  exit;
}

if (empty($errores))
{
    $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
    $auth->loguear($usuario);
    if ($validador->estaEnFormulario("recordarme"))
    {
      $auth->guardarCookie($usuario);
    }
    header("Location:perfil.php");exit;
  }
}