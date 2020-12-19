<?php

class Detalle_factura extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detalle_factura_model');
    }

    /*
     * Listing of detalle_factura
     */
    function index($idfactura)
    {
        $data['detalle_factura'] = $this->Detalle_factura_model->get_factura($idfactura);
        $data['referencia'] = $idfactura;
        $data['_view'] = 'detalle_factura/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new detalle_factura
     */
    function add($idfactura)
    {
        $this->load->model('Producto_model');
        $data['productos'] = $this->Producto_model->get_all_productos();
        $data['factura'] = $idfactura;

        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'idFactura' => $this->input->post('idFactura'),
                'idProducto' => $this->input->post('idProducto'),
                'Cantidad' => $this->input->post('Cantidad'),
            );

            $detalle_factura_id = $this->Detalle_factura_model->add_detalle_factura($params);
            redirect('factura/index');
        } else {
            $data['_view'] = 'detalle_factura/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a detalle_factura
     */
    function edit($iddetalle_factura)
    {
        $data['detalle_factura'] = $this->Detalle_factura_model->get_detalle_factura($iddetalle_factura);
        $this->load->model('Producto_model');
        $data['productos'] = $this->Producto_model->get_all_productos();

        if (isset($data['detalle_factura']['iddetalle_factura'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'idFactura' => $this->input->post('idFactura'),
                    'idProducto' => $this->input->post('idProducto'),
                    'Cantidad' => $this->input->post('Cantidad'),
                );

                $this->Detalle_factura_model->update_detalle_factura($iddetalle_factura, $params);
                redirect('factura/index');
            } else {
                $data['_view'] = 'detalle_factura/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('El detalle no existe.');
    }

    /*
     * Deleting detalle_factura
     */
    function remove($iddetalle_factura)
    {
        $detalle_factura = $this->Detalle_factura_model->get_detalle_factura($iddetalle_factura);

        // check if the detalle_factura exists before trying to delete it
        if (isset($detalle_factura['iddetalle_factura'])) {
            $this->Detalle_factura_model->delete_detalle_factura($iddetalle_factura);
            redirect('factura/index');
        } else
            show_error('El detalle no existe.');
    }

    function detalles($fecha1)
    {
        $params = explode('_', $fecha1);
        $data['detalles'] = $this->Detalle_factura_model->get_detalles($params);
        $data['_view'] = 'detalle_factura/detalles';
        $this->load->view('layouts/main', $data);
    }
}
