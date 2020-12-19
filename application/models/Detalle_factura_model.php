<?php

class Detalle_factura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get detalle_factura by iddetalle_factura
     */
    function get_factura($idfactura)
    {
        $this->load->model('Producto_model');
        $query  = $this->db->select('*')
            ->from('detalle_factura')
            ->where('idfactura', $idfactura)
            ->get();
        $datos = $query->result_array();
        $i = 0;
        foreach ($datos as $d) {
            $aux = $this->Producto_model->get_nombre($d['idProducto'])['NombreProducto'];
            $datos[$i]['Precio'] = $this->Producto_model->get_precio($d['idProducto'])['Precio'];
            $datos[$i]['idProducto'] = $aux;
            $i = $i + 1;
        }
        return $datos;
    }

    function get_detalle_factura($iddetalle_factura)
    {
        return $this->db->get_where('detalle_factura', array('iddetalle_factura' => $iddetalle_factura))->row_array();
    }

    /*
     * Get all detalle_factura
     */
    function get_all_detalle_factura()
    {
        $this->db->order_by('iddetalle_factura', 'asc');
        return $this->db->get('detalle_factura')->result_array();
    }

    /*
     * function to add new detalle_factura
     */
    function add_detalle_factura($params)
    {
        $this->db->insert('detalle_factura', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update detalle_factura
     */
    function update_detalle_factura($iddetalle_factura, $params)
    {
        $this->db->where('iddetalle_factura', $iddetalle_factura);
        return $this->db->update('detalle_factura', $params);
    }

    /*
     * function to delete detalle_factura
     */
    function delete_detalle_factura($iddetalle_factura)
    {
        return $this->db->delete('detalle_factura', array('iddetalle_factura' => $iddetalle_factura));
    }

    function get_detalles($param)
    {
        $this->load->model('Producto_model');
        $query  = $this->db->select('*')
            ->from('factura')
            ->where('fecha BETWEEN "' . $param[0] . '" and "' . $param[1] . '"')
            ->get();
        $datos = $query->result_array();

        $i = 0;
        $j = 0;
        $detalles = "";
        foreach ($datos as $r) {
            $detalles = $detalles . " " . $r['idfactura'];
            $j = $j + 1;
            if (sizeof($datos) > $j) {
                $detalles = $detalles . " or idFactura=";
            }
        }
        $query = $this->db->select('*')
            ->from('detalle_factura')
            ->where('idFactura =' . $detalles)
            ->order_by('idFactura')
            ->get();
        $datos = $query->result_array();

        foreach ($datos as $d) {
            $aux = $this->Producto_model->get_nombre($d['idProducto'])['NombreProducto'];
            $datos[$i]['Precio'] = $this->Producto_model->get_precio($d['idProducto'])['Precio'];
            $datos[$i]['idProducto'] = $aux;
            $i = $i + 1;
        }
        return $datos;
    }
}
