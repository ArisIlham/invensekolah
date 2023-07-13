<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User_Model');
        $this->load->library('session');
	}

	public function index()
	{     
        $data = array( 
            'datauser'		=> $this->User_Model->Lihatuser()
        );

		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/user/index',$data);
        $this->load->view('layout/footer');
	} 


    public function tambah()
	{
        $data = array( 
            'databagian'		=> $this->User_Model->databagian()
        );
        
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/user/tambah',$data);
        $this->load->view('layout/footer'); 
	} 

  

    public function simpan()
	{		
		       
		$data = array(
            'username' => $this->input->post('username'),
            'password' => MD5($this->input->post('password')),
            'nama_user' => $this->input->post('nama_user'),
            'level' => $this->input->post('level'),
            'id_bagian' => $this->input->post('id_bagian'),
			'user_status' => $this->input->post('user_status'),
			'nisn' => $this->input->post('nisn'),
            'tgl_input' => date('Y-m-d'),
          );
        
		$this->db->insert('dt_user',$data); 
		// $this->db->where("user_id", $id);   
		// $this->db->update("dt_user", $data);      
		redirect('user');


		}





    public function ubah($user_id){	

        $id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
        $level		    = $this->session->userdata('level');

        $data = array( 
            'userid'			=> $id,
			'nama_user'			=> $nama_user,
            'level'			    => $level,
            'edit'		        => $this->User_Model->ubah($user_id),
            'databagian'		=> $this->User_Model->databagian(),
        ); 
	
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/user/edit', $data);
        $this->load->view('layout/footer');
	}




    public function ubahsimpan()
	{
    $id =  $this->input->post("id");
    

		$data = array(
            'nama_user' => $this->input->post('nama_user'),
            'nisn' => $this->input->post('nisn'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
			'user_status' => $this->input->post('user_status'),
          );
        
		//$this->db->insert('dt_user',$data); 
		$this->db->where("id", $id);   
		$this->db->update("dt_user", $data);      
		redirect('user');

    }

    public function hapus($user_id){
		if($this->User_Model->hapus($user_id)){
			$this->session->set_flashdata('success', 'Barang <strong>Berhasil</strong> Dihapus!');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Barang <strong>Gagal</strong> Dihapus!');
			redirect('user');
		}
	}





}



