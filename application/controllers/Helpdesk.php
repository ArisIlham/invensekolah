<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Home_Model', 'Peminjaman_Model', 'Helpdesk_Model'));
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
			'datahelpdesk'		=> $this->Helpdesk_Model->Lihathelpdesk($id),
			'databagian'        => $this->Home_Model->databagian(),
			'databarang'        => $this->Peminjaman_Model->databarang(),
			'user_id'           => $this->input->get('user_id'),
			'id_bagian'         => $this->input->get('id_bagian'),
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/helpdesk/index', $data);
		$this->load->view('layout/footer');
	}


	public function tambah()
	{
		$id		= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');

		$data = array(
			'databarang'		=> $this->Helpdesk_Model->pilihbarang(),
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/helpdesk/tambah', $data);
		$this->load->view('layout/footer');
	}

	public function simpan2()
	{

		$data = array(
			'kode'      => $this->input->post('kode'),
			'nama'      => $this->input->post('nama'),
		);

		$this->db->insert('dt_helpdesk', $data);

		redirect('master_coa');
	}

	public function simpan()
	{
		//$id =  $this->input->post("pengaturan_id");
		$nama_gambar = null;

		$upload_logo = $_FILES['gambar_helpdesk']['name'];
		if ($upload_logo) {
			// setting konfigurasi upload
			$nmfile = "gambar_helpdesk";
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
			$config['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config);
			// upload gambar 
			if ($this->upload->do_upload('gambar_helpdesk')) {

				//$this->db->set('foto11', $data1['upload_data']['file_name']);
				$result1 = $this->upload->data();
				$result = array('gambar_helpdesk' => $result1);
				$data_gambar = array('image_metadata' => $this->upload->data());
				$nama_gambar = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("failed", " Gagal Insert Data ! " . $this->upload->display_errors());
				redirect(base_url('helpdesk'));
			}
		}

		$data = array(
			'user_id' => $this->input->post('user_id'),
			'id_barang' => $this->input->post('id_barang'),
			'kendala' => $this->input->post('kendala'),
			'gambar_helpdesk' => $nama_gambar,
			'tgl_input' => date('Y-m-d'),
		);

		$this->db->insert('dt_helpdesk', $data);
		// $this->db->where("helpdesk_id", $id);   
		// $this->db->update("dt_helpdesk", $data);      
		redirect('helpdesk');
	}





	public function ubah($helpdesk_id)
	{

		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');

		$data = array(
			'databarang'		=> $this->Helpdesk_Model->pilihbarang(),
			'edit'		        => $this->Helpdesk_Model->ubah($helpdesk_id),
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
		);


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/helpdesk/edit', $data);
		$this->load->view('layout/footer');
	}




	public function ubahsimpan()
	{
		$id =  $this->input->post("helpdesk_id");
		$nama_gambar = null;

		$upload_logo = $_FILES['gambar_helpdesk']['name'];
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
			if ($this->upload->do_upload('gambar_helpdesk')) {

				//$this->db->set('foto11', $data1['upload_data']['file_name']);
				$result1 = $this->upload->data();
				$result = array('gambar_helpdesk' => $result1);
				$data_gambar = array('image_metadata' => $this->upload->data());
				$nama_gambar = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("failed", " Gagal Insert Data ! " . $this->upload->display_errors());
				redirect(base_url('helpdesk'));
			}
		}

		$data = array(
			'id_barang' => $this->input->post('id_barang'),
			//'user_id' => $this->input->post('user_id'),
			'kendala' => $this->input->post('kendala'),
			'gambar' => $nama_gambar,
		);

		//$this->db->insert('dt_helpdesk',$data); 
		$this->db->where("helpdesk_id", $id);
		$this->db->update("dt_helpdesk", $data);
		redirect('helpdesk');
	}

	public function hapus($helpdesk_id)
	{
		if ($this->Helpdesk_Model->hapus($helpdesk_id)) {
			$this->session->set_flashdata('success', 'Helpdesk <strong>Berhasil</strong> Dihapus!');
			redirect('helpdesk');
		} else {
			$this->session->set_flashdata('error', 'Helpdesk <strong>Gagal</strong> Dihapus!');
			redirect('helpdesk');
		}
	}
}
