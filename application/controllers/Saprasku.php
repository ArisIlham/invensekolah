<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saprasku extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Saprasku_Model');
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
			'datasaprasku'		=> $this->Saprasku_Model->Lihatsaprasku($id)
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/saprasku/index', $data);
		$this->load->view('layout/footer');
	}


	public function tambah()
	{
		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
		$level		    = $this->session->userdata('level');

		$data = array(
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
			'level'			    => $level,
		);


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/saprasku/tambah', $data);
		$this->load->view('layout/footer');
	}



	public function simpan()
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
				redirect(base_url('saprasku'));
			}
		}

		$data = array(
			'user_id'     => $this->input->post('user_id'),
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_beli' => $this->input->post('harga_beli'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			'kondisi' => $this->input->post('kondisi'),
			'gambar' => $nama_gambar,
		);

		$this->db->insert('dt_barang', $data);
		// $this->db->where("saprasku_id", $id);   
		// $this->db->update("dt_saprasku", $data);      
		redirect('saprasku');
	}





	public function ubah($id)
	{

		//$id				= $this->session->userdata('id');
		//$nama_user		= $this->session->userdata('nama_user');
		//$level		    = $this->session->userdata('level');


		$data = array(
			//'userid'			=> $id,
			//'nama_user'			=> $nama_user,
			//'level'			    => $level,
			'edit'		        => $this->Saprasku_Model->ubah($id),
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/saprasku/edit', $data);
		$this->load->view('layout/footer');
	}




	public function ubahsimpan()
	{
		$id =  $this->input->post("id");
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
				redirect(base_url('saprasku'));
			}
		}

		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_beli' => $this->input->post('harga_beli'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			'kondisi' => $this->input->post('kondisi'),
			'gambar' => $nama_gambar,
		);

		//$this->db->insert('dt_saprasku',$data); 
		$this->db->where("id", $id);
		$this->db->update("dt_barang", $data);
		redirect('saprasku');
	}

	public function hapus($saprasku_id)
	{
		if ($this->Saprasku_Model->hapus($saprasku_id)) {
			$this->session->set_flashdata('success', 'Barang <strong>Berhasil</strong> Dihapus!');
			redirect('saprasku');
		} else {
			$this->session->set_flashdata('error', 'Barang <strong>Gagal</strong> Dihapus!');
			redirect('saprasku');
		}
	}
}
