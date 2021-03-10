<?php 

	require_once("config.php");

	$sql = new Sql();

	$resultado = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

	echo json_encode($resultado);

 ?>