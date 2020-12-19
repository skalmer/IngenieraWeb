<header>
    <h2>Detalles de Facturas</h2>
</header>

<div class="container">
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
        <?php foreach ($detalles as $d) { ?>
            <tr>
                <td><?php echo $d['iddetalle_factura']; ?></td>
                <td><?php echo $d['idFactura']; ?></td>
                <td><?php echo $d['idProducto']; ?></td>
                <td><?php echo $d['Cantidad']; ?></td>
                <td><?php echo $d['Precio'];  ?></td>
                <td><?php echo ($d['Precio'] * $d['Cantidad']);  ?></td>
                <?php $total = $total + ($d['Cantidad'] * $d['Precio']); ?>
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

    <div class="pull-left">
        <a href="<?php echo site_url('comparacion/index'); ?>" class="btn btn-success">Nueva Comparacion</a>
    </div>
</div>