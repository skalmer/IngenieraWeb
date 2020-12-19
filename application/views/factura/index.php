<header>
    <h2>Facturas</h2>
</header>
<div class="pull-left">
    <a href="<?php echo site_url('factura/add'); ?>" class="btn btn-success">Agregar Factura</a>
</div>
<div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Idfactura</th>
            <th>Cajero</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Cedula o Ruc</th>
        </tr>
        <?php foreach ($facturas as $f) { ?>
            <tr>
                <td><?php echo $f['idfactura']; ?></td>
                <td><?php echo $f['idUsuario']; ?></td>
                <td><?php echo $f['fecha']; ?></td>
                <td><?php echo $f['Cliente']; ?></td>
                <td><?php echo $f['Cedula_Ruc']; ?></td>
                <td>
                    <a href="<?php echo site_url('detalle_factura/index/' . $f['idfactura']); ?>" class="btn btn-success btn-xs">Detalle</a>
                    <a href="<?php echo site_url('factura/edit/' . $f['idfactura']); ?>" class="btn btn-info btn-xs">Editar</a>
                    <a href="<?php echo site_url('factura/remove/' . $f['idfactura']); ?>" class="btn btn-danger btn-xs">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div>
    <a href="<?php echo site_url('dashboard/login'); ?>" class="btn btn-link btn-medium">Regresar</a>
</div>