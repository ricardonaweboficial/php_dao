<?php 

class Users {

	private $id;
	private $admin;
	private $senha;

	public function getId() {

		return $this->id;

	}

	public function setId($value) {

		$this->id = $value;

	}

	public function getAdmin() {

		return $this->admin;

	}

	public function setAdmin($value) {

		$this->admin = $value;

	}

	public function getSenha() {

		return $this->senha;

	}

	public function setSenha($value) {

		$this->senha = $value;

	}

	public function loadById($id) { // Puxando usuarios pelo ID 

		$sql = new Sql();

		$resultsId = $sql->query("SELECT * FROM login_admin WHERE id = :ID",array(

			":ID" => $id

		));

		if(count($resultsId) > 0) {

				$row = $resultsId[0];

				$this->setId($row['id']);
				$this->setAdmin($row['admin']);
				$this->setSenha($row['senha']);
		}

		
	}

	public static function getList() {// Puxando todos os users 

		$sql = new Sql();

		return $sql->query("SELECT * FROM login_admin ORDER BY admin");

	}

	public static function search($login) {// Buscando usuarios 

		$sql = new Sql();

		return $sql->query("SELECT * FROM login_admin WHERE admin LIKE :search ORDER BY admin",array(

			':search' => "%".$login."%"

		));

	}

	public function login($login,$password) {

		
		$sql = new Sql();


		$resultsId = $sql->query("SELECT * FROM login_admin 
		WHERE admin = :login AND senha = :password",
		array(
			":login"=>$login,
			":password"=>$password
		));



		if(count($resultsId) > 0) {

				$row = $resultsId[0];

				$this->setId($row['id']);
				$this->setAdmin($row['admin']);
				$this->setSenha($row['senha']);
		} else {

			throw new Exception("Login e/ou senha invalidos");
			

		}


	}


	public function __toString() {

		return json_encode(array(

			'id' => $this->getId(),
			'admin' => $this->getAdmin(),
			'senha' => $this->getSenha()

		));

	}


}












?>