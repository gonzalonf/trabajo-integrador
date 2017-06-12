<?php
require_once("repositorioUsuarios.php");
require_once("DB.php");

class RepositorioUsuariosSql extends RepositorioUsuarios {

	public function traerTodosLosUsuarios() {

		$usuarios = [];

		$sql = 'SELECT * FROM soy_mi_planner.usuarios';
		$stmt = DB::getConn()->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $result) {
			$usuarioArray = $result;

			$usuario = new Usuario(
				$usuarioArray["id"],
				$usuarioArray["nombre"],
				$usuarioArray["apellido"],
				$usuarioArray["localidad"],
				$usuarioArray["email"],
				$usuarioArray["password"]
				);

			$usuarios[] = $usuario;
		}

		return $usuarios;
	}

	public function traerProximoId() {
	        //1: Me traigo todo el archivo
		$sql = 'SELECT max(id) FROM soy_mi_planner.usuarios';
		$stmt = DB::getConn()->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result[0]['max(id)'] + 1;
	}

	public function guardar(Usuario $usuario) {
		
		$sql= 'INSERT INTO usuarios (id, nombre, apellido, localidad, email, password)
		VALUES (:id, :nombre, :apellido, :localidad, :email, :password)';
		
		$stmt=DB::getConn()->prepare($sql);


		$stmt->bindValue(':id', null, PDO::PARAM_INT);
		$stmt->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
		$stmt->bindValue(':apellido', $usuario->getApellido(), PDO::PARAM_STR);
		$stmt->bindValue(':localidad', $usuario->getLocalidad(), PDO::PARAM_STR);
		$stmt->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);
		$stmt->bindValue(':password', $usuario->getPassword(), PDO::PARAM_STR);

		$stmt->execute();

	}

	public function modificar()
	{
		$stmt=DB::getConn()->prepare($sql);

		// GONZA: ACA FALTA ESCRIBIR LA FUNCION
	}

}
