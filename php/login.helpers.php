<?php
function recuperarUsuario($nombre,$rutaArchivo){
    $json = file_get_contents($rutaArchivo);
    $users = json_decode($json, true);
    $userData = [];
    foreach ($users as $id => $userArray) {
        if ( in_array($nombre,$userArray) ){
            $userData = [
            'id' => $id,
            'usuario'=> $userArray['usuario'],
            'nombre'=> $userArray['nombre'],
            'apellido'=> $userArray['apelido'],
            'email'=> $userArray['email'],
            'fecha_nac'=> $userArray['fecha_nac'],
            'password' => $userArray['password'],
            'avatar' => ($userArray['avatar'])??''
            ];
        }
    }
    return $userData;
}

// ----------------
function guardarCookie(){
    if( isset($_POST['recordarme']) && $_POST['recordarme'] =='true' ){
        $cookielife = time()+(60*60*24*30);
        setcookie('password',$userHash,$cookielife,'/');
        setcookie('username',$_SESSION['usuario'],$cookielife,'/');
    }

}