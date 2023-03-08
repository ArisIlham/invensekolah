<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('web/dashboard');
        $this->load->view('template/footer');
    }
    public function helpdesk()
    {
        $this->load->view('template/header');
        $this->load->view('web/helpdesk');
        $this->load->view('template/footer');
    }
    public function peminjaman()
    {
        $this->load->view('template/header');
        $this->load->view('web/peminjaman');
        $this->load->view('template/footer');
    }
}
