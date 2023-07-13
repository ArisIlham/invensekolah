<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()

    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('menu_helper');
        $this->load->model('M_login');
        //$this->load->model('Dashboard_Model');
    }

    function index()
    {
        $this->load->view('layout/login');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $validasi_username = $this->M_login->query_validasi_username($username);
        if ($validasi_username->num_rows() > 0) {
            $validate_ps = $this->M_login->query_validasi_password($username, $password);
            if ($validate_ps->num_rows() > 0) {
                $x = $validate_ps->row_array();
                if ($x['user_status'] == '1') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $username);

                    $id = $x['id'];
                    $nisn = $x['nisn'];
                    $level = $x['level'];
                    $nama_user = $x['nama_user'];

                    if ($x['level'] == '1') { //Administrator
                        $name = $x['username'];
                        $nisn = $x['nisn'];
                        $level = $x['level'];
                        $nama_user = $x['nama_user'];
                        $this->session->set_userdata('access', 'Administrator');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('nisn', $nisn);
                        $this->session->set_userdata('level', $level);
                        $this->session->set_userdata('nama_user', $nama_user);
                        redirect('dashboard');
                    } else if ($x['level'] == '2') { //User
                        $name = $x['username'];
                        $nisn = $x['nisn'];
                        $level = $x['level'];
                        $nama_user = $x['nama_user'];
                        $this->session->set_userdata('access', 'User');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('nisn', $nisn);
                        $this->session->set_userdata('level', $level);
                        $this->session->set_userdata('nama_user', $nama_user);
                        redirect('home');
                    } else if ($x['level'] == '3') { //PJ
                        $name = $x['username'];
                        $nisn = $x['nisn'];
                        $level = $x['level'];
                        $nama_user = $x['nama_user'];
                        $this->session->set_userdata('access', 'PJ');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('nisn', $nisn);
                        $this->session->set_userdata('level', $level);
                        $this->session->set_userdata('nama_user', $nama_user);
                        redirect('dashboard');
                    }
                } else {
                    $url = base_url('login');
                    echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            } else {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }
        } else {
            $url = base_url('login');
            echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>username yang kamu masukan salah.</p>');
            redirect($url);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
