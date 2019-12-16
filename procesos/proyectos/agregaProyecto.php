<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";

	$obj= new Proyectos();


	$datos=array(
			$_POST['nombre'],
			$_POST['fecha_inicio'],
			$_POST['fecha_fin'],
			$_POST['estado']

				);

	echo $obj->agregaProyecto($datos);

	
	
 ?>