<?php

class M_admin extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function insertsapras($data)
    {
        $this->db->insert('barang', $data);
        return TRUE;
    }
    function tampil_sapras()
    {
        return $this->db->get('barang');
    }
    public function get($batas = NULL, $offset = NULL, $cari = NULL)
    {
        if ($batas != NULL) {
            $this->db->limit($batas, $offset);
        }
        if ($cari != NULL) {
            $this->db->or_like($cari);
        }
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result();
    }
    public function jumlah_row($search)
    {
        $this->db->or_like($search);
        $query = $this->db->get('barang');

        return $query->num_rows();
    }
}
