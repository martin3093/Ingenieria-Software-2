<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Lineas.php";

	$obj= new Lineas();

	$datos=array();

				echo	$datos[0]=$_POST['proyecto'];
				echo	$datos[1]=$_POST['nombre'];
				echo	$datos[2]=$_POST['predecesor'];
				echo	$datos[3]=$_POST['fecha_inicio'];
				echo	$datos[4]=$_POST['fecha_fin'];
				echo	$datos[5]=$_POST['comentario'];
				echo	$datos[6]=$_POST['estado'];
				echo	$datos[7]=$_POST['modificacion'];
					
					echo $obj->insertaLinea($datos);
					
					
					
		
				
		

 ?>