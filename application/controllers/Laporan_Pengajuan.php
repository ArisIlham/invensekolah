<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Pengajuan extends CI_Controller {

	public function __construct()

	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('menu_helper');
		$this->load->library('Pdf');
		$this->load->model('Laporan_Pengajuan_Model');
	}

	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/laporan_pengajuan/index');
        $this->load->view('layout/footer');
	}

	function cetakpdf(){      
        
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('LAPORAN PENGAJUAN');
        $pdf->SetFont('times', '', 11);
        
        $pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255) );  

		$pdf->setMargins(17, 3, 17);
        
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 064', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->AddPage();          

        //$no_jurnal  = $this->input->post('no_jurnal');
        

        $tgl_awal   = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir'); 


        //$periode = $this->Laporan_Pengajuan_Model->periode($tgl_awal,$tgl_akhir);
       
        
                    $html = '
                    <p align="center"><u><b><font size="14">LAPORAN PENGAJUAN</b></u></font>
                    <br><br>
                    <font size="10"></font></p>
                    

             
                    
                    <table style="border-collapse: collapse; width: 100%;" border="1">
                        <tbody>
                            <tr style="background-color: #87cefa;height: 18px;">
                                <td style="width: 16.2857%; text-align: center; line-height: 18px;">Nama User</td>
                                <td style="width: 18.2857%; text-align: center; line-height: 18px;">No Pengajuan</td>
                                <td style="width: 16.2857%; text-align: center; line-height: 18px;">Tgl Pengajuan</td>
                                <td style="width: 16.2857%; text-align: center; line-height: 18px;">Jam Pengajuan</td>
                                <td style="width: 16.2857%; text-align: center; line-height: 18px;">Total</td>
                                <td style="width: 16.2857%; text-align: center; line-height: 18px;">Status</td>
                            </tr>
                            

                            ';

                            $tgl_awal   = $this->input->post('tgl_awal');
                            $tgl_akhir  = $this->input->post('tgl_akhir');   

                            $text = "
                            
                            SELECT a.nama_user,b.no_pengajuan,b.tgl_pengajuan,b.jam_pengajuan,b.total, (CASE 
                            WHEN b.Is_Approve = 1 THEN 'Sudah Disetujui'
                            WHEN b.Is_Approve = 0 THEN 'Belum Disetujui'
                            END) AS statuspengajuan FROM dt_user a, dt_pengajuan b where a.id=b.user_id and b.tgl_pengajuan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'


                           ";
                           
                            $data = array( 
                                'bukajalan'				=> $this->Laporan_Pengajuan_Model->manualQuery($text),		
                            ); 
                            
                            foreach($data['bukajalan']->result_array() as $db){  

                             

                            $html .= '
                            <tr style="height: 18px;">

                                <td style="width: 16.2857%; line-height: 18px;text-align: center">'.$db['nama_user'].'</td> 
                                <td style="width: 18.2857%; line-height: 18px;text-align: center">'.$db['no_pengajuan'].'</td>
                                <td style="width: 16.2857%; line-height: 18px;text-align: center">'.date('d F Y', strtotime($db['tgl_pengajuan'])).'</td>
                                <td style="width: 16.2857%; line-height: 18px;text-align: center">'.date('d F Y', strtotime($db['jam_pengajuan'])).'</td>
                                <td style="width: 16.2857%; line-height: 18px;text-align: center">'.'Rp'. number_format($db['total'], 2, ",", ".").'</td>
                                <td style="width: 16.2857%; line-height: 18px;text-align: center">'.$db['statuspengajuan'].'</td>

                                </tr>

                                ';

                                




                        
                            }




                       
                            $html .= '
                            
                            
                        </tbody>
                    </table>';
                    
                        

                
                

                    
            
                    $pdf->writeHTML($html, true, true, true, false, '');
                    
                    $pdf->lastPage();
            
                    ;
                            
            
                    //$pdf->writeHTML($html, true, false, true, false, '');
                    $pdf->Output('Laporan Pengajuan.pdf', 'I');
    }
}

	

