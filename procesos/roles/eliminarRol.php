<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Roles.php";
	$id=$_POST['idcategoria'];

	$obj= new Rol();
	echo $obj->eliminaRol($id);

 ?>