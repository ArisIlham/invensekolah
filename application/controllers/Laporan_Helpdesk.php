<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Helpdesk extends CI_Controller {

	public function __construct()

	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('menu_helper');
		$this->load->library('Pdf');
		$this->load->model('Laporan_Helpdesk_Model');
	}

	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/laporan_helpdesk/index');
        $this->load->view('layout/footer');
	}

	function cetakpdf(){      
        
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('LAPORAN HELPDESK');
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


        //$periode = $this->Laporan_Helpdesk_Model->periode($tgl_awal,$tgl_akhir);
       
        
                    $html = '
                    <p align="center"><u><b><font size="14">LAPORAN HELPDESK</b></u></font>
                    <br><br>
                    <font size="10"></font></p>
                    

             
                    
                    <table style="border-collapse: collapse; width: 100%;" border="1">
                        <tbody>
                            <tr style="background-color: #87cefa;height: 18px;">
                                <td style="width: 19.2857%; text-align: center; line-height: 18px;">Nama User</td>
                                <td style="width: 25.2857%; text-align: center; line-height: 18px;">Nama Barang</td>
                                <td style="width: 30.2857%; text-align: center; line-height: 18px;">Kendala</td>
                                <td style="width: 25.2857%; text-align: center; line-height: 18px;">Gambar</td>
                            </tr>
                            

                            ';

                            $tgl_awal   = $this->input->post('tgl_awal');
                            $tgl_akhir  = $this->input->post('tgl_akhir');   

                            $text = "
                            
                            SELECT * FROM dt_user a,dt_helpdesk b, dt_barang c where a.id=b.user_id and b.id_barang=c.id and b.tgl_input BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'


                           ";
                           
                            $data = array( 
                                'bukajalan'				=> $this->Laporan_Helpdesk_Model->manualQuery($text),		
                            ); 
                            
                            foreach($data['bukajalan']->result_array() as $db){  

                             

                            $html .= '
                            <tr style="height: 40px;">

                                <td style="width: 19.2857%; line-height: 40px;text-align: center">'.$db['nama_user'].'</td> 
                                <td style="width: 25.2857%; line-height: 40px;text-align: center">'.$db['nama_barang'].'</td>
                                <td style="width: 30.2857%; line-height: 40px;text-align: center">'.$db['kendala'].'</td>
                                <td style="width: 25.2857%; line-height: 40px;text-align: center"><p><img width="40px" src="http://localhost:8080/app-inventorisekolah/assets/gambar/'.$db['gambar'].'"></p></td>

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
                    $pdf->Output('Laporan HELPDESK.pdf', 'I');
    }
}

	

