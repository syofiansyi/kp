<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semprop extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin(); 
        $this->load->model('Model_Jdsemprop');
         $this->load->helper(array('form', 'url','date_helper'));
         $this->load->library('m_pdf');
    }

    public function index()
    {                
        $data['pageTitle'] = 'Jadwal Semprop';
         $data['semprop'] = $this->Model_Jdsemprop->tglsemprop()->result();
        $data['Jdsemprop'] = $this->Model_Jdsemprop->get()->result();
        $data['Jdsemprop1'] = $this->Model_Jdsemprop->dptm()->result();
         $data['Jdsemprop2'] = $this->Model_Jdsemprop->dptd()->result();
        $data['pageContent'] = $this->load->view('jadwal/semprop', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     public function Jdsemprop_selesai()
    {                
    	$data['semprop'] = $this->Model_Jdsemprop->tglsemprop()->result();
        $data['pageTitle'] = 'Jadwal Semprop';
        $data['Jdsemprop'] = $this->Model_Jdsemprop->dpt()->result();
        $data['pageContent'] = $this->load->view('jadwal/semprop1', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    
    public function cetak1()
    {                
        $data['pageTitle'] = 'Laporan';
     $tahun = $this->uri->segment(3);
      if ($tahun==''){
      echo "<script>alert('Tahun / Tanggal belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
      $data['dosen'] = $this->Model_Jdsemprop->dosen();
       $data['semprop'] = $this->Model_Jdsemprop->getsemprop_laporan($tahun)->result();
      
        $html = $this->load->view('jadwal/laporan', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
    }
    }
    public function cetak2()
    {                
        $data['pageTitle'] = 'Laporan';
        $tahun = $this->uri->segment(3);
         if ($tahun==''){
      echo "<script>alert('Tahun / Tanggal belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
         $data['dosen'] = $this->Model_Jdsemprop->dosen();
       $data['semhas'] = $this->Model_Jdsemprop->getsemhas_laporan($tahun)->result();
        
        $html = $this->load->view('jadwal/laporan1', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
    }}
     public function cetak3()
    {                
        $data['pageTitle'] = 'Laporan';
          $tahun = $this->uri->segment(3); if ($tahun==''){
      echo "<script>alert('Tahun / Tanggal belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
           $data['dosen'] = $this->Model_Jdsemprop->dosen();
       $data['sidang'] = $this->Model_Jdsemprop->getsidang_laporan($tahun)->result();
        $html = $this->load->view('jadwal/laporan2', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
           exit();     
    }}
   
 public function ejd_semprop($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_semprop = $this->input->post('id_semprop');
        $ruang = $this->input->post('ruang');
       
        $tanggal = $this->input->post('tanggal');
         $pukul = $this->input->post('pukul');
        
      $cek_kd = $this->Model_Jdsemprop->id_semprop();

                        

                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_semprop'          => $id_semprop,
                                        'ruang'          => $ruang,
                                        'tanggal'          => $tanggal,
                                        'pukul'          => $pukul,
                                       
                                           );
                                      
                                    
                                     $this->Model_Jdsemprop->update_data('semprop', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('Semprop');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Data gagal disimpan.
                                         </div>'
                                     );
                                    redirect('semprop');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah Jadwal';
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji($id);
      $data['pageContent'] = $this->load->view('jadwal/ejdsemprop', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
 
  public function br_semprop($id)
  {
 
     $data['pageTitle'] = 'Berita Acara';
      $data['dosen'] = $this->Model_Jdsemprop->dosen();
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji($id);
       $html = $this->load->view('jadwal/brsemprop', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
   
    
  }
 
   public function sr_semprop($id)
  {
 
     $data['pageTitle'] = 'Surat Undangan';
      $data['dosen'] = $this->Model_Jdsemprop->dosen();
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji($id);
       $html = $this->load->view('jadwal/srsemprop', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
   
    
  }
  
}