

<?php 
	class Lineas{

		public function insertaLinea($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');
			
			$sql_usuarioProyecto="select estado 
			from  usuariosproyecto up
			where up.id_proyecto='$datos[0]';";
				
			$result=pg_query($conexion,$sql_usuarioProyecto);

			$ver=pg_fetch_row($result);
			

			$sql="INSERT into linea_base (id_proyecto, estado, nombre_linea, predecesor_linea, fecha_inicio, fecha_fin, comentario, modificacion,estado_linea) 
							values ('$datos[0]',
									'$ver[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[7]')";
			return pg_query($conexion,$sql);
		}

		public function obtenDatosLinea($idLinea){
			$c=new conectar();
			$conexion=$c->conexion();
			
			$sql="select  pr.nombre_proyecto, lb.nombre_linea,lb.predecesor_linea,lb.fecha_inicio,lb.fecha_fin,lb.estado_linea,lb.comentario,lb.modificacion,lb.id_linea
			from linea_base lb 
			join proyectos pr on lb.id_proyecto=pr.id_proyecto
			where lb.id_linea='$idLinea';";
				
			$result=pg_query($conexion,$sql);

			$ver=pg_fetch_row($result);

			$datos=array(
					"nombre_proyecto" => $ver[0],
					"nombre_linea" => $ver[1],
					"predecesor_linea" => $ver[2],
					"fecha_inicio" => $ver[3],
					"fecha_fin" => $ver[4],
					"estado_linea" => $ver[5],
					"comentario" => $ver[6],
					"modificacion" => $ver[7],
					"id_linea" => $ver[8]
						);

			return $datos;
		}

		public function actualizaLinea($datos){
			$c=new conectar();
			$conexion=$c->conexion();





		
		
		
			$sql="UPDATE public.linea_base
	SET   nombre_linea='$datos[1]', predecesor_linea='$datos[2]', fecha_inicio='$datos[3]', fecha_fin='$datos[4]', comentario='$datos[5]', modificacion='$datos[6]', estado_linea='$datos[7]'
	WHERE id_linea='$datos[0]';";

			return pg_query($conexion,$sql);
		}

		public function eliminaLinea($idLinea){
			$c=new conectar();
			$conexion=$c->conexion();


			$sql="DELETE from linea_base 
					where id_linea='$idLinea'";
			$result=pg_query($conexion,$sql);

			return $result;
		}

	

	}

 ?>