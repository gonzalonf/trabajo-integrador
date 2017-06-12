<?php
	require_once("clases/auth.php");
	require_once("clases/repositorioSQL.php");
	require_once("clases/repositorioJSON.php");
	
	$repoSQL = new RepositorioSQL();
	$repoJSON = new RepositorioJSON();
	
	$repo = $repoSQL;
	$repo2 = $repoJSON; // Actualmente esta haciendo todos los chequeos y auth con SQL y en JSON simplemente almacena una copia. Si invierto estas 2, hace todo con el JSON. 


	// sin instanciar la clase Auth, aca estoy usando su metodo getInstancia (como es un metodo estatico, puedo usarlo sin haber instanciado)
	// el auth lo hago solamente con la base de datos sql
	// la de json solo la almaceno, pero no la uso
	$auth = Auth::getInstancia($repo->getRepositorioUsuarios());

?>