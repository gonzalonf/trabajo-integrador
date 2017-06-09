<?php
require_once("repositorioUsuarios.php");

class Usuario {
	private $id;
	private $nombre;
	private $apellido;
	private $localidad;
	private $email;
	private $password;
	private $avatar;

	public function __construct($id, $nombre, $apellido, $localidad, $email, $password) {
		$this->id = $id;
		$this->nombre =$nombre;
		$this->apellido =$apellido;
		$this->localidad = $localidad;
		$this->email = $email;
		$this->password = $password;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getLocalidad()
	{
		return $this->localidad;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getAvatar()
	{
		$name = "../users/" . $this->getId();
		$matching = glob($name . ".*");

		$info = pathinfo($matching[0]);
		$ext = $info['extension'];

		return $name . "." . $ext;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}
	public function setLocalidad($localidad) {
		$this->localidad = $localidad;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setPassword($password) {
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}
	public function setAvatar($avatar) {
		if ($avatar["error"] == UPLOAD_ERR_OK) {

			$path = "../users/";

			if (!is_dir($path)) {
				mkdir($path, 0777);
			}

			$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

			move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
		}
	}

	public function guardar(RepositorioUsuarios $repo) {
		$repo->guardar($this);
	}

	public function toArray() {
		return [
		"id" => $this->getId(),
		"nombre" => $this->getNombre(),
		"apellido" => $this->getApellido(),
		"localidad" => $this->getLocalidad(),
		"email" => $this->getEmail(),
		"password" => $this->getPassword()
		];

	}
}