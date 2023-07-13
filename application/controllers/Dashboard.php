<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('menu_helper');
		$this->load->model('Dashboard_Model');
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
			'totalpinjam'		=> $this->Dashboard_Model->totalpinjam($id),
			'totalhelpdesk'		=> $this->Dashboard_Model->totalhelpdesk($id),
			'totalpengajuan'	=> $this->Dashboard_Model->totalpengajuan($id),
			'totalbarang'		=> $this->Dashboard_Model->totalbarang($id),
		);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/content', $data);
		$this->load->view('layout/footer');
	}
}
