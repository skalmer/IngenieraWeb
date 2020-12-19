<?php
class Comparacion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comparacion_model');
    }

    function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            //$data['productos'] = $this->Producto_model->get_all_productos();

            $data['_view'] = 'comparacion/index';
            $this->load->view('layouts/main', $data);
        } else {
            $dat['_view'] = 'dashboard1';
            $this->load->view('layouts/main', $dat);
        }
    }
    function compara()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'fecha1' => $this->input->post('fecha1'),
                'fecha2' => $this->input->post('fecha2'),
            );
            $params2 = array(
                'fecha1' => $this->input->post('fecha3'),
                'fecha2' => $this->input->post('fecha4')
            );
            $data['facturas1'] = $this->Comparacion_model->compara_fechas($params);
            $data['facturas2'] = $this->Comparacion_model->compara_fechas($params2);
            $data['fecha1'] = $params;
            $data['fecha2'] = $params2;
            $data['_view'] = 'comparacion/resultado';
            $this->load->view('layouts/main', $data);
        } else {
            $data['_view'] = 'comparacion/index';
            $this->load->view('layouts/main', $data);
        }
    }
}
