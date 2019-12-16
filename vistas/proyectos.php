<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Proyectos</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Proyectos</h1>
			<div class="row">
				<div class="col-sm-4">

	<!--frmCategorias nombre del formulario
	boton agregar su id es btnAgregaCategoria -->
					<form id="frmProyecto">1
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombre" id="nombre">
						<p></p>
						<label>Fecha Inicio</label>
						<input type="text" class="form-control input-sm" name="fecha_inicio" id="fecha_inicio">
						<p></p>
						<label>Fecha Fin</label>
						<input type="text" class="form-control input-sm" name="fecha_fin" id="fecha_fin">
						<p></p>
						<label>Estado</label>
						<select  type="text" class="form-control input-sm" id="estado" name="estado">
						<option value="Activo" >Activo</option> 
						<option value="Pendiente">Pendiente</option> 
						<option value="Inactivo">Inactivo</option>
						<option value="Terminado">Terminado</option>
						</select>
						<p></p>
						<span class="btn btn-primary" id="btnAgregaProyecto">Agregar</span>2
					</form>


				</div>
				<div class="col-sm-6">
					<div id="tablaProyectoLoad"></div>3
					<!--nombre de la tabla del ABM-->
				</div>
			</div>
		</div>




		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Proyecto</h4>
					</div>
					<div class="modal-body">
						<form id="frmProyectoU">
							<input type="text" hidden="" id="idproyectoU" name="idproyectoU">
							<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
						<p></p>
						<label>Fecha Inicio</label>
						<input type="text" class="form-control input-sm" name="fecha_inicioU" id="fecha_inicioU">
						<p></p>
						<label>Fecha Fin</label>
						<input type="text" class="form-control input-sm" name="fecha_finU" id="fecha_finU">
						<p></p>
						<label>Estado</label>
						<select  type="text" class="form-control input-sm" id="estadoU" name="estadoU">
						<option value="Activo" >Activo</option> 
						<option value="Pendiente">Pendiente</option> 
						<option value="Inactivo">Inactivo</option>
						</select>
						<p></p>
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaProyecto" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaProyectoLoad').load("proyecto/tablaProyectos.php");

			$('#btnAgregaProyecto').click(function(){

				vacios=validarFormVacio('frmProyecto'); 

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmProyecto').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/proyectos/agregaProyecto.php",
					success:function(r){
						if(r!=1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmProyecto')[0].reset();

					$('#tablaProyectoLoad').load("proyecto/tablaProyectos.php");
					alertify.success("Proyecto agregado con exito :D");
				}else{
					alertify.error("No se pudo agregar Proyecto");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaProyecto').click(function(){

				datos=$('#frmProyectoU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/proyectos/actualizaProyecto.php",
					success:function(r){
						if(r!=1){
							$('#tablaProyectoLoad').load("proyecto/tablaProyectos.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actaulizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
				function agregaDatosProyecto(idproyecto){

			$.ajax({
				type:"POST",
				data:"idproyecto=" + idproyecto,
				url:"../procesos/proyectos/obtenDatosProyecto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#idproyectoU').val(dato['id_proyecto']);
					$('#nombreU').val(dato['nombre_proyecto']);
					$('#fecha_inicioU').val(dato['fecha_inicio']);
					$('#fecha_finU').val(dato['fecha_fin']);
					$('#estadoU').val(dato['estado']);
				

				}
			});
		}

		function eliminarProyecto(idproyecto){
			alertify.confirm('¿Desea eliminar éste Proyecto?', function(){ 
				$.ajax({
					type:"POST",
					data:"idproyecto=" + idproyecto,
					url:"../procesos/proyectos/eliminarProyecto.php",
					success:function(r){
						if(r!=1){
							$('#tablaProyectoLoad').load("proyecto/tablaProyectos.php");
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
	<?php 
}else{
	header("location:../index.php");
}
?>