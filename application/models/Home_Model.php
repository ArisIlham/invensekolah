<?php

class Home_Model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
	}

	public function Lihatuser()
	{

		$query = $this->db->query("SELECT * FROM dt_user");

		return $query->result_array();
	}

	public function databagian()
	{

		$query = $this->db->query("SELECT * FROM dt_bagian");

		return $query->result_array();
	}

	public function simpan_helpdesk($data)
	{
		$this->db->insert('dt_helpdesk', $data);
	}
}
