
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="select  pr.nombre_proyecto, lb.nombre_linea,lb.predecesor_linea,lb.fecha_inicio,lb.fecha_fin,lb.estado_linea,lb.comentario,lb.modificacion,lb.id_linea
			from linea_base lb 
			join proyectos pr on lb.id_proyecto=pr.id_proyecto;";
	$result=pg_query($conexion,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Lineas Bases</label></caption>
	<tr>
		<td>Proyecto</td>
		<td>Nombre</td>
		<td>Predecesor Linea</td>
		<td>Fecha Inicio</td>
		<td>Fecha fin</td>
		<td>Estado</td>
		<td>Modificaciones</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=pg_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		<td><?php echo $ver[7]; ?></td>

		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateLinea" class="btn btn-warning btn-xs" onclick="agregaDatosLinea('<?php echo $ver[8] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaLinea('<?php echo $ver[8] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>