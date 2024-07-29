<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semhas extends MY_Controller 
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
        $data['pageTitle'] = 'Jadwal Semhas';
        $data['semhas'] = $this->Model_Jdsemprop->tglsemhas()->result();
        $data['Jdsemhas'] = $this->Model_Jdsemprop->get1()->result();
          $data['Jdsemhas1'] = $this->Model_Jdsemprop->dptm1()->result();
            $data['Jdsemhas2'] = $this->Model_Jdsemprop->dptd1()->result();
       
        $data['pageContent'] = $this->load->view('jadwal/semhas', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    public function Jdsemhas_selesai()
    {                
        $data['pageTitle'] = 'Jadwal Semhas';
        $data['Jdsemhas'] = $this->Model_Jdsemprop->dpt1()->result();
        $data['semhas'] = $this->Model_Jdsemprop->tglsemhas()->result();
        $data['pageContent'] = $this->load->view('jadwal/semhas1', $data, TRUE);

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
   

  public function ejd_semhas($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_semhas = $this->input->post('id_semhas');
        $ruang = $this->input->post('ruang');
       
        $tanggal1 = $this->input->post('tanggal1');
         $pukul = $this->input->post('pukul');
        
      $cek_kd = $this->Model_Jdsemprop->id_semhas();

                        

                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_semhas'          => $id_semhas,
                                        'ruang'          => $ruang,
                                        'tanggal1'          => $tanggal1,
                                        'pukul'          => $pukul,
                                       
                                           );
                                      
                                    
                                     $this->Model_Jdsemprop->update_data1('semhas', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('semhas');
                                     
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
                                    redirect('semhas');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah Jadwal';
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji1($id);
      $data['pageContent'] = $this->load->view('jadwal/ejdsemhas', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
  
  public function br_semhas($id)
  {

     $data['pageTitle'] = 'Berita Acara';
      $data['dosen'] = $this->Model_Jdsemprop->dosen();
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji1($id);
     $html = $this->load->view('jadwal/brsemhas', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
   
  }

  public function sr_semhas($id)
  {

     $data['pageTitle'] = 'Surat Undangan';
      $data['dosen'] = $this->Model_Jdsemprop->dosen();
      $data['operator'] = $this->Model_Jdsemprop->get_idpenguji1($id);
     $html = $this->load->view('jadwal/srsemhas', $data, TRUE);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P','A4');
        // $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output(/*$pdfFilePath, "D"*/);
        exit();    
   
  }
 
}