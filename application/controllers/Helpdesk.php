<?php
class helpdesk extends CI_Controller
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
        $this->load->view('web/help_desk');
        $this->load->view('template/footer');
    }
    public function formhelpdesk()
    {
        $this->load->view('template/header');
        $this->load->view('web/formhelpdesk');
        $this->load->view('template/footer');
    }
}
