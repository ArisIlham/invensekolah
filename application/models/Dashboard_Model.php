<?php 

class Dashboard_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

    public function Lihatuser(){	

		$query = $this->db->query("SELECT * FROM dt_user");

		return $query->result_array();

	}


	public function totalpinjam($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT count(peminjaman_id) as jumlah FROM dt_peminjaman");
		}else{
			$query = $this->db->query("SELECT count(peminjaman_id) as jumlah FROM dt_peminjaman where user_id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->row_array();
		 }else{
		 return false;
		 }
	}


	public function totalhelpdesk($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT count(helpdesk_id) as jumlah FROM dt_helpdesk");
		}else{
			$query = $this->db->query("SELECT count(helpdesk_id) as jumlah FROM dt_helpdesk where user_id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->row_array();
		 }else{
		 return false;
		 }
	}


	public function totalpengajuan($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT count(id) as jumlah FROM dt_pengajuan");
		}else{
			$query = $this->db->query("SELECT count(id) as jumlah FROM dt_pengajuan where user_id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->row_array();
		 }else{
		 return false;
		 }
	}


	public function totalbarang($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT count(id) as jumlah FROM dt_barang");
		}else{
			$query = $this->db->query("SELECT count(id) as jumlah FROM dt_barang where id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->row_array();
		 }else{
		 return false;
		 }
	}

    
    

}