<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";

	$obj= new Proyectos();

	
	echo $obj->eliminaProyecto($_POST['idproyecto']);
 ?>