<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stsdosen extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin(); 
        $this->load->model('Model_Stsdosen');
         $this->load->helper(array('form', 'url','date_helper'));
      
    }

   public function index()
    {                
        $data['pageTitle'] = 'Dosen Pembimbing';
        $data['dpem'] = $this->Model_Stsdosen->get()->result();
       $data['dpem1'] = $this->Model_Stsdosen->getm()->result();
       $data['dpem2'] = $this->Model_Stsdosen->getd()->result();
       
        $data['pageContent'] = $this->load->view('status_dosen/dosen_pembimbing', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     public function penguji()
    {                
        $data['pageTitle'] = 'Dosen Penguji';
        $data['dpen'] = $this->Model_Stsdosen->get1()->result();
         $data['dosen'] = $this->Model_Stsdosen->get11()->result();
        $data['pageContent'] = $this->load->view('status_dosen/dosen_penguji', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
   public function penguji_semhas()
    {                
        $data['pageTitle'] = 'Dosen Penguji';
      
        $data['dpenh'] = $this->Model_Stsdosen->get2()->result();
       $data['dosen'] = $this->Model_Stsdosen->get21()->result();
       
        $data['pageContent'] = $this->load->view('status_dosen/dosen_pgsemhas', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    public function penguji_sidang()
    {                
        $data['pageTitle'] = 'Dosen Penguji';
      
        $data['dpens'] = $this->Model_Stsdosen->get3()->result();
          $data['dosen'] = $this->Model_Stsdosen->get31()->result();
     
        
        $data['pageContent'] = $this->load->view('status_dosen/dosen_pgsidang', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
   public function edit_pembimbing($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_bimbing = $this->input->post('id_bimbing');
        $pb1 = $this->input->post('pb1');
         $nama_pb1 = $this->input->post('nama_pb1');
 $nama_pb2 = $this->input->post('nama_pb2');
       
        $pb2 = $this->input->post('pb2');
       
        
      $cek_kd = $this->Model_Stsdosen->id_bimbing();
       $cek_kd1 = $this->Model_Stsdosen->pb1();
        $cek_kd2 = $this->Model_Stsdosen->pb2();
        
     

                        

                            if (($cek_kd->num_rows() == 1) && ($cek_kd1->num_rows() == 1) && ($cek_kd2->num_rows() == 1)  ) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_bimbing'          => $id_bimbing,
                                        'pb1'          => $pb1,
                                         'nama_pb2'          => $nama_pb2,
                                          'nama_pb1'          => $nama_pb1,
                                       
                                        'pb2'          => $pb2,
                                       
                                           );
                                      
                                    
                                     $this->Model_Stsdosen->update_data('pembimbing', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                   redirect('Stsdosen');
                                     
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
                                   redirect('Stsdosen');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah biodata';
      $data['operator'] = $this->Model_Stsdosen->get_idbimbing($id);
       $data['get'] = $this->Model_Stsdosen->get_dosen()->result(); 
       $data['pageContent'] = $this->load->view('status_dosen/ubah_bimbing', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
     

public function edit_penguji($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_semprop = $this->input->post('id_semprop');
        $pg1 = $this->input->post('pg1');
          $nama_pg1 = $this->input->post('nama_pg1');
            $nama_pg2 = $this->input->post('nama_pg2');
       
        $pg2 = $this->input->post('pg2');
      
$cek_kd = $this->Model_Stsdosen->get_data_by_pk('semprop', 'id_semprop', $id_semprop);  
$cek_kd1= $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg1); 
$cek_kd2 = $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg2);  
$cek_kd3 = $this->Model_Stsdosen->pembimbing();

                            if (($cek_kd->num_rows() == 1) && ($cek_kd1->num_rows() == 1) && ($cek_kd2->num_rows() == 1) ) {
                        
                            
                                 $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_semprop'          => $id_semprop,
                                        'pg1'          => $pg1,
                                          'nama_pg1'          => $nama_pg1,
                                          'nama_pg2'          => $nama_pg2,

                                        'pg2'          => $pg2,
                                       
                                           );

                                    
                                     $this->Model_Stsdosen->update_data1('semprop', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                   redirect('Stsdosen/penguji');
                                     
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
                                   redirect('Stsdosen/penguji');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah Penguji';
      $data['operator'] = $this->Model_Stsdosen->get_idpenguji($id);
       $data['get'] = $this->Model_Stsdosen->get_dosen()->result(); 
      $data['pageContent'] = $this->load->view('status_dosen/ubah_penguji', $data, TRUE);
    $this->load->view('template/layout', $data);  
  } 
    public function edit_penguji_semhas($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_semhas = $this->input->post('id_semhas');
        $pg1 = $this->input->post('pg1');
       $nama_pg1 = $this->input->post('nama_pg1');
$nama_pg2 = $this->input->post('nama_pg2');

        $pg2 = $this->input->post('pg2');
         $nip1 = $this->input->post('pg1');
        
                        
$cek_kd = $this->Model_Stsdosen->get_data_by_pk('semhas', 'id_semhas', $id_semhas);  
$cek_kd1= $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg1); 
$cek_kd2 = $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg2);  
$cek_kd3 = $this->Model_Stsdosen->pembimbing();

                            if (($cek_kd->num_rows() == 1) && ($cek_kd1->num_rows() == 1) && ($cek_kd2->num_rows() == 1) ) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_semhas'          => $id_semhas,
                                        'pg1'          => $pg1,
                                        'pg2'          => $pg2,
                                           'nama_pg1'          => $nama_pg1,
            'nama_pg2'          => $nama_pg2,

                                       
                                           );
                                      
                                    
                                     $this->Model_Stsdosen->update_data2('semhas', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                   redirect('Stsdosen/penguji_semhas');
                                     
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
                                   redirect('Stsdosen/penguji_semhas');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah Penguji';
      $data['operator'] = $this->Model_Stsdosen->get_idpengujih($id);
       $data['get'] = $this->Model_Stsdosen->get_dosen()->result(); 
      $data['pageContent'] = $this->load->view('status_dosen/ubah_pengujih', $data, TRUE);
    $this->load->view('template/layout', $data);  
  } 
   public function edit_penguji_sidang($id)
  {
 if (isset($_POST['btnlogin'])){

         $id_sidang = $this->input->post('id_sidang');
        $pg1 = $this->input->post('pg1');
       $nama_pg1 = $this->input->post('nama_pg1');
       $nama_pg2 = $this->input->post('nama_pg2');
        $pg2 = $this->input->post('pg2');
         $nip1 = $this->input->post('pg1');
        
     $cek_kd = $this->Model_Stsdosen->get_data_by_pk('sidang', 'id_sidang', $id_sidang);  
$cek_kd1= $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg1); 
$cek_kd2 = $this->Model_Stsdosen->get_data_by_pk('dosen', 'nip', $pg2);  
$cek_kd3 = $this->Model_Stsdosen->pembimbing();

                            if (($cek_kd->num_rows() == 1) && ($cek_kd1->num_rows() == 1) && ($cek_kd2->num_rows() == 1) ) {
                        

                            
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       'id_sidang'          => $id_sidang,
                                        'pg1'          => $pg1,
                                        'pg2'          => $pg2,
                                        'nama_pg1'          => $nama_pg1,
                                        'nama_pg2'          => $nama_pg2,

                                       
                                           );
                                      
                                    
                                     $this->Model_Stsdosen->update_data3('sidang', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                   redirect('Stsdosen/penguji_sidang');
                                     
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
                                   redirect('Stsdosen/penguji_sidang');
                                     
                            }
                    }
     $data['pageTitle'] = 'Ubah Penguji';
      $data['operator'] = $this->Model_Stsdosen->get_idpengujis($id);
       $data['get'] = $this->Model_Stsdosen->get_dosen()->result(); 
      $data['pageContent'] = $this->load->view('status_dosen/ubah_pengujis', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }                 
   function get_nmdosen(){
        $nip = $this->input->post('nip');
        $data = $this->Model_Stsdosen->get_nmdosen($nip);
        echo json_encode($data);
    }
    }
