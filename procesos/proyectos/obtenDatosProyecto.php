<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";

	$obj= new Proyectos();

	echo json_encode($obj->obtenDatosProyecto($_POST['idproyecto']));

 ?>