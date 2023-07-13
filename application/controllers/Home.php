<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('Home_Model', 'Peminjaman_Model', 'Helpdesk_Model'));
    }

    public function index()
    {

        $id                = $this->session->userdata('id');
        $nama_user        = $this->session->userdata('nama_user');
        $level            = $this->session->userdata('level');
        $nisn            = $this->session->userdata('nisn');

        $data = array(
            'userid'            => $id,
            'nama_user'         => $nama_user,
            'level'             => $level,
            'nisn'              => $nisn,
            'databagian'        => $this->Home_Model->databagian(),
            'databarang'        => $this->Peminjaman_Model->databarang(),
            'user_id'           => $this->input->get('user_id'),
            'id_bagian'         => $this->input->get('id_bagian'),
        );

        //$this->load->view('layout/header');
        //$this->load->view('layout/sidebar');
        $this->load->view('layout/website/index', $data);
        //$this->load->view('layout/footer');
    }

    public function simpan_peminjaman()
    {
        $method =  $this->input->post("method");
        if ($method == 'tambah_peminjaman') {
            $id =  $this->input->post("id_barang");
            $data = array(
                'user_id'          => $this->input->post('user_id'),
                'id_barang'        => $this->input->post('id_barang'),
                'jumlah_pinjam'    => $this->input->post('jumlah_pinjam'),
                'tgl_pinjam'       => $this->input->post('tgl_pinjam'),
                'tgl_kembali'      => $this->input->post('tgl_kembali'),
                'status'           => 1,
            );

            if ($this->db->insert('dt_peminjaman', $data)) {
                $data['message'] = 'Data Peminjaman Berhasil Ditambahkan!';
            } else {
                $data['message'] = 'Data Peminjaman Gagal Ditambahkan!';
            }

            $ambilpeminjaman = $this->Peminjaman_Model->ambilpeminjaman();
            $stokawal = $this->Peminjaman_Model->stokawal($id);
            $hitung = (int)$stokawal->stok - (int)$ambilpeminjaman;

            $this->db->where("id", $id);
            $this->db->update("dt_barang",  array('stok' => $hitung));
            echo json_encode($data);
        }
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
        redirect('home');
    }
}
