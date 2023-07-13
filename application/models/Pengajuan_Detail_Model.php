<?php 

class Pengajuan_Detail_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

	protected $_table = 'detail_pengajuan';

    public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_pengajuan($no_pengajuan){
		return $this->db->get_where($this->_table, ['no_pengajuan' => $no_pengajuan])->result();
	}

	public function hapus($no_pengajuan){
		return $this->db->delete($this->_table, ['no_pengajuan' => $no_pengajuan]);
	}

}