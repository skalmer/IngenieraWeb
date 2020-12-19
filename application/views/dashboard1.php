<div class="text-center">
	<h1>CRUD con Code Igniter</h1>
	<br>
	<h2>Inicie sesion como Administrador</h2>
	<br>
	<?php echo form_open('dashboard/login', array("class" => "form-horizontal")); ?>
	<div>
		<div class="form-group">
			<label for="Usuario" class="col-md-4 control-label">Usuario:</label>
			<div class="col-md-6">
				<input type="text" name="Usuario" value="<?php echo $this->input->post('Usuario'); ?>" class="form-control" id="Usuario" placeholder="Usuario" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="Contraseña" class="col-md-4 control-label">Contraseña:</label>
		<div class="col-md-6">
			<input type="password" name="Contraseña" value="<?php echo $this->input->post('Contraseña'); ?>" class="form-control" id="Contraseña" placeholder="Password" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-success">Ingresar</button>
		</div>
	</div>
	<?php echo form_close(); ?>

</div>