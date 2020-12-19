<h2>Ingresar Producto</h2>
<br>
<?php echo form_open('producto/add', array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="NombreProducto" class="col-md-4 control-label">Nombre Producto</label>
	<div class="col-md-4">
		<input type="text" maxlength="100" name="NombreProducto" value="<?php echo $this->input->post('NombreProducto'); ?>" class="form-control" id="NombreProducto" />
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
		<input type="number" step="any" min="0" name="Precio" value="<?php echo $this->input->post('Precio'); ?>" class="form-control" id="Precio" />
		<span class="text-danger"><?php echo form_error('Precio'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="IVA" class="col-md-4 control-label">IVA</label>
	<div class="col-md-4">
		<input type="number" step="any" name="IVA" min="0" value="<?php echo $this->input->post('IVA'); ?>" class="form-control" id="IVA" />
		<span class="text-danger"><?php echo form_error('IVA'); ?></span>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Insertar</button>
	</div>
</div>

<a href="<?php echo site_url('producto/'); ?>" class="btn btn-link">Regresar</a>

<?php echo form_close(); ?>