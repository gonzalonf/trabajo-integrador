<?php
if( isset($_COOKIE['username']) ){
    $user = recuperarUsuario($_COOKIE['usuario'],'users.json');/*OJO: ruta provisoria*/
    if ($_COOKIE['password']==$user['password_hash'] ){
        $_SESSION['login']['id'] = $users['id'];
        $_SESSION['login']['usuario'] = $users['usuario'];
        $_SESSION['login']['avatar'] = $users['avatar'];
    }
}

