<?php 

namespace App\Models;
use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'dt_ruangan';

    public function LihatRuangan()
    {
        return $this->findAll();
    }

    public function SimpanRuangan($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function UbahRuangan($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('RuanganId' => $id));
        return $query;
    }

    public function HapusRuangan($id)
    {
        $query = $this->db->table($this->table)->delete(array('RuanganId' => $id));
        return $query;
    } 
}