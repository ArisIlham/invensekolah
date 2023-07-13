<?php 

class Peminjaman_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }




	public function Lihatpeminjaman($id){	


		if ($this->session->userdata('level') == '1' ){
			$query = $this->db->query("SELECT * FROM dt_user a, dt_barang b, dt_peminjaman c where a.id=c.user_id and b.id=c.id_barang");
		}else{
			$query = $this->db->query("SELECT * FROM dt_user a, dt_barang b, dt_peminjaman c where a.id=c.user_id and b.id=c.id_barang and c.user_id=$id");
		}
		if($query->num_rows() > 0) 
		 {
	        return $query->result_array();
		 }else{
		 return false;
		 }
	}





	public function databarang(){	

		$query = $this->db->query("SELECT * FROM dt_barang");

		return $query->result_array();

	}

	public function stokawal($id){	

		$query = $this->db->query("SELECT stok FROM dt_barang where id=$id");

		return $query->row();

	}

	public function ambilpeminjaman(){	

		$query = $this->db->query("SELECT jumlah_pinjam FROM dt_peminjaman order by peminjaman_id desc limit 1");

		return $query->result_array();

	}


	public function stokbalik($idbalik){	

		$query = $this->db->query("SELECT stok FROM dt_barang where id=$idbalik");

		return $query->row();

	}

	public function balikinpeminjaman($id){	

		$query = $this->db->query("SELECT jumlah_pinjam FROM dt_peminjaman where peminjaman_id=$id");

		return $query->result_array();

	}



	public function ubah($peminjaman_id){	

		$query = $this->db->query("SELECT b.id_barang,c.id,c.nama_barang,b.peminjaman_id,b.jumlah_pinjam,b.tgl_pinjam,b.tgl_kembali,(CASE 
		WHEN b.status = 1 THEN 'Sedang Dipinjam'
		WHEN b.status = 2 THEN 'Sudah Dikembalikan'
		END) AS statuspinjam  FROM dt_user a, dt_peminjaman b, dt_barang c where a.id=b.user_id and b.id_barang=c.id and peminjaman_id=$peminjaman_id");

		return $query->row_array();

	}

	public function hapus($peminjaman_id){
		return $this->db->delete('dt_peminjaman', ['peminjaman_id' => $peminjaman_id]);
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