<?php
	require_once("repositorio.php");
	require_once("RepositorioUsuariosSql.php");
	require_once("DB.php");

	class SqlRepo extends Repositorio {

		public function __construct() {
			$this->repositorioUsuarios = new RepositorioUsuariosSql();
		}

	}
