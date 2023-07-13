<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Peminjaman_Model');
		$this->load->library('session');
	}

	public function index()
	{

		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
		$level		    = $this->session->userdata('level');


		$data = array(
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
			'level'			    => $level,
			'datapeminjaman'	=> $this->Peminjaman_Model->Lihatpeminjaman($id)
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/peminjaman/index', $data);
		$this->load->view('layout/footer');
	}


	public function tambah()
	{
		//$this->load->library('session'); 

		$id		= $this->session->userdata('id');
		$data = array(
			'databarang'		=> $this->Peminjaman_Model->databarang(),
			'userid'			=> $id
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/peminjaman/tambah', $data);
		$this->load->view('layout/footer');
	}

	public function simpan()
	{
		$id =  $this->input->post("id_barang");

		$data = array(
			'user_id'      	   => $this->input->post('user_id'),
			'id_barang'        => $this->input->post('id_barang'),
			'jumlah_pinjam'    => $this->input->post('jumlah_pinjam'),
			'tgl_pinjam'       => $this->input->post('tgl_pinjam'),
			'tgl_kembali'      => $this->input->post('tgl_kembali'),
			'status'      	   => 1,

		);

		$this->db->insert('dt_peminjaman', $data);

		$ambilpeminjaman = $this->Peminjaman_Model->ambilpeminjaman();

		$stokawal = $this->Peminjaman_Model->stokawal($id);
		if ($stokawal > 0 && $stokawal > $ambilpeminjaman) {
			$hitung = (int)$stokawal->stok - (int)$ambilpeminjaman;

			$this->db->where("id", $id);
			$this->db->update("dt_barang",  array('stok' => $hitung));
		} else {
			echo "<script>alert('gabisa uy');</script>";
		}
		redirect('peminjaman');
	}



	public function ubahsimpan()
	{
		$id =  $this->input->post("peminjaman_id");
		$idbalik =  $this->input->post('id_barang');


		if ($this->session->userdata('level') == '1') { // Jika role-nya admin  


			$data = array(
				//'user_id'      	   => $this->input->post('user_id'),
				'id_barang'        => $this->input->post('id_barang'),
				'jumlah_pinjam'    => $this->input->post('jumlah_pinjam'),
				'tgl_pinjam'       => $this->input->post('tgl_pinjam'),
				'tgl_kembali'      => $this->input->post('tgl_kembali'),
				'status'      	   => $this->input->post('status'),
			);
		} else {

			$data = array(
				//'user_id'      	   => $this->input->post('user_id'),
				'id_barang'      	=> $this->input->post('id_barang'),
				'jumlah_pinjam'    => $this->input->post('jumlah_pinjam'),
				'tgl_pinjam'       => $this->input->post('tgl_pinjam'),
				'tgl_kembali'      => $this->input->post('tgl_kembali'),
			);
		}



		//$this->db->insert('dt_peminjaman',$data); 
		$this->db->where("peminjaman_id", $id);
		$this->db->update("dt_peminjaman", $data);




		$ambilpeminjaman = $this->Peminjaman_Model->balikinpeminjaman($id);

		$stokawal = $this->Peminjaman_Model->stokbalik($idbalik);

		$hitung = (int)$stokawal->stok + (int)$ambilpeminjaman;

		$this->db->where("id", $idbalik);
		$this->db->update("dt_barang",  array('stok' => $hitung));



		redirect('peminjaman');
	}





	public function simpan2()
	{
		//$id =  $this->input->post("pengaturan_id");
		$nama_gambar = null;

		$upload_logo = $_FILES['gambar']['name'];
		if ($upload_logo) {
			// setting konfigurasi upload
			$nmfile = "gambar";
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
			$config['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config);
			// upload gambar 
			if ($this->upload->do_upload('gambar')) {

				//$this->db->set('foto11', $data1['upload_data']['file_name']);
				$result1 = $this->upload->data();
				$result = array('gambar' => $result1);
				$data_gambar = array('image_metadata' => $this->upload->data());
				$nama_gambar = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("failed", " Gagal Insert Data ! " . $this->upload->display_errors());
				redirect(base_url('peminjaman'));
			}
		}

		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'nomor' => $this->input->post('nomor'),
			'jumlah' => $this->input->post('jumlah'),
			'status' => $this->input->post('status'),
			'gambar' => $nama_gambar,
		);

		$this->db->insert('dt_peminjaman', $data);
		// $this->db->where("peminjaman_id", $id);   
		// $this->db->update("dt_peminjaman", $data);      
		redirect('peminjaman');
	}





	public function ubah($peminjaman_id)
	{

		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
		$level		    = $this->session->userdata('level');

		$data = array(
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
			'level'			    => $level,
			'edit'		        => $this->Peminjaman_Model->ubah($peminjaman_id),
			'databarang'		=> $this->Peminjaman_Model->databarang(),
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/peminjaman/edit', $data);
		$this->load->view('layout/footer');
	}






	public function hapus($peminjaman_id)
	{
		if ($this->Peminjaman_Model->hapus($peminjaman_id)) {
			$this->session->set_flashdata('success', 'Peminjaman <strong>Berhasil</strong> Dihapus!');
			redirect('peminjaman');
		} else {
			$this->session->set_flashdata('error', 'Peminjaman <strong>Gagal</strong> Dihapus!');
			redirect('peminjaman');
		}
	}
}
