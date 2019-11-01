<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Proyectos.php";
	$id=$_POST['idcategoria'];

	$obj= new Proyecto();
	echo $obj->eliminaProyecto($id);

 ?>