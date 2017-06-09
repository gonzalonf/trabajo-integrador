<?php
session_start();
include('login.helpers.php');
include('register.helpers.php');


$errores=validacionEditar();
$error=emailExistenteEditarPerfil();


if (count($errores)) {
        $_SESSION['errores'] = $errores;
        header('Location: ../html/perfilEditar.php');
}

if (count($error)) {
        $_SESSION['errores'] = $error;
        header('Location: ../html/perfilEditar.php');
} else {
        $usuario=recuperarUsuario($_SESSION['login']['email'],'../users/users.json');
        echo "<br>";
        echo "<br>";
        var_dump($usuario);

        $users=file_get_contents('../users/users.json');
        $users = json_decode($users, true);
        echo "<br>";
        echo "<br>";
        echo "<br>";

        var_dump($users);

        $indice = $usuario['id'];

        $users[$indice]['nombre']=$_POST['nombre'];
        $users[$indice]['apellido']=$_POST['apellido'];
        $users[$indice]['email']=$_POST['email'];
        $pswHashNew=password_hash($_POST['password2'], PASSWORD_DEFAULT) ?? '';
        $users[$indice]['passwordHash']=$pswHashNew;

        echo "<br>";
        echo "<br>";
        var_dump($users);

// file_put_contents('../users/users.json', json_encode($users));
	// header('Location: ../html/perfil.php');
}
?>
