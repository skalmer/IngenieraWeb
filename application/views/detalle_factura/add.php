<?php echo form_open('detalle_factura/add/' . $factura, array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="idFactura" class="col-md-4 control-label">IdFactura</label>
    <div class="col-md-4">
        <input type="number" min="1" name="idFactura" value="<?php echo ($this->input->post('idFactura') ? $this->input->post('idFactura') : $factura); ?>" class="form-control" id="idFactura" required />
    </div>
</div>

<div class="form-group">
    <label for="idProducto" class="col-md-4 control-label">Producto</label>
    <div class="col-md-4">
        <select name="idProducto" value="<?php echo $this->input->post('idProducto'); ?>" class="form-control custom-select" id="idProducto">
            <?php foreach ($productos as $d) { ?>
                <option value="<?php echo  $d['idProductos']; ?>"><?php echo  $d['NombreProducto']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="Cantidad" class="col-md-4 control-label">Cantidad</label>
    <div class="col-md-4">
        <input type="number" min="1" name="Cantidad" value="<?php echo $this->input->post('Cantidad'); ?>" class="form-control" id="Cantidad" required />
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>

<?php echo form_close(); ?>