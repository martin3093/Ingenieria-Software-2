<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";

	$obj= new Proyectos();


	$datos=array(
			$_POST['idproyectoU'],
			$_POST['nombreU'],
			$_POST['fecha_inicioU'],
			$_POST['fecha_finU'],
			$_POST['estadoU']
	
				);

	echo $obj->actualizaProyecto($datos);

	
	
 ?>