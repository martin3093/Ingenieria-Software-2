<?php 
/*$host = 'localhost';
$port = '5432';
$user= 'postgres';
$pass= '123';
$database = 'ERS';
$conexion_72_spv = pg_connect ("host=$host port=$port user=$user password=$pass dbname=$database");
echo($conexion_72_spv);
*/








	class conectar{
		private $host='localhost';
		private $user='postgres';
		private $pass='123';
		private $port = '5432';
		private $database='ProjectManager';
		private $mundo="";

		public function conexion(){
			
			$host = 'localhost';
$port = '5432';
$user= 'postgres';
$pass= '123';
$database = 'ProjectManager';
$conexion = pg_connect ("host=$host port=$port user=$user password=$pass dbname=$database");
			
			
				
			/*$conexion=pg_connect(
				"host=$this->host,
				port=$this->port,
				user=$this->user,
				password=$this->pass,
				dbname=$this->database
								");*/
					
			return $conexion;
		}
		
		}

 ?>