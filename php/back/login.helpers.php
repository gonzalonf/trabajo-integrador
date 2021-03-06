<?php
function recuperarUsuario($email,$rutaArchivo){
    $json = file_get_contents($rutaArchivo);
    $users = json_decode($json, true);
    $users = (is_array($users))?$users:[];
    $userData = [];
    foreach ($users as $id => $userArray) {
        if ( in_array($email,$userArray) ){
            $userData = [
            'id' => $id,
            'nombre'=> $userArray['nombre'],
            'apellido'=> $userArray['apellido'],
            'email'=> $userArray['email'],
            'password' => $userArray['passwordHash'],
            'avatar' => ($userArray['avatar'])??'default.jpg'
            ];
        }
    }
    return $userData;
}
//------------------
function recuperarUsuarioConID($id,$rutaArchivo){
    $json = file_get_contents($rutaArchivo);
    $users = json_decode($json, true);
    $userData = [];
    if ($users!=[]){
        $userData = [
        'id' => $id,
        'nombre'=> $users[$id]['nombre'],
        'apellido'=> $users[$id]['apellido'],
        'email'=> $users[$id]['email'],
        'password' => $users[$id]['passwordHash'],
        'avatar' => ($users[$id]['avatar'])??'default.jpg'
        ];
    }
    return $userData;
}
// ----------------
function guardarCookie($email,$userHash){
        $cookielife = time()+(60*60*24*30);
        setcookie('email',$email,$cookielife,'/');
        setcookie('password',$userHash,$cookielife,'/');

}
//----------------------------
function borrarCookie(){
        unset($_COOKIE['password']);
        unset($_COOKIE['email']);
        $cookielife = time()-1;
        setcookie('email','',$cookielife,'/');
        setcookie('password','',$cookielife,'/');
}
//--------------------------
function logearDesdeRegistro($email,$ruta){
    $user=recuperarUsuario($email,$ruta);
    $_SESSION['login']['id'] = $user['id'];
    $_SESSION['login']['email'] = $user['email'];
    $_SESSION['login']['nombre'] = $user['nombre'];
    $_SESSION['login']['apellido'] = $user['apellido'];
    $_SESSION['login']['avatar'] = $user['avatar'];
}
