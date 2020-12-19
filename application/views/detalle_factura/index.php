<header>
    <h2>Detalle de Facturas</h2>
</header>
<div class="pull-left">
    <a href="<?php echo site_url('detalle_factura/add/' . $referencia); ?>" class="btn btn-success">Add</a>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>Detalle Factura #</th>
        <th>Factura</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Unitario</th>
        <th>Precio</th>
    </tr>
    <?php $total = 0; ?>
    <?php foreach ($detalle_factura as $d) { ?>
        <tr>
            <td><?php echo $d['iddetalle_factura']; ?></td>
            <td><?php echo $d['idFactura']; ?></td>
            <td><?php echo $d['idProducto']; ?></td>
            <td><?php echo $d['Cantidad']; ?></td>
            <td><?php echo $d['Precio'];  ?></td>
            <td><?php echo ($d['Precio'] * $d['Cantidad']);  ?></td>
            <?php $total = $total + ($d['Cantidad'] * $d['Precio']); ?>
            <td>
                <a href="<?php echo site_url('detalle_factura/edit/' . $d['iddetalle_factura']); ?>" class="btn btn-info btn-xs">Editar</a>
                <a href="<?php echo site_url('detalle_factura/remove/' . $d['iddetalle_factura']); ?>" class="btn btn-danger btn-xs">Borrar</a>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Total</b></td>
        <td><?php echo $total ?></td>
    </tr>
</table>
<div>
    <a href="<?php echo site_url('factura/index/'); ?>" class="btn btn-link btn-medium">Regresar</a>
</div>