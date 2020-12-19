<div class="pull-left">
    <a href="<?php echo site_url('comparacion/index'); ?>" class="btn btn-success">Nueva Comparacion</a>
</div>
<br>
<div class="container">
    <table class="table table-striped table-bordered">
        <tr>
            <th>Fecha</th>
            <th>Numero de Facturas</th>
            <th>Productos Top</th>
            <th>Total</th>
            <th>Opciones</th>
        </tr>

        <tr>
            <td><?php echo 'De ' . $fecha1['fecha1'] . ' a ' . $fecha1['fecha2']; ?></td>
            <td><?php echo $facturas1['numero']; ?></td>
            <td><?php echo '1. ' . $facturas1['top1'] ?><br> <?php echo '2. ' . $facturas1['top2']; ?></td>
            <td><?php echo $facturas1['total']; ?></td>
            <td>
                <a href="<?php echo site_url('detalle_factura/detalles/' . $fecha1['fecha1'] . '_' . $fecha1['fecha2']); ?>" class="btn btn-info btn-xs">detalles</a>
            </td>
        </tr>
        <tr>
            <td><?php echo 'De ' . $fecha2['fecha1'] . ' a ' . $fecha2['fecha2']; ?></td>
            <td><?php echo $facturas2['numero']; ?></td>
            <td><?php echo '1. ' . $facturas2['top1'] ?><br> <?php echo '2. ' . $facturas2['top2']; ?></td>
            <td><?php echo $facturas2['total']; ?></td>
            <td>
                <a href="<?php echo site_url('detalle_factura/detalles/' . $fecha2['fecha1'] . '_' . $fecha2['fecha2']); ?>" class="btn btn-info btn-xs">detalles</a>
            </td>
        </tr>

    </table>
</div>
<br>
<div class="col-sm-offset-6 col-sm-4">
    <a href="<?php echo site_url('dashboard/login'); ?>" class="btn btn-primary">Imprimir</a>
</div>