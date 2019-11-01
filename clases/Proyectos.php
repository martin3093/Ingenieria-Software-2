


<?php 

	class Proyecto{

		public function agregaProyecto($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into proyectos(nombre_proyecto,fecha_inicio,fecha_fin
										estado)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

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
					where id_proyectos='$idproyecto'";
			return pg_query($conexion,$sql);
			pg_close($conexion);
		}

	}

 ?>