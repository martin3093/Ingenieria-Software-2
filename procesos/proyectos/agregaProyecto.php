<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";
	$fecha=date("Y-m-d");

	$rol=$_POST['categoria'];

	$datos=array(
		$rol);

	$obj= new Proyecto();

	echo $obj->agregaProyecto($datos);


 ?>