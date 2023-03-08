<?php

class M_admin extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function insertsapras($Data)
    {
        $this->db->Insert('barang', $Data);
    }
    function tampil_sapras()
    {
        return $this->db->get('barang');
    }
}
