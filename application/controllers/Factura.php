<?php

class Factura extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
    }

    /*
     * Listing of facturas
     */
    function index()
    {
        $data['facturas'] = $this->Factura_model->get_all_facturas();

        $data['_view'] = 'factura/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new factura
     */
    function add()
    {
        $this->load->model('Usuario_model');
        $data['cajeros'] = $this->Usuario_model->get_cajeros();

        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'idUsuario' => $this->input->post('idUsuario'),
                'fecha' => $this->input->post('fecha'),
                'Cliente' => $this->input->post('Cliente'),
                'Cedula_Ruc' => $this->input->post('Cedula_Ruc'),
            );

            $factura_id = $this->Factura_model->add_factura($params);
            redirect('factura/index');
        } else {
            $data['_view'] = 'factura/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a factura
     */
    function edit($idfactura)
    {
        // check if the factura exists before trying to edit it
        $data['factura'] = $this->Factura_model->get_factura($idfactura);
        $this->load->model('Usuario_model');
        $data['cajeros'] = $this->Usuario_model->get_cajeros();

        if (isset($data['factura']['idfactura'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'idUsuario' => $this->input->post('idUsuario'),
                    'fecha' => $this->input->post('fecha'),
                    'Cliente' => $this->input->post('Cliente'),
                    'Cedula_Ruc' => $this->input->post('Cedula_Ruc'),
                );

                $this->Factura_model->update_factura($idfactura, $params);
                redirect('factura/index');
            } else {
                $data['_view'] = 'factura/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('La factura no existe');
    }

    /*
     * Deleting factura
     */
    function remove($idfactura)
    {
        $factura = $this->Factura_model->get_factura($idfactura);

        // check if the factura exists before trying to delete it
        if (isset($factura['idfactura'])) {
            $this->Factura_model->delete_factura($idfactura);
            redirect('factura/index');
        } else
            show_error('La factura no existe');
    }
}
