<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Home_Model');
		
		   
    }

	public function index()
	{

		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
        $level		    = $this->session->userdata('level');
        $nisn		    = $this->session->userdata('nisn');

        $data = array( 
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
            'level'			    => $level,   
            'nisn'			    => $nisn, 
            'databagian'		=> $this->Home_Model->databagian(),
            'user_id'           => $this->input->get('user_id'), 
            'id_bagian'         => $this->input->get('id_bagian'),    
        );

		//$this->load->view('layout/header');
        //$this->load->view('layout/sidebar');
        $this->load->view('layout/website/index',$data);
        //$this->load->view('layout/footer');
	}
}
