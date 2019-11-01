<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Roles.php";

	

	$datos=array(
		$_POST['idcategoria'],
		$_POST['categoriaU']
			);

	$obj= new Rol();

	echo $obj->actualizaRol($datos);

 ?>