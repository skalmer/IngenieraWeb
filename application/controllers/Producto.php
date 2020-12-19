<?php
class Producto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
    }

    /*
     * Listing of productos
     */
    function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['productos'] = $this->Producto_model->get_all_productos();

            $data['_view'] = 'producto/index';
            $this->load->view('layouts/main', $data);
        } else {
            $dat['_view'] = 'dashboard1';
            $this->load->view('layouts/main', $dat);
        }
    }


    /*
     * Adding a new producto
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'NombreProducto' => $this->input->post('NombreProducto'),
                'Precio' => $this->input->post('Precio'),
                'IVA' => $this->input->post('IVA'),
            );

            $producto_id = $this->Producto_model->add_producto($params);
            redirect('producto/index');
        } else {
            $data['_view'] = 'producto/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a producto
     */
    function edit($idProductos)
    {
        $data['producto'] = $this->Producto_model->get_producto($idProductos);

        if (isset($data['producto']['idProductos'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'NombreProducto' => $this->input->post('NombreProducto'),
                    'Precio' => $this->input->post('Precio'),
                    'IVA' => $this->input->post('IVA'),
                );

                $this->Producto_model->update_producto($idProductos, $params);
                redirect('producto/index');
            } else {
                $data['_view'] = 'producto/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('El producto no existe.');
    }

    /*
     * Deleting producto
     */
    function remove($idProductos)
    {
        $producto = $this->Producto_model->get_producto($idProductos);

        // check if the producto exists before trying to delete it
        if (isset($producto['idProductos'])) {
            $this->Producto_model->delete_producto($idProductos);
            redirect('producto/index');
        } else
            show_error('El producto no existe.');
    }
}
