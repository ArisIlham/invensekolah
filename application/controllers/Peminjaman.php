<?php
class peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('m_admin');
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('web/peminjaman');
        $this->load->view('template/footer');
    }
    public function formpeminjaman()
    {
        $this->load->view('template/header');
        $this->load->view('web/formpeminjaman');
        $this->load->view('template/footer');
    }
}
