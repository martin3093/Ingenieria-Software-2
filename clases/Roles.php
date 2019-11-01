


<?php 

	class Rol{

		public function agregaRol($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into roles(
										descripcion)
						values ('$datos[0]')";

			return pg_query($conexion,$sql);
	pg_close($conexion);
		}

		public function actualizaRol($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE roles set descripcion='$datos[1]'
								where id_rol='$datos[0]'";
			return pg_query($conexion,$sql);
			pg_close($conexion);
		}

		public function eliminaRol($idrol){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from roles 
					where id_rol='$idrol'";
			return pg_query($conexion,$sql);
			pg_close($conexion);
		}

	}

 ?>