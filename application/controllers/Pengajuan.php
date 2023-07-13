<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Pengajuan_Model');
		$this->load->model('Pengajuan_Detail_Model');
        $this->load->library('session');
	}

	public function index()
	{     
        $id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
		$level			= $this->session->userdata('level');

        $data = array( 
            'databarang'		=> $this->Pengajuan_Model->pilihbarang(),
			'all_pengajuan'		=> $this->Pengajuan_Model->lihat(),
			'userid'			=> $id,
			'nama_user'			=> $nama_user, 
			'level'				=> $level,
        );

		//$this->data['all_pengajuan'] = $this->Pengajuan_Model->lihat();

		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/index',$data);
        $this->load->view('layout/footer');
	} 

	public function get_all_barang(){
		$data = $this->Pengajuan_Model->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('admin/pengajuan/keranjang');
	}








	public function proses_tambah(){
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));
		
		$data_pengajuan = [
			'no_pengajuan' => $this->input->post('no_pengajuan'),
			//'nama_kasir' => $this->input->post('nama_kasir'),
			'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
			'jam_pengajuan' => $this->input->post('jam_pengajuan'),
			'user_id' => $this->input->post('user_id'),
			'total' => $this->input->post('total_hidden'),
		];

		$data_detail_pengajuan = [];

		for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
			array_push($data_detail_pengajuan, ['nama_barang' => $this->input->post('nama_barang_hidden')[$i]]);
			$data_detail_pengajuan[$i]['no_pengajuan'] = $this->input->post('no_pengajuan');
			$data_detail_pengajuan[$i]['harga_barang'] = $this->input->post('harga_barang_hidden')[$i];
			$data_detail_pengajuan[$i]['jumlah_barang'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_pengajuan[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_pengajuan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if($this->Pengajuan_Model->tambah($data_pengajuan) && $this->Pengajuan_Detail_Model->tambah($data_detail_pengajuan)){
			for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
				$this->Pengajuan_Model->min_stok($data_detail_pengajuan[$i]['jumlah_barang'], $data_detail_pengajuan[$i]['nama_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>pengajuan</strong> Berhasil Dibuat!');
			redirect('pengajuan');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>pengajuan</strong> Berhasil Dibuat!');
			redirect('pengajuan');
		}
	}

	public function detail($no_pengajuan){
		$this->data['title'] = 'Detail pengajuan';
		$this->data['pengajuan'] = $this->Pengajuan_Model->lihat_no_pengajuan($no_pengajuan);
		$this->data['all_detail_pengajuan'] = $this->Pengajuan_Detail_Model->lihat_no_pengajuan($no_pengajuan);
		$this->data['no'] = 1;

		
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/detail', $this->data);
        $this->load->view('layout/footer');

	}

	public function hapus($no_pengajuan){
		if($this->Pengajuan_Model->hapus($no_pengajuan) && $this->Pengajuan_Detail_Model->hapus($no_pengajuan)){
			$this->session->set_flashdata('success', 'Invoice pengajuan <strong>Berhasil</strong> Dihapus!');
			redirect('pengajuan');
		} else {
			$this->session->set_flashdata('error', 'Invoice pengajuan <strong>Gagal</strong> Dihapus!');
			redirect('pengajuan');
		}
	}








    public function tambah()
	{

		$id				= $this->session->userdata('id');
		$nama_user		= $this->session->userdata('nama_user');
        $level		    = $this->session->userdata('level');


		

        $data = array( 
            'databarang'		=> $this->Pengajuan_Model->pilihbarang(),
			'userid'			=> $id,
			'nama_user'			=> $nama_user,
            'level'			    => $level,
        );


     
        //$this->data['databarang'] = $this->Pengajuan_Model->lihat();

		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/tambah', $data);
        $this->load->view('layout/footer'); 
	} 

    public function edit()
	{
        $id = $this->uri->segment('3');
        $cek = $this->db->get_where("dt_pengajuan",["pengajuan_id" => $id]); // tulis id yang dituju
        if($cek->num_rows() > 0)
        {

        }else{
            $this->session->set_flashdata("failed"," Tidak ditemukan data ID dari karyawan ! ");
            redirect('pengajuan');
        }


        $data = array( 
            'edit'		=> $this->db->query("SELECT * FROM dt_pengajuan WHERE dt_pengajuan.pengajuan_id=?", array($id))->row(),
        );

        // $this->data = [					
		// 	'edit'		 => $this->db->query("SELECT * FROM dt_pengajuan WHERE dt_pengajuan.pengajuan_id=?", array($id))->row(),
		// ];



		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/edit',$data);
        $this->load->view('layout/footer'); 
	} 







	public function approve()
	{
		//$id =$this->uri->segment(2);
		$id = $this->input->post("no_pengajuan");
		$this->Pengajuan_Model->approve($id);
		redirect('pengajuan');
	}






    public function simpan()
	{
		
        $nama_sertifikat=null;
        $nama_ktp=null;
        $nama_ijasah =null;
        $nama_surat_permohonan=null;
        $nama_surat_pernyataan=null;
        $nama_surat_keterangan=null;
        $nama_lisensi=null;
        $nama_skp=null;
        $nama_laporan_kegiatan=null;
        $nama_paklaring=null;
        $nama_pas_photo=null;


        $upload_logo = $_FILES['sertifikat']['name'];
		if ($upload_logo) {
			// setting konfigurasi upload
			$nmfile = "sertifikat";
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
            $config['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config);
			// upload gambar 
			if ($this->upload->do_upload('sertifikat')) {



                
				//$this->db->set('foto11', $data1['upload_data']['file_name']);


				$result1 = $this->upload->data();
				$result = array('sertifikat'=>$result1);
				$data_sertifikat = array('image_metadata' => $this->upload->data());
		        $nama_sertifikat = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}


        $upload_logo2 = $_FILES['ktp']['name'];
		if ($upload_logo2) {
			// setting konfigurasi upload
			$nmfile2 = "ktp";
			$config2['upload_path'] = './foto/';
			$config2['allowed_types'] = 'gif|jpg|jpeg|png';
			$config2['file_name'] = $nmfile2;
            $config2['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config2);
			// upload gambar 
			if ($this->upload->do_upload('ktp')) {

				$result2 = $this->upload->data();
				$result = array('ktp'=>$result2);
				$data_ktp = array('image_metadata' => $this->upload->data());
		        $nama_ktp = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}




        $upload_logo3 = $_FILES['ijasah']['name'];
		if ($upload_logo3) {
			// setting konfigurasi upload
			$nmfile3 = "ijasah";
			$config3['upload_path'] = './foto/';
			$config3['allowed_types'] = 'gif|jpg|jpeg|png';
			$config3['file_name'] = $nmfile3;
            $config3['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config3);
			// upload gambar 
			if ($this->upload->do_upload('ijasah')) {

				$result3 = $this->upload->data();
				$result = array('ijasah'=>$result3);
				$data_ijasah = array('image_metadata' => $this->upload->data());
		        $nama_ijasah = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        $upload_logo4 = $_FILES['surat_permohonan']['name'];
		if ($upload_logo4) {
			// setting konfigurasi upload
			$nmfile4 = "surat_permohonan";
			$config4['upload_path'] = './foto/';
			$config4['allowed_types'] = 'gif|jpg|jpeg|png';
			$config4['file_name'] = $nmfile4;
            $config4['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config4);
			// upload gambar 
			if ($this->upload->do_upload('surat_permohonan')) {

				$result4 = $this->upload->data();
				$result = array('surat_permohonan'=>$result4);
				$data_surat_permohonan = array('image_metadata' => $this->upload->data());
		        $nama_surat_permohonan = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        $upload_logo5 = $_FILES['surat_pernyataan']['name'];
		if ($upload_logo5) {
			// setting konfigurasi upload
			$nmfile5 = "surat_pernyataan";
			$config5['upload_path'] = './foto/';
			$config5['allowed_types'] = 'gif|jpg|jpeg|png';
			$config5['file_name'] = $nmfile5;
            $config5['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config5);
			// upload gambar 
			if ($this->upload->do_upload('surat_pernyataan')) {

				$result5 = $this->upload->data();
				$result = array('surat_pernyataan'=>$result5);
				$data_surat_pernyataan = array('image_metadata' => $this->upload->data());
		        $nama_surat_pernyataan = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        $upload_logo6 = $_FILES['surat_keterangan']['name'];
		if ($upload_logo6) {
			// setting konfigurasi upload
			$nmfile6 = "surat_keterangan";
			$config6['upload_path'] = './foto/';
			$config6['allowed_types'] = 'gif|jpg|jpeg|png';
			$config6['file_name'] = $nmfile6;
            $config6['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config6);
			// upload gambar 
			if ($this->upload->do_upload('surat_keterangan')) {

				$result6 = $this->upload->data();
				$result = array('surat_keterangan'=>$result6);
				$data_surat_keterangan = array('image_metadata' => $this->upload->data());
		        $nama_surat_keterangan = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        $upload_logo7 = $_FILES['lisensi']['name'];
		if ($upload_logo7) {
			// setting konfigurasi upload
			$nmfile7 = "lisensi";
			$config7['upload_path'] = './foto/';
			$config7['allowed_types'] = 'gif|jpg|jpeg|png';
			$config7['file_name'] = $nmfile7;
            $config7['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config7);
			// upload gambar 
			if ($this->upload->do_upload('lisensi')) {

				$result7 = $this->upload->data();
				$result = array('lisensi'=>$result7);
				$data_lisensi = array('image_metadata' => $this->upload->data());
		        $nama_lisensi = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}





        $upload_logo8 = $_FILES['skp']['name'];
		if ($upload_logo8) {
			// setting konfigurasi upload
			$nmfile8 = "skp";
			$config8['upload_path'] = './foto/';
			$config8['allowed_types'] = 'gif|jpg|jpeg|png';
			$config8['file_name'] = $nmfile7;
            $config8['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config8);
			// upload gambar 
			if ($this->upload->do_upload('skp')) {

				$result8 = $this->upload->data();
				$result = array('skp'=>$result8);
				$data_skp = array('image_metadata' => $this->upload->data());
		        $nama_skp = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}


        $upload_logo9 = $_FILES['laporan_kegiatan']['name'];
		if ($upload_logo9) {
			// setting konfigurasi upload
			$nmfile9 = "laporan_kegiatan";
			$config9['upload_path'] = './foto/';
			$config9['allowed_types'] = 'gif|jpg|jpeg|png';
			$config9['file_name'] = $nmfile7;
            $config9['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config9);
			// upload gambar 
			if ($this->upload->do_upload('laporan_kegiatan')) {

				$result9 = $this->upload->data();
				$result = array('laporan_kegiatan'=>$result9);
				$data_laporan_kegiatan = array('image_metadata' => $this->upload->data());
		        $nama_laporan_kegiatan = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        $upload_logo10 = $_FILES['paklaring']['name'];
		if ($upload_logo10) {
			// setting konfigurasi upload
			$nmfile10 = "paklaring";
			$config10['upload_path'] = './foto/';
			$config10['allowed_types'] = 'gif|jpg|jpeg|png';
			$config10['file_name'] = $nmfile10;
            $config10['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config10);
			// upload gambar 
			if ($this->upload->do_upload('paklaring')) {

				$result10 = $this->upload->data();
				$result = array('paklaring'=>$result10);
				$data_paklaring = array('image_metadata' => $this->upload->data());
		        $nama_paklaring = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}




        $upload_logo11 = $_FILES['pas_photo']['name'];
		if ($upload_logo11) {
			// setting konfigurasi upload
			$nmfile11 = "pas_photo";
			$config11['upload_path'] = './foto/';
			$config11['allowed_types'] = 'gif|jpg|jpeg|png';
			$config11['file_name'] = $nmfile11;
            $config11['encrypt_name'] = TRUE;
			// load library upload
			$this->load->library('upload', $config11);
			// upload gambar 
			if ($this->upload->do_upload('pas_photo')) {

				$result11 = $this->upload->data();
				$result = array('pas_photo'=>$result11);
				$data_pas_photo = array('image_metadata' => $this->upload->data());
		        $nama_pas_photo = $this->upload->data('file_name');

			} else {
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".$this->upload->display_errors());
				redirect(base_url('pengajuan/'));
			}
		}



        







        // // setting konfigurasi upload
        // $config['upload_path']   =  './foto/';
		// $config['allowed_types'] = 'jpeg|jpg|png|pdf';
		// $config['max_size'] = 2048;
        // // load library upload
        // $this->load->library('upload', $config);

        // if($this->upload->do_upload('sertifikat')) {
        // //$this->upload->do_upload('sertifikat');
        // $data_sertifikat = array('image_metadata' => $this->upload->data());
		// $nama_sertifikat = $this->upload->data('file_name');	
        // //$result1 = $this->upload->data();
        // }

        // if($this->upload->do_upload('ktp')) {
        // $nama_ktp = $_FILES['ktp']['file_name'];
        // $this->upload->do_upload('ktp');
        // $data_ktp = array('image_metadata' => $this->upload->data());
		// $nama_ktp = $this->upload->data('file_name');
        // }

        // $this->upload->do_upload('ijasah');
        // $data_ijasah = array('image_metadata' => $this->upload->data());
		// $nama_ijasah = $this->upload->data('file_name');

        // $this->upload->do_upload('surat_permohonan');
        // $data_surat_permohonan = array('image_metadata' => $this->upload->data());
		// $nama_surat_permohonan = $this->upload->data('file_name');


        // $this->upload->do_upload('surat_pernyataan');
        // $data_surat_pernyataan = array('image_metadata' => $this->upload->data());
		// $nama_surat_pernyataan = $this->upload->data('file_name');

        // $this->upload->do_upload('surat_keterangan');
        // $data_surat_keterangan = array('image_metadata' => $this->upload->data());
		// $nama_surat_keterangan = $this->upload->data('file_name');

        // $this->upload->do_upload('lisensi');
        // $data_lisensi = array('image_metadata' => $this->upload->data());
		// $nama_lisensi = $this->upload->data('file_name');

        // $this->upload->do_upload('skp');
        // $data_skp= array('image_metadata' => $this->upload->data());
		// $nama_skp = $this->upload->data('file_name');

        // $this->upload->do_upload('paklaring');
        // $data_paklaring = array('image_metadata' => $this->upload->data());
		// $nama_paklaring = $this->upload->data('file_name');

        // $this->upload->do_upload('laporan_kegiatan');
        // $data_laporan_kegiatan = array('image_metadata' => $this->upload->data());
		// $nama_laporan_kegiatan = $this->upload->data('file_name');

        // $this->upload->do_upload('pas_photo');
        // $data_pas_photo = array('image_metadata' => $this->upload->data());
		// $nama_pas_photo = $this->upload->data('file_name');


        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_cust' => $this->input->post('nama_cust'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'sertifikasi' => $this->input->post('sertifikasi'),
            'bidang' => $this->input->post('bidang'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'gol_darah' => $this->input->post('gol_darah'),
            'expired_date' => $this->input->post('expired_date'),
            'keterangan' => $this->input->post('keterangan'),
            'sertifikat' => $nama_sertifikat,
            'ktp' => $nama_ktp,
            'ijasah' => $nama_ijasah,
            'surat_permohonan' => $nama_surat_permohonan,
            'surat_pernyataan' => $nama_surat_pernyataan,
            'surat_keterangan' => $nama_surat_keterangan,
            'lisensi' => $nama_lisensi,
            'skp' => $nama_skp,
            'laporan_kegiatan' => $nama_laporan_kegiatan,
            'paklaring' => $nama_paklaring,
            'pas_photo' => $nama_pas_photo,
          );
        
		$this->db->insert('dt_pengajuan',$data);

        //prepare data for table pengajuan
        $data = array(
        'pengajuan_id' => $this->db->insert_id(),
        'status' => 0
        );
        //insert into table progres
        $this->db->insert('dt_progres',$data);  
		redirect('pengajuan');
	}












    public function simpan2()
	{
		


		$config['upload_path']   =  './foto/';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

        $this->upload->do_upload('sertifikat');	
		$data_sertifikat = array('image_metadata' => $this->upload->data());
		$nama_sertifikat = $this->upload->data('file_name');

        $this->upload->do_upload('ktp');	
		$data_ktp = array('image_metadata' => $this->upload->data());
		$nama_ktp = $this->upload->data('file_name');

        $this->upload->do_upload('ijasah');	
		$data_ijasah = array('image_metadata' => $this->upload->data());
		$nama_ijasah = $this->upload->data('file_name');

        $this->upload->do_upload('surat_permohonan');	
		$data_surat_permohonan = array('image_metadata' => $this->upload->data());
		$nama_surat_permohonan = $this->upload->data('file_name');

        $this->upload->do_upload('surat_pernyataan');	
		$data_surat_pernyataan = array('image_metadata' => $this->upload->data());
		$nama_surat_pernyataan = $this->upload->data('file_name');


        $this->upload->do_upload('surat_keterangan');	
		$data_surat_keterangan = array('image_metadata' => $this->upload->data());
		$nama_surat_keterangan = $this->upload->data('file_name');

        $this->upload->do_upload('lisensi');	
		$data_lisensi = array('image_metadata' => $this->upload->data());
		$nama_lisensi = $this->upload->data('file_name');

        $this->upload->do_upload('skp');	
		$data_skp = array('image_metadata' => $this->upload->data());
		$nama_skp = $this->upload->data('file_name');

        $this->upload->do_upload('laporan_kegiatan');	
		$data_laporan_kegiatan = array('image_metadata' => $this->upload->data());
		$nama_laporan_kegiatan = $this->upload->data('file_name');

        $this->upload->do_upload('paklaring');	
		$data_paklaring = array('image_metadata' => $this->upload->data());
		$nama_paklaring = $this->upload->data('file_name');

        $this->upload->do_upload('pas_photo');	
		$data_pas_photo = array('image_metadata' => $this->upload->data());
		$nama_pas_photo = $this->upload->data('file_name');



		


		// if (!$this->upload->do_upload('sertifikat'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
          
		// 	$data_sertifikat = array('image_metadata' => $this->upload->data());
		// 	$nama_sertifikat = $this->upload->data('file_name');

		// }

		// if (!$this->upload->do_upload('ktp'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_ktp = array('image_metadata' => $this->upload->data());
		// 	$nama_ktp = $this->upload->data('file_name');

		// }

		// if (!$this->upload->do_upload('ijasah'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_ijasah = array('image_metadata' => $this->upload->data());
		// 	$nama_ijasah = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('surat_permohonan'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_surat_permohonan = array('image_metadata' => $this->upload->data());
		// 	$nama_surat_permohonan = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('surat_pernyataan'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_surat_pernyataan = array('image_metadata' => $this->upload->data());
		// 	$nama_surat_pernyataan = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('surat_keterangan'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_surat_keterangan = array('image_metadata' => $this->upload->data());
		// 	$nama_surat_keterangan = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('lisensi'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_lisensi = array('image_metadata' => $this->upload->data());
		// 	$nama_lisensi = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('skp'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_skp = array('image_metadata' => $this->upload->data());
		// 	$nama_skp = $this->upload->data('file_name');

		// }



        // if (!$this->upload->do_upload('laporan_kegiatan'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_laporan_kegiatan = array('image_metadata' => $this->upload->data());
		// 	$nama_laporan_kegiatan = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('paklaring'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_paklaring = array('image_metadata' => $this->upload->data());
		// 	$nama_paklaring = $this->upload->data('file_name');

		// }


        // if (!$this->upload->do_upload('pas_photo'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('admin/pengajuan/tambah', $error);
		// }
		// else
		// {
		// 	$data_pas_photo = array('image_metadata' => $this->upload->data());
		// 	$nama_pas_photo = $this->upload->data('file_name');

		// }


        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_cust' => $this->input->post('nama_cust'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'sertifikasi' => $this->input->post('sertifikasi'),
            'bidang' => $this->input->post('bidang'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'gol_darah' => $this->input->post('gol_darah'),
            'expired_date' => $this->input->post('expired_date'),
            'keterangan' => $this->input->post('keterangan'),
            'sertifikat' => $nama_sertifikat,
            'ktp' => $nama_ktp,
            'ijasah' => $nama_ijasah,
            'surat_permohonan' => $nama_surat_permohonan,
            'surat_pernyataan' => $nama_surat_pernyataan,
            'surat_keterangan' => $nama_surat_keterangan,
            'lisensi' => $nama_lisensi,
            'skp' => $nama_skp,
            'laporan_kegiatan' => $nama_laporan_kegiatan,
            'paklaring' => $nama_paklaring,
            'pas_photo' => $nama_pas_photo,
          );


		$this->db->insert('dt_pengajuan',$data);
            //prepare data for table pengajuan
            $data = array(
            'pengajuan_id' => $this->db->insert_id(),
            'status' => 0       
            );
            //insert into table progres
            $this->db->insert('dt_progres',$data);  
            redirect('pengajuan');




      

		
			// $this->db->insert('dt_pengajuan',$data);
            // //prepare data for table pengajuan
            // $data = array(
            // 'pengajuan_id' => $this->db->insert_id(),
            // 'status' => 0       
            // );
            // //insert into table progres
            // $this->db->insert('dt_progres',$data);  
            // redirect('pengajuan');
		


	}

    private function thumb( $name='' ) {
		//Using gd2 image library
		$config['image_library']  = 'gd2';
		//path of the source file
		//FCPATH is a constant defined in index.php - it is the relative path to project root
		$config['source_image']   = FCPATH.'foto/'.$name;
		$config['create_thumb']   = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 50;
		$config['height']         = 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}





    public function hapus3()
    {
         // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
         $id = $this->input->post('pengajuan_id');

         $data = $this->Pengajuan_Model->hapus($id);
         $data = $this->Pengajuan_Model->hapusprogres($id);
         echo json_encode($data);
    }

}



