<?php
class Factura_model extends CI_Model
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
        $this->load->model('Usuario_model');
        $query  = $this->db->select('*')
            ->from('factura')
            ->get();
        $datos = $query->result_array();
        $i = 0;
        foreach ($datos as $d) {
            $datos[$i]['idUsuario'] = $this->Usuario_model->get_nombre($d['idUsuario'])['Usuario'];
            $i = $i + 1;
        }
        return $datos;
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
}
