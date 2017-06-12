<?php
	require_once("repositorioUsuarios.php");
	require_once("DB.php");

	class RepositorioUsuariosSql extends RepositorioUsuarios {

		public function find($id) {
			$sql = 'SELECT * FROM '.static::$table.' WHERE id = :id';
			$stmt = DB::getConn()->prepare($sql);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();

			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$class = get_called_class();
			$usuario = new $class([]);
			$usuario->toModel($result);

	        return $usuarios;
	    }

		public function save()
        {
            $sql = ($this->id)?$this->update():$this->insert();
            $stmt = DB::getConn()->prepare($sql);
            foreach ($this->fillable as $column) {
                $stmt->bindValue(":$column", $this->$column);
            }
            $stmt->execute();
        }

        private function insert()
        {
			$sql= 'INSERT INTO usuarios (id, nombre, apellido, email, localidad, password)
			VALUES (:id, :nombre, :apellido, :email, :localidad, :password)';
			$stmt=DB::getConn()->prepare($sql);
			$stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
			$stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
			$stmt->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
			$stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
			$stmt->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
			$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);

			$stmt->execute();

        }

        private function update()
        {
            $set = '';
            foreach ($this->fillable as $column) {
                $set .= "$column=:$column,";
            }
            $set = trim($set, ",");
            return "UPDATE ".static::$table." SET $set WHERE id = ".$this->id;
        }
	}
