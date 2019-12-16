<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Lineas.php";

	$obj= new Lineas();


	$idart=$_POST['idLinea'];

	echo json_encode($obj->obtenDatosLinea($idart));

 ?>