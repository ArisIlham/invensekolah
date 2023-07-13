<?php 

class Laporan_Peminjaman_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

	

	function manualQuery($q)
	{
		return $this->db->query($q);
	}


   
}