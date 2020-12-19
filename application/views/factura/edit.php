<?php echo form_open('factura/edit/' . $factura['idfactura'], array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="idUsuario" class="col-md-4 control-label">IdUsuario</label>

    <div class="col-md-4">
        <select name="idUsuario" value="<?php echo ($this->input->post('idUsuario') ? $this->input->post('idUsuario') : $factura['idUsuario']); ?>" class="form-control custom-select" id="idUsuario">
            <option selected value=" <?php echo ($this->input->post('idUsuario') ? $this->input->post('idUsuario') : $factura['idUsuario']); ?>"><?php echo ($this->input->post('idUsuario') ? $this->input->post('idUsuario') : $factura['idUsuario']); ?></option>
            <?php foreach ($cajeros as $d) { ?>
                <option value="<?php echo  $d['idusuario']; ?>"><?php echo  $d['Usuario']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="fecha" class="col-md-4 control-label">Fecha</label>
    <div class="col-md-4">
        <input type="datetime" name="fecha" value="<?php echo ($this->input->post('fecha') ? $this->input->post('fecha') : $factura['fecha']); ?>" class="form-control" id="fecha" required />
        <span class="text-danger"><?php echo form_error('fecha'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="Cliente" class="col-md-4 control-label">Cliente</label>
    <div class="col-md-4">
        <input type="text" name="Cliente" maxlength="50" value="<?php echo ($this->input->post('Cliente') ? $this->input->post('Cliente') : $factura['Cliente']); ?>" class="form-control" id="Cliente" required />
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
        <input type="number" maxlength="12" name="Cedula_Ruc" value="<?php echo ($this->input->post('Cedula_Ruc') ? $this->input->post('Cedula_Ruc') : $factura['Cedula_Ruc']); ?>" class="form-control" id="Cedula_Ruc" required />
        <span class="text-danger"><?php echo form_error('Cedula_Ruc'); ?></span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Modificar</button>
    </div>
</div>

<?php echo form_close(); ?>