<h2>Editar Producto</h2>
<br>
<?php echo form_open('producto/edit/' . $producto['idProductos'], array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="NombreProducto" class="col-md-4 control-label">NombreProducto</label>
	<div class="col-md-4">
		<input type="text" maxlength="100" name="NombreProducto" value="<?php echo ($this->input->post('NombreProducto') ? $this->input->post('NombreProducto') : $producto['NombreProducto']); ?>" class="form-control" id="NombreProducto" required />
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('#NombreProducto').on('keypress', function(e) {
			if (e.which == 32 || e.which == 59 || e.which == 58 || e.which == 34 || e.which == 39) {
				console.log('Space Detected');
				return false;
			}
		});
	});
</script>
<div class="form-group">
	<label for="Precio" class="col-md-4 control-label">Precio</label>
	<div class="col-md-4">
		<input type="number" step="any" min="0" name="Precio" value="<?php echo ($this->input->post('Precio') ? $this->input->post('Precio') : $producto['Precio']); ?>" class="form-control" id="Precio" required />
		<span class="text-danger"><?php echo form_error('Precio'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="IVA" class="col-md-4 control-label">IVA</label>
	<div class="col-md-4">
		<input type="number" step="any" min="0" name="IVA" value="<?php echo ($this->input->post('IVA') ? $this->input->post('IVA') : $producto['IVA']); ?>" class="form-control" id="IVA" required />
		<span class="text-danger"><?php echo form_error('IVA'); ?></span>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Modificar</button>
	</div>
</div>

<?php echo form_close(); ?>