<?php
include('login.helpers.php');
session_start();
var_dump($_SESSION);
echo "<br>";
echo "<br>";
echo "<br>";
$_POST['nombre'];
var_dump($_POST);

$usuario=recuperarUsuario($_SESSION['login']['email'],'../users/users.json');

$users = json_decode('../users/users.json', true);

$indice = $usuario['id']-1;

$users[$indice]['nombre']=$_POST['nombre'];

file_put_contents('../users/users.json', json_encode($users));


echo "<br>";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
// var_dump(recuperarUsuario($_SESSION['login']['email'],'../users/users.json'));
echo "<pre>";
var_dump($usuario);
$usuario['nombre']=$_POST['nombre'];
var_dump($usuario);
$usuario=json_encode($usuario);
file_put_contents();


 ?>
