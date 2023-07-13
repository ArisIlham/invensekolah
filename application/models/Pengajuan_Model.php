<?php 

class Pengajuan_Model extends CI_Model{

	public function __construct() {

        parent::__construct();

    }

    public function Lihatpengajuan(){	

		$query = $this->db->query("SELECT * FROM dt_pengajuan");

		return $query->result_array();

	}



	

	public function jumlah(){
		$query = $this->db->get('dt_pengajuan');
		return $query->num_rows();
	}

	public function lihat_no_pengajuan($no_pengajuan){
		return $this->db->get_where('dt_pengajuan', ['no_pengajuan' => $no_pengajuan])->row();
	}

	public function tambah($data){
		return $this->db->insert('dt_pengajuan', $data);
	}

	public function hapus($no_pengajuan){
		return $this->db->delete('dt_pengajuan', ['no_pengajuan' => $no_pengajuan]);
	}








	public function lihat_nama_barang($nama_barang){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get('dt_barang');
		return $query->row();
	}



	public function lihat2(){
		return $this->db->get('dt_pengajuan')->result();
	} 


	public function lihat(){	

		$query = $this->db->query("SELECT * FROM dt_user a, dt_pengajuan b where a.id=b.user_id");

		return $query->result();

	}




	public function pilihbarang(){
		return $this->db->get('dt_barang')->result();
	} 


  

	public function min_stok($stok, $nama_barang){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update('dt_barang');
		return $query;
	}


	public function approve($id)
	{	
		$aColumns = array(			
							'Is_Approve'		=>1,			
							
							);
	
		
		$this->db->trans_begin();
		$this->db->update('dt_pengajuan', $aColumns, array('no_pengajuan' => $id));

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
		}
		else
		{
			$this->db->trans_commit();
		}

	}



    


    
    

}