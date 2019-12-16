


<?php 

	class Proyectos{

		public function agregaProyecto($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into proyectos(fecha_fin,fecha_inicio,nombre_proyecto,
										estado)
						values ('$datos[2]','$datos[1]','$datos[0]','$datos[3]')";

			return pg_query($conexion,$sql);
	pg_close($conexion);
		}

		public function actualizaProyecto($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE proyectos set nombre_proyecto='$datos[1]',fecha_inicio='$datos[2]',fecha_fin='$datos[3]',estado='$datos[4]'
								where id_proyecto='$datos[0]'";
			return pg_query($conexion,$sql);
			pg_close($conexion);
		}

		public function eliminaProyecto($idproyecto){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from proyectos 
					where id_proyecto='$idproyecto'";
			return pg_query($conexion,$sql);
			pg_close($conexion);
		}
		
		
		
				public function obtenDatosProyecto($id_proyecto){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_proyecto,nombre_proyecto,fecha_inicio,fecha_fin,
										estado 
				from proyectos
				where id_proyecto='$id_proyecto' ";
			$result=pg_query($conexion,$sql);
			$ver=pg_fetch_row($result);

			$datos=array(
					'id_proyecto' => $ver[0], 
					'nombre_proyecto' => $ver[1],
					'fecha_inicio' => $ver[2],
					'fecha_fin' => $ver[3],
					'estado' => $ver[4]
					
						);
			return $datos;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	}

 ?>