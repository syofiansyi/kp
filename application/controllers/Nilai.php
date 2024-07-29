<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin(); 
        $this->load->model('Model_nilai');
         $this->load->helper(array('form', 'url','date_helper'));
      
    }
     public function pengumuman_lulus()
    {                
        $data['pageTitle'] = 'Lulus';
        $data['pageContent'] = $this->load->view('nilai/p1', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

     public function pengumuman_gagal()
    {                
        $data['pageTitle'] = 'Gagal';
        $data['pageContent'] = $this->load->view('nilai/p2', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

    public function index()
    {                
        $data['pageTitle'] = 'Nilai Semprop';
        $data['result'] = $this->Model_nilai->get_nlsemprop()->result();
         $data['pengumuman'] = $this->Model_nilai->get_nlsemprop1()->result();
        $data['result1'] = $this->Model_nilai->draft_nlsemprop()->result();
        $data['pageContent'] = $this->load->view('nilai/nlsemprop', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     
     public function nlsemhas()
    {                
        $data['pageTitle'] = 'Nilai Semhas';
        $data['result'] = $this->Model_nilai->get_nlsemhas()->result();
          $data['pengumuman'] = $this->Model_nilai->get_nlsemhas1()->result();
        $data['result1'] = $this->Model_nilai->draft_nlsemhas()->result();
        $data['pageContent'] = $this->load->view('nilai/nlsemhas', $data, TRUE);
        

        $this->load->view('template/layout', $data);        
    }
     public function nlsidang()
    {                
        $data['pageTitle'] = 'Nilai Sidang';
        $data['result'] = $this->Model_nilai->get_nlsidang()->result();
          $data['pengumuman'] = $this->Model_nilai->get_nlsidang1()->result();
        $data['result1'] = $this->Model_nilai->draft_nlsidang()->result();
        $data['pageContent'] = $this->load->view('nilai/nlsidang', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
   
   
    function getAsn(){
        $id_semprop = $this->input->post('id_semprop');
        $data = $this->Model_nilai->getAsn($id_semprop);
        echo json_encode($data);
    }
     function getuk(){
        $id_sidang = $this->input->post('id_sidang');
        $data = $this->Model_nilai->getuk($id_sidang);
        echo json_encode($data);
    }
     function getok(){
        $id_semhas = $this->input->post('id_semhas');
        $data = $this->Model_nilai->getok($id_semhas);
        echo json_encode($data);
    }
     function getasa(){
        $npm = $this->input->post('npm');
        $data = $this->Model_nilai->getasa($npm);
        echo json_encode($data);
    }
     function getasam(){
        $npm = $this->input->post('npm');
        $data = $this->Model_nilai->getasam($npm);
        echo json_encode($data);
    }

    public function status_lulus($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'Lulus';
      $data['pageContent'] = $this->load->view('nilai/lulus', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->status_lulus($id);
      

      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
     $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }

  public function status_gagal($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'gagal';
      $data['pageContent'] = $this->load->view('nilai/gagal', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->status_gagal($id);
     
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
       $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }
   public function stlulus_semhas($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'Lulus';
      $data['pageContent'] = $this->load->view('nilai/lulus', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->stlulus_semhas($id);
      

      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
     $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }

  public function stgagal_semhas($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'gagal';
      $data['pageContent'] = $this->load->view('nilai/gagal', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->stgagal_semhas($id);
     
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
       $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }
  public function stlulus_sidang($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'Lulus';
      $data['pageContent'] = $this->load->view('nilai/lulus', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->stlulus_sidang($id);
      

      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
     $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }

  public function stgagal_sidang($id)
  {

      $data['operator'] = $this->Model_nilai->get_status_id($id);
      $data['pageTitle'] = 'gagal';
      $data['pageContent'] = $this->load->view('nilai/gagal', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_nilai->stgagal_sidang($id);
     
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
       $url = $_SERVER['HTTP_REFERER'];
redirect($url);
    
    
  }
public function esemp_nilai($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_nilai = $this->input->post('id_nilai');
          $id_bimbing = $this->input->post('id_bimbing');
         $total = $this->input->post('total');
        $pendahuluan = $this->input->post('pendahuluan');
         $pustaka = $this->input->post('pustaka');
        
           $materi = $this->input->post('materi');
           
             $bahasa = $this->input->post('bahasa');
           $ttulis = $this->input->post('ttulis');
           $argumen = $this->input->post('argumen');
           $metode = $this->input->post('metode');
           $metopen = $this->input->post('metopen');
       
       
      $cek_kd = $this->Model_nilai->id_nilai();

                        

                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_nilai'          => $id_nilai,
                                        'pendahuluan'          => $pendahuluan,
                                        'pustaka'          => $pustaka,
                                        'hasilpem'          => $hasilpem,
                                        'materi'          => $materi,
                                     
                                        'bahasa'          => $bahasa,
                                        'ttulis'          => $ttulis,
                                        'argumen'          => $argumen,
                                        'metode'          => $metode,
                                        'metopen'          => $metopen,
                                         'total'          => ($metopen + $argumen + $pendahuluan + $pustaka  + $materi + $bahasa + $ttulis  +$metode),
                                       
                                       
                                           );
                                      $data1 = array(
                                        'id_bimbing'          => $id_bimbing,
                                        'status'          => 'selesai',
                                        );
                                     $this->Model_nilai->update_data1('semprop', $data1);
                                     $this->Model_nilai->update_data('nilai', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('nilai');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" esemp_nilaiaria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Data gagal disimpan.
                                         </div>'
                                     );
                                    redirect('nilai');
                                     
                            }
                    }
     $data['pageTitle'] = 'Nilai Seminar proposal';
      $data['operator'] = $this->Model_nilai->get_idnilai($id);
      $data['pageContent'] = $this->load->view('nilai/esemp_nilai', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
public function esemhas_nilai($id)
  {
 if (isset($_POST['btnlogin'])){

 $id_bimbing = $this->input->post('id_bimbing');
         $id_nilai = $this->input->post('id_nilai');
         $total = $this->input->post('total');
        $pendahuluan = $this->input->post('pendahuluan');
         $pustaka = $this->input->post('pustaka');
          $hasilpem = $this->input->post('hasilpem');
           $materi = $this->input->post('materi');
          
             $bahasa = $this->input->post('bahasa');
           $ttulis = $this->input->post('ttulis');
           $argumen = $this->input->post('argumen');
           $metode = $this->input->post('metode');
           $metopen = $this->input->post('metopen');
       
       
      $cek_kd = $this->Model_nilai->id_nilai();

                        

                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_nilai'          => $id_nilai,
                                        'pendahuluan'          => $pendahuluan,
                                        'pustaka'          => $pustaka,
                                        'hasilpem'          => $hasilpem,
                                        'materi'          => $materi,
                                        'bahasa'          => $bahasa,
                                        'ttulis'          => $ttulis,
                                        'argumen'          => $argumen,
                                        'metode'          => $metode,
                                        'metopen'          => $metopen,
                                         'total'          => ($metopen + $argumen + $pendahuluan + $pustaka + $hasilpem + $materi + $bahasa + $ttulis  +$metode),
                                       
                                       
                                           );
                                      $data1 = array(
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'status'          => 'selesai',
                                       
                                        
                                        );
                                     $this->Model_nilai->update_data2('semhas', $data1);
                                    
                                     $this->Model_nilai->update_data('nilai', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('nilai/nlsemhas');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" esemp_nilaiaria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Data gagal disimpan.
                                         </div>'
                                     );
                                    redirect('nilai/nlsemhas');
                                     
                            }
                    }
     $data['pageTitle'] = 'Nilai Seminar Hasil';
      $data['operator'] = $this->Model_nilai->get_idnilai($id);
      $data['pageContent'] = $this->load->view('nilai/esemhas_nilai', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
public function edsid_nilai($id)
  {
 if (isset($_POST['btnlogin'])){
 $id_bimbing = $this->input->post('id_bimbing');
         $id_nilai = $this->input->post('id_nilai');
         $total = $this->input->post('total');
        $pendahuluan = $this->input->post('pendahuluan');
         $pustaka = $this->input->post('pustaka');
          $hasilpem = $this->input->post('hasilpem');
           $materi = $this->input->post('materi');
            $simpsar = $this->input->post('simpsar');
             $bahasa = $this->input->post('bahasa');
           $ttulis = $this->input->post('ttulis');
           $argumen = $this->input->post('argumen');
           $metode = $this->input->post('metode');
           $metopen = $this->input->post('metopen');
       
       
      $cek_kd = $this->Model_nilai->id_nilai();

                        

                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_nilai'          => $id_nilai,
                                        'pendahuluan'          => $pendahuluan,
                                        'pustaka'          => $pustaka,
                                        'hasilpem'          => $hasilpem,
                                        'materi'          => $materi,
                                        'simpsar'          => $simpsar,
                                        'bahasa'          => $bahasa,
                                        'ttulis'          => $ttulis,
                                        'argumen'          => $argumen,
                                        'metode'          => $metode,
                                        'metopen'          => $metopen,
                                         'total'          => ($metopen + $argumen + $pendahuluan + $pustaka + $hasilpem + $materi + $simpsar + $bahasa + $ttulis  +$metode),
                                       
                                       
                                           );
                                      $data1 = array(
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'status'          => 'selesai',
                                       
                                        
                                        );
                                     $this->Model_nilai->update_data3('sidang', $data1);
                                    
                                     $this->Model_nilai->update_data('nilai', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('nilai/nlsidang');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" esemp_nilaiaria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Data gagal disimpan.
                                         </div>'
                                     );
                                    redirect('nilai/nlsidang');
                                     
                            }
                    }
     $data['pageTitle'] = 'Nilai Seminar Hasil';
      $data['operator'] = $this->Model_nilai->get_idnilai($id);
      $data['pageContent'] = $this->load->view('nilai/edsid_nilai', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
  
}