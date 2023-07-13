<?php

class Saprasku_Model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
	}

	public function Lihatsaprasku2()
	{

		$query = $this->db->query("SELECT * FROM dt_barang");

		return $query->result_array();
	}


	public function Lihatsaprasku($id)
	{


		if ($this->session->userdata('level') == '1') {
			$query = $this->db->query("SELECT * FROM dt_user a, dt_barang b where a.id=b.user_id");
		} else {
			$query = $this->db->query("SELECT * FROM dt_user a, dt_barang b where a.id=b.user_id and b.user_id=$id");
		}
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}







	public function ubah($id)
	{

		$query = $this->db->query("SELECT * FROM dt_barang where id=$id");

		return $query->row_array();
	}

	public function hapus($saprasku_id)
	{
		return $this->db->delete('dt_barang', ['id' => $saprasku_id]);
	}
}
