<?php
	require_once("repositorio.php");
	require_once("RepositorioUsuariosSQL.php");
	// require_once("DB.php");

	class repositorioSQL extends Repositorio {

		public function __construct() {
			$this->repositorioUsuarios = new RepositorioUsuariosSQL();
		}

	}
