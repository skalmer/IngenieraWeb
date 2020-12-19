<?php
class Comparacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get factura by idfactura
     */
    function get_factura($idfactura)
    {
        return $this->db->get_where('factura', array('idfactura' => $idfactura))->row_array();
    }

    /*
     * Get all facturas
     */
    function get_all_facturas()
    {
        $this->db->order_by('idfactura', 'asc');
        return $this->db->get('factura')->result_array();
    }

    /*
     * function to add new factura
     */
    function add_factura($params)
    {
        $this->db->insert('factura', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update factura
     */
    function update_factura($idfactura, $params)
    {
        $this->db->where('idfactura', $idfactura);
        return $this->db->update('factura', $params);
    }

    /*
     * function to delete factura
     */
    function delete_factura($idfactura)
    {
        return $this->db->delete('factura', array('idfactura' => $idfactura));
    }
    function compara_fechas($fecha)
    {
        $this->load->model('Producto_model');
        $this->load->model('Detalle_factura_model');
        $query  = $this->db->select('*')
            ->from('factura')
            ->where('fecha BETWEEN "' . $fecha['fecha1'] . '" and "' . $fecha['fecha2'] . '"')
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
        $data['numero'] = $j;

        $detalles1 = $this->db->select('*')
            ->from('detalle_factura')
            ->where('idFactura =' . $detalles)
            ->order_by('idProducto')
            ->get();
        $detalles = $detalles1->result_array();
        $total = 0.0;

        $aux = 0;
        $aux2 = 0;
        $aux3 = 0;
        $auxid2 = 0;
        $auxid1 = 0;
        foreach ($detalles as $d) {
            $id = $d['idProducto'];
            if ($id != $aux3) {
                $aux2 = 0;
                $aux3 = $id;
            }
            $aux2 = $aux2 + $d['Cantidad'];
            if ($aux2 >= $aux) {
                if ($auxid1 != $aux3) {
                    $aux = $aux2;
                    $auxid2 = $auxid1;
                    $auxid1 = $aux3;
                }
            }

            $total = $total + ($this->Producto_model->get_precio($d['idProducto'])['Precio'] * $d['Cantidad']);
            $i = $i + 1;
        }
        $data['top1'] = $this->Producto_model->get_nombre($auxid1)['NombreProducto'];
        if ($auxid2 === 0) {
            $data['top2'] = "No existe otro producto";
        } else
            $data['top2'] = $this->Producto_model->get_nombre($auxid2)['NombreProducto'];
        $data['total'] = $total;
        return $data;
    }
}
