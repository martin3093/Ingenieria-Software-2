 <?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Lineas Bases</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="select  pr.nombre_proyecto, lb.nombre_linea,lb.predecesor_linea,lb.fecha_inicio,lb.fecha_fin,lb.estado_linea,lb.comentario,lb.modificacion,lb.id_linea
			from linea_base lb 
			join proyectos pr on lb.id_proyecto=pr.id_proyecto;";
		$result=pg_query($conexion,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<h1>Lineas Bases</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmLinea" enctype="multipart/form-data">
						<label>Proyecto</label>
						<select class="form-control input-sm" id="proyecto" name="proyecto">
							<option value="A">Selecciona Proyecto</option>
							<?php while($ver=pg_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Predecesor Linea</label>
						<input type="text" class="form-control input-sm" id="predecesor" name="predecesor">
						<label>Fecha Inicio</label>
						<input type="text" class="form-control input-sm" id="fecha_inicio" name="fecha_inicio">
						<label>Fecha fin</label>
						<input type="text" class="form-control input-sm" id="fecha_fin" name="fecha_fin">
						<label>comentario</label>
						<input type="text" class="form-control input-sm" id="comentario" name="comentario">
						<label>Estado</label>
						<select  type="text" class="form-control input-sm" id="estado" name="estado">
						<option value="Activo" >Activo</option> 
						<option value="Pendiente">Pendiente</option> 
						<option value="Inactivo">Inactivo</option>
						<option value="Terminado">Terminado</option>
						</select>
						<p></p>
						<label>Modificación</label>
						<input type="text" class="form-control input-sm" id="modificacion" name="modificacion">
						<p></p>
						<span id="btnAgregaLinea" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaLineasLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateLinea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Linea base </h4>
					</div>
					<div class="modal-body">
						<form id="frmLineasU" enctype="multipart/form-data">
							
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Predecesor Linea</label>
						<input type="text" class="form-control input-sm" id="predecesorU" name="predecesorU">
						<label>Fecha Inicio</label>
						<input type="text" class="form-control input-sm" id="fecha_inicioU" name="fecha_inicioU">
						<label>Fecha fin</label>
						<input type="text" class="form-control input-sm" id="fecha_finU" name="fecha_finU">
						<label>comentario</label>
						<input type="text" class="form-control input-sm" id="comentarioU" name="comentarioU">
						<label>Estado</label>
						<select  type="text" class="form-control input-sm" id="estadoU" name="estadoU">
						<option value="Activo" >Activo</option> 
						<option value="Pendiente">Pendiente</option> 
						<option value="Inactivo">Inactivo</option>
						<option value="Terminado">Terminado</option>
						</select>
						<p></p>
						<label>Modificación</label>
						<input type="text" class="form-control input-sm" id="modificacionU" name="modificacionU">
						<p></p>
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaLinea" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosLinea(idLinea){
			$.ajax({
				type:"POST",
				data:"idLinea=" + idLinea,
				url:"../procesos/lineas/obtenDatoslinea.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idLinea').val(dato['id_linea']);
					$('#nombreU').val(dato['nombre_linea']);
					$('#predecesorU').val(dato['predecesor_linea']);
					$('#fecha_inicioU').val(dato['fecha_inicio']);
					$('#fecha_finU').val(dato['fecha_fin']);
					$('#comentarioU').val(dato['comentario']);
					$('#estadoU').val(dato['estado']);
					$('#modificacionU').val(dato['modificacion']);


				}
			});
		}

		function eliminaLinea(idlinea){
			alertify.confirm('¿Desea eliminar esta Linea Base?', function(){ 
				$.ajax({
					type:"POST",
					data:"idlinea=" + idlinea,
					url:"../procesos/lineas/eliminarLinea.php",
					success:function(r){
						if(r!=1){
							$('#tablaLineasLoad').load("lineas/tablaLineas.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaLinea').click(function(){

				datos=$('#frmLineasU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/lineas/actualizaLineas.php",
					success:function(r){
						if(r!=1){
							$('#tablaLineasLoad').load("lineas/tablaLineas.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("Error al actualizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaLineasLoad').load("lineas/tablaLineas.php");

			$('#btnAgregaLinea').click(function(){

				vacios=validarFormVacio('frmLinea');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmLinea"));

				$.ajax({
					url: "../procesos/lineas/insertaLineas.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r != 1){
							$('#frmLinea')[0].reset();
							$('#tablaLineasLoad').load("lineas/tablaLineas.php");
							alertify.success("Agregado con exito :D");
						}else{
							alertify.error("Fallo al subir el archivo :(");
						}
					}
				});
				
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>