<h1>Listado de Productos</h1>
<br>
<div class="pull-left">
	<a href="<?php echo site_url('producto/add'); ?>" class="btn btn-success">Add</a>
</div>
<br>
<table class="table table-striped table-bordered">
	<tr>
		<th>IdProductos</th>
		<th>Nombre Producto</th>
		<th>Precio</th>
		<th>IVA</th>
		<th>Opciones</th>
	</tr>
	<?php foreach ($productos as $p) { ?>
		<tr>
			<td><?php echo $p['idProductos']; ?></td>
			<td><?php echo $p['NombreProducto']; ?></td>
			<td><?php echo $p['Precio']; ?></td>
			<td><?php echo $p['IVA']; ?></td>
			<td>
				<a href="<?php echo site_url('producto/edit/' . $p['idProductos']); ?>" class="btn btn-info btn-xs">Edit</a>
				<a href="<?php echo site_url('producto/remove/' . $p['idProductos']); ?>" class="btn btn-danger btn-xs">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<br>
<a href="<?php echo site_url('dashboard/login'); ?>">Regresar</a>