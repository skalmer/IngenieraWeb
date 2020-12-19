<?php echo form_open('comparacion/compara', array("class" => "form-horizontal")); ?>
<!doctype html>
<html lang="en">

<head>
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>

<body>
    <h1 class="text-center">Comparación de Facturas</h1>
    <br>
    <div class="container">
        <p>
            <h3 class="pull-left">Fecha 1</h3>
        </p>

        <div class="container pull-left">
            <div class='col-xs-3'>
                <div class="form-group">
                    <div class='input-group date' id='fecha1'>
                        <input type='text' name='fecha1' value="<?php echo $this->input->post('fecha1'); ?>" class="form-control" id="fecha1" required />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-xs-3'>
                <div class="form-group">
                    <div class='input-group date' id='fecha2'>
                        <input type='text' name='fecha2' value="<?php echo $this->input->post('fecha2'); ?>" class="form-control" id="fecha2" required />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $('#fecha1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                $('#fecha2').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
            });
        </script>
    </div>
    <div class="container">
        <h3> Fecha 2</h3>
        <div class="pull-left">
            <div class="container pull-left">
                <div class='col-xs-3'>
                    <div class="form-group">
                        <div class='input-group date' id='fecha3'>
                            <input type='text' name='fecha3' value="<?php echo $this->input->post('fecha3'); ?>" class="form-control" id="fecha3" required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='col-xs-3'>
                    <div class="form-group">
                        <div class='input-group date' id='fecha4'>
                            <input type='text' name='fecha4' value="<?php echo $this->input->post('fecha4'); ?>" class="form-control" id="fecha4" required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function() {
                    $('#fecha3').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                    $('#fecha4').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                });
            </script>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-4">
                <button type="submit" class="btn btn-success">Comparar</button>
            </div>
        </div>
    </div>
</body>
<?php echo form_close(); ?>
<br>
<a href="<?php echo site_url('dashboard/login'); ?>" class="btn btn-link">Regresar</a>