<h1>Insertar una Factura</h1>
<br>
<?php echo form_open('factura/add', array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="idUsuario" class="col-md-4 control-label">Cajero</label>

    <div class="col-md-4">
        <select name="idUsuario" value="<?php echo $this->input->post('idUsuario'); ?>" class="form-control custom-select" id="idUsuario">
            <?php foreach ($cajeros as $d) { ?>
                <option value="<?php echo  $d['idusuario']; ?>"><?php echo  $d['Usuario']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="fecha" class="col-md-4 control-label">Fecha</label>
    <div class="col-md-4">
        <input type="datetime-local" name="fecha" value="<?php echo $this->input->post('fecha'); ?>" class="form-control" id="fecha" required />
        <span class="text-danger"><?php echo form_error('fecha'); ?></span>
    </div>
</div>

<div class="form-group">
    <label for="Cliente" class="col-md-4 control-label">Cliente</label>
    <div class="col-md-4">
        <input type="text" name="Cliente" value="<?php echo $this->input->post('Cliente'); ?>" class="form-control" id="Cliente" required />
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#Cliente').on('keypress', function(e) {
            if (e.which == 32 || e.which == 59 || e.which == 58 || e.which == 34 || e.which == 39) {
                console.log('Space Detected');
                return false;
            }
        });
    });
</script>
<div class="form-group">
    <label for="Cedula_Ruc" class="col-md-4 control-label">Cedula o Ruc</label>
    <div class="col-md-4">
        <input type="number" onKeyDown="if(this.value.length==13) return false;" min="0" max="3000000000000" name="Cedula_Ruc" value="<?php echo $this->input->post('Cedula_Ruc'); ?>" class="form-control" id="Cedula_Ruc" required />
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>

<a href="<?php echo site_url('factura/'); ?>" class="btn btn-link">Regresar</a>

<?php echo form_close(); ?>