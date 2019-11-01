<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Roles.php";
	$fecha=date("Y-m-d");

	$rol=$_POST['categoria'];

	$datos=array(
		$rol);

	$obj= new Rol();

	echo $obj->agregaRol($datos);


 ?>