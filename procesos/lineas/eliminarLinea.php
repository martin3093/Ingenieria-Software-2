<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Lineas.php";
$idart=$_POST['idlinea'];

	$obj=new Lineas();

	echo $obj->eliminaLinea($idart);

 ?>