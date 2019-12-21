<?php 

class Sql extends PDO {

	private $connect;

	public function __construct() {

		$this->connect = new PDO("mysql:dbname=mr_mustache;host=localhost","root","");

	}

	public function setParameters ($setValues, $parametersValues = array()) {

		foreach ($parametersValues as $columns => $value) {
			
			$setValues->bindParam($columns, $value);

		}

	}

	public function modifyBank ($consultBank, $parametersInsert = array()) {

		$insertBank = $this->connect->prepare($consultBank);

		$this->setParameters($insertBank, $parametersInsert);

		$insertBank->execute();

		return $insertBank;

	}

	public function query ($pullBank, $parametersFinal = array()):array {

		$consult = $this->modifyBank($pullBank,$parametersFinal);

		return $consult->fetchAll(PDO::FETCH_ASSOC);



	}

}








?>