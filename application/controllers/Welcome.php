<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('M_admin');
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}
	public function saspras()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$data['barang'] = $this->M_admin->tampil_sapras()->result();
		$this->load->view('admin/sasprasku', $data);
		$this->load->view('template/footer');
	}
	public function setpj()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/setpj');
		$this->load->view('template/footer');
	}
	public function setuser()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/setuser');
		$this->load->view('template/footer');
	}
	public function tambahsarpras()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/tambahsarpras');
		$this->load->view('template/footer');
	}
	public function prosestambahsarpras()
	{
		$nama_barang = $this->input->post('nama_barang');
		$no_barang = $this->input->post('no_barang');
		$jml_barang = $this->input->post('jml_barang');
		$st_barang = $this->input->post('st_barang');
		$gmb_barang = $_FILES["gmb_barang"]["Tmp_name"];

		$Path = "upload/";
		$ImagePath = $Path . $nama_barang . "_logoku.png";
		Move_uploaded_file($gmb_barang, $ImagePath);

		// $config['upload_path']          = './upload/';
		// $config['allowed_types']        = 'gif|jpg|png|jpeg';
		// $config['max_size']     		= '2048';

		// $this->load->library('upload', $config);
		$DataArr = array(
			'nama_barang' => $nama_barang,
			'no_barang' => $no_barang,
			'jml_barang' => $jml_barang,
			'st_barang' => $st_barang,
			'gmb_barang' =>  Base_url() . $ImagePath,
		);
		// if (!empty($_FILES["gmb_barang"])) {
		// 	$this->upload->do_upload('gmb_barang');
		// 	$data_gmb = $this->upload->data();
		// 	$file_gmb = $data_gmb['file_name'];

		// 	$this->db->set('gmb_barang', $file_gmb);
		// }
		// $this->db->set('nama_barang', $nama_barang);
		// $this->db->set('no_barang', $no_barang);
		// $this->db->set('jml_barang', $jml_barang);
		// $this->db->set('st_barang', $st_barang);
		// $this->db->insert('barang');

		echo "<Pre>";
		Print_r($DataArr);
		echo "<Pre>";
		$this->M_admin->insertsapras($DataArr);
		Redirect('welcome/saspras', 'Refresh');
	}
}
