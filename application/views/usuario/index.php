<h1>Listado de Usuarios</h1>
<br>
<br>
<div class="pull-left">
	<a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success">Agregar Usuario</a>
</div>

<table class="table table-striped table-bordered">
	<tr>
		<th>Id</th>
		<th>Contraseña</th>
		<th>Usuario</th>
		<th>Correo</th>
		<th>Rol</th>
	</tr>
	<?php foreach ($usuarios as $u) { ?>
		<tr>
			<td><?php echo $u['idusuario']; ?></td>
			<td><?php echo $u['Contraseña']; ?></td>
			<td><?php echo $u['Usuario']; ?></td>
			<td><?php echo $u['Correo']; ?></td>
			<td><?php echo $u['Rol']; ?></td>
			<td>
				<a href="<?php echo site_url('usuario/edit/' . $u['idusuario']); ?>" class="btn btn-info btn-xs">Editar</a>
				<a href="<?php echo site_url('usuario/remove/' . $u['idusuario']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
			</td>
		</tr>
	<?php } ?>
</table>
<br>
<a href="<?php echo site_url('dashboard/login'); ?>" class="btn btn-link">Regresar</a>