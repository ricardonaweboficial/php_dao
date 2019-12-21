<?php 

require_once ("config.php");

$sql = new Sql();

$user = $sql->query("SELECT * FROM login_admin");

echo json_encode($user);


 ?>