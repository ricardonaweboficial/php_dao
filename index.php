<?php 

require_once ("config.php");

$bunito = new Users();

$bunito->loadById(3);

echo $bunito;


 ?>