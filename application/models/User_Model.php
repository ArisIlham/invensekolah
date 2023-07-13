<?php 

class User_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

    public function Lihatuser(){	

		$query = $this->db->query("SELECT * FROM dt_user");

		return $query->result_array();

	}

	public function databagian(){	

		$query = $this->db->query("SELECT * FROM dt_bagian");

		return $query->result_array();

	}


    public function hapusprogres($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->delete('dt_progres');
        
    }

    public function hapus2($id)
    {
        $this->db->where('user_id',$id); 
        return $this->db->delete('dt_user');
        
    }


	public function ubah($user_id){	

		$query = $this->db->query("SELECT * FROM dt_bagian a, dt_user b where b.id=$user_id");

		return $query->row_array();

	}




	public function hapus($user_id){
		return $this->db->delete('dt_user', ['id' => $user_id]);
	}

    


    
    

    // public function getDokumenAktif($periode){
	// 	$query = $this->db->query("select Dokumen from Ang_Kontrol_Dokumen where Periode=$periode and isActive=1");
	// 	if($query->num_rows > 0){
	// 			$row =  $query->row_array();
	// 			return $row['Dokumen'];
	// 	}else{
	// 			return 0;
	// 	}
	// }

    // public function getDataLokasi($id)
	// {
	// 	$query = $this->db->query("SELECT KodeLokasi FROM Aset_peralatan_mesin Where Id=".$id);
	// 	//$query = $this->db->query("SELECT KodeLokasi FROM Aset_peralatan_mesin Where Id=".$id);

	// 	if($query->num_rows > 0){
	// 		return $query->row_array();
	// 	}else{
	// 		return false;
	// 	}		

	// }


    // public function fetchAlllokasi($parentid,$level){
	// 	$query = $this->db->query("SELECT lokasiid, kode, nama FROM gnr_lokasi_barang where Level=$level and parentid=$parentid");
	// 	if($query->num_rows > 0){
	// 			return $query->result_array();
	// 	}else{
	// 			return false;
	// 	}
	// }

}