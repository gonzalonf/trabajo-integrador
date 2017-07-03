<?php 
include '../php/clases/DB.php';
// include 'repositorioJSON.php';
include '../php/clases/repositorioSQL.php';


// $json= new RepositorioUsuariosJSON;
// $prueba = traerTodosLosUsuarios();
// var_dump($prueba);
// exit;
$sql = new RepositorioUsuariosSQL;


//posta
$cantidadUsuarios=$sql->traerProximoIdSql();

//para probar
// $cantidadUsuarios=50;


header('Content-Type', 'application/json');

print json_encode($cantidadUsuarios);



 ?>