<?php

try {

    $db = new PDO( 'mysql:host=localhost; dbname=prueba; charset=utf8; port:8889', 'debian-sys-maint',
    'si3kl4VBU4MrsyXZ');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch(PDOException $e){
    echo $e->getmessage();
}

$users=file_get_contents('users.json');
$users=json_decode($users,true);
echo "<pre>";
var_dump($users);


$stmt = $db ->prepare(' INSERT INTO user(
        nombre,
        apellido,
        email,
        passwordHash,
        avatar
        ) VALUES(
            :nombre,
            :apellido,
            :email,
            :password,
            :ruta_avatar)
    ');
foreach ($users as $usuario) {
    $stmt->bindValue(':nombre' ,$usuario['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(':apellido', $usuario['apellido'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $usuario['email'], PDO::PARAM_STR);
    $stmt->bindValue(':password', $usuario['passwordHash'], PDO::PARAM_STR);
    $stmt->bindValue(':ruta_avatar', $usuario['avatar'], PDO::PARAM_STR);

    $stmt->execute();


}
