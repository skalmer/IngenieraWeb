<h2>Insertar Usuario</h2>
<br>
<?php echo form_open('usuario/add', array("class" => "form-horizontal")); ?>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<div class="form-group">
	<label for="Usuario" class="col-md-4 control-label">Usuario</label>
	<div class="col-md-4">
		<input type="text" maxlength="19" name="Usuario" value="<?php echo $this->input->post('Usuario'); ?>" class="form-control" id="Usuario" required />
		<span class="text-danger"><?php echo form_error('Usuario'); ?></span>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('#Usuario').on('keypress', function(e) {
			if (e.which == 32 || e.which == 59 || e.which == 58 || e.which == 34 || e.which == 39) {
				console.log('Space Detected');
				return false;
			}
		});
	});
</script>
<div class="form-group">
	<label for="Contraseña" class="col-md-4 control-label">Contraseña</label>
	<div class="col-md-4">
		<input type="password" minlength="4" name="Contraseña" value="<?php echo $this->input->post('Contraseña'); ?>" class="form-control" id="Contraseña" required />
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('#Contraseña').on('keypress', function(e) {
			if (e.which == 32 || e.which == 59 || e.which == 58 || e.which == 34 || e.which == 39) {
				console.log('Space Detected');
				return false;
			}
		});
	});
</script>
<div class="form-group">
	<label for="Correo" class="col-md-4 control-label">Correo</label>
	<div class="col-md-4">
		<input type="email" name="Correo" value="<?php echo $this->input->post('Correo'); ?>" class="form-control" id="Correo" required />
		<span class="text-danger"><?php echo form_error('Correo'); ?></span>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('#Correo').on('keypress', function(e) {
			if (e.which == 32 || e.which == 59 || e.which == 58 || e.which == 34 || e.which == 39) {
				console.log('Space Detected');
				return false;
			}
		});
	});
</script>

<div class="form-group">
	<div class="input-group-prepend">
		<label for="Rol" class="col-md-4 control-label">Rol</label>
	</div>
	<div class="col-md-4">
		<select name="Rol" value="<?php echo $this->input->post('Rol'); ?>" class="form-control custom-select" id="Rol">
			<option value="User">User</option>
			<option value="Admin">Admin</option>
		</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>
</div>

<a href="<?php echo site_url('usuario/'); ?>" class="btn btn-link">Regresar</a>

<?php echo form_close(); ?>