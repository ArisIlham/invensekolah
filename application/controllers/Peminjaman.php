<?php
class peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('m_admin');
        $this->load->library('pagination');
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
        $cari = $this->input->get('cari');
        $page = $this->input->get('per_page');

        $search = array('nama_barang' => $cari);

        $batas =  9; // 9 data per page
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['base_url']          = base_url() . 'peminjaman/formpeminjaman/?cari=' . $cari;
        $config['total_rows']        = $this->m_admin->jumlah_row($search);

        $config['per_page']          = $batas;
        $config['uri_segment']        = $page;

        $config['full_tag_open']     = '<ul class="pagination">';
        $config['full_tag_close']   = '<ul>';

        $config['first_link']       = 'first';
        $config['first_tag_open']   = '<li><a>';
        $config['first_tag_close']   = '</a></li>';

        $config['last_link']         = 'last';
        $config['last_tag_open']     = '<li><a>';
        $config['last_tag_close']   = '</a></li>';

        $config['next_link']         = '&raquo;';
        $config['next_tag_open']     = '<li><a>';
        $config['next_tag_close']   = '</a></li>';

        $config['prev_link']         = '&laquo;';
        $config['prev_tag_open']     = '<li><a>';
        $config['prev_tag_close']   = '</a></li>';

        $config['cur_tag_open']     = '<li class="active"><a>';
        $config['cur_tag_close']     = '</a></li>';

        $config['num_tag_open']     = '<li><a>';
        $config['num_tag_close']     = '</a></li>';

        $this->pagination->initialize($config);
        $data['pagination']   = $this->pagination->create_links();
        $data['jumlah_page'] = $page;


        $data['barang'] = $this->m_admin->get($batas, $offset, $search);

        $this->load->view('web/formpeminjaman', $data);
        $this->load->view('template/footer');
    }
}
