<?php 

class Helpdesk_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

    public function Lihathelpdesk2(){	

		$query = $this->db->query("SELECT * FROM dt_user a,dt_helpdesk b, dt_barang c where a.id=b.user_id and b.id_barang=c.id");

		return $query->result_array();

	}

    public function Lihathelpdesk($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT * FROM dt_user a,dt_helpdesk b, dt_barang c where a.id=b.user_id and b.id_barang=c.id");
		}else{
			$query = $this->db->query("SELECT * FROM dt_user a,dt_helpdesk b, dt_barang c where a.id=b.user_id and b.id_barang=c.id and b.user_id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->result_array();
		 }else{
		 return false;
		 }
	}



    public function hapusprogres($id)
    {
        $this->db->where('helpdesk_id',$id);
        return $this->db->delete('dt_progres');
        
    }

    public function hapus2($id)
    {
        $this->db->where('helpdesk_id',$id); 
        return $this->db->delete('dt_helpdesk');
        
    }


	public function ubah($helpdesk_id){	

		$query = $this->db->query("SELECT * FROM dt_user a,dt_helpdesk b, dt_barang c where a.id=b.user_id and b.id_barang=c.id and b.helpdesk_id=$helpdesk_id");

		return $query->row_array();

	}

	public function hapus($helpdesk_id){
		return $this->db->delete('dt_helpdesk', ['helpdesk_id' => $helpdesk_id]);
	}

    


    public function pilihbarang(){
		return $this->db->get('dt_barang')->result();
	} 

}