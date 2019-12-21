<?php 

class Sql extends PDO {

	private $conn; 

	public function __construct() {

		$this->conn = new PDO ("mysql:dbname-mr_mustache;host=localhost","root","");

	}

	public function setarParametro($valores, $parametros = array()) 














?>