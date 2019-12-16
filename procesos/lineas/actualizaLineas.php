<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Lineas.php";

$obj= new Lineas();

				





$datos=array( 
		$_POST['idLinea'],
	    $_POST['nombreU'],
	    $_POST['predecesorU'],
	    $_POST['fecha_inicioU'],
	    $_POST['fecha_finU'],
		$_POST['comentarioU'],
		$_POST['estadoU'],
		$_POST['modificacionU'],
		
			);

    echo $obj->actualizaLinea($datos);

 ?>