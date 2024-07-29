<?php defined('BASEPATH') OR exit('No direct script access allowed');

class berkas extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin(); 
        $this->load->model('Model_berkas');
         $this->load->helper(array('form', 'url','date_helper'));
          $this->load->library('m_pdf');
      
    }

    public function detail(){
        $data['pageTitle'] = 'Berkas';
        $tahun = $this->uri->segment(3);
        if ($tahun==''){
      echo "<script>alert('Tahun belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
  $data['mahasiswa'] = $this->Model_berkas->get_data($tahun);
  $data['pageContent'] = $this->load->view('berkas/detail', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
  }
  
   public function detail1(){
        $data['pageTitle'] = 'Berkas';
        $tahun = $this->uri->segment(3);
        if ($tahun==''){
      echo "<script>alert('Tahun belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
  $data['mahasiswa1'] = $this->Model_berkas->get_data1($tahun);
  $data['pageContent'] = $this->load->view('berkas/detail1', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
  }
  public function detail2(){
        $data['pageTitle'] = 'Berkas';
        $tahun = $this->uri->segment(3);
        if ($tahun==''){
      echo "<script>alert('Tahun belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
  $data['mahasiswa'] = $this->Model_berkas->get_data2($tahun);
  $data['pageContent'] = $this->load->view('berkas/detail3', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
  }
    public function index()
    {                
    	
        $data['pageTitle'] = 'Berkas Semeniar Proposal';
          $data['data_ms'] = $this->Model_berkas->get11()->result();
        $data['data_mhs'] = $this->Model_berkas->get1()->result();
        $data['data_opr'] = $this->Model_berkas->get()->result();
        $data['satu'] = $this->Model_berkas->satu()->result();
        $data['pageContent'] = $this->load->view('berkas/bksemp', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

     public function semhas()
    {                
        $data['pageTitle'] = 'Berkas Seminar Hasil';
        $data['opr'] = $this->Model_berkas->get_semhas()->result();
          $data['ms'] = $this->Model_berkas->get_semhas11()->result();
         $data['mhs'] = $this->Model_berkas->get_semhas1()->result();
        $data['satu'] = $this->Model_berkas->satu()->result();
        $data['pageContent'] = $this->load->view('berkas/semhas', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     
public function sidang()
    {                
        $data['pageTitle'] = 'Berkas Sidang Skripsi';
        $data['opr'] = $this->Model_berkas->get_sidang()->result();
         $data['ms'] = $this->Model_berkas->get11()->result();
         $data['mhs'] = $this->Model_berkas->get_sidang1()->result();
        $data['satu'] = $this->Model_berkas->satu()->result();
        $data['pageContent'] = $this->load->view('berkas/sidang', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
   
   public function iptsemprop($id)
  { 
          if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
        $pg1 = $this->input->post('pg1');
        $nama_pg1 = $this->input->post('nama_pg1');
        $nama_pg2 = $this->input->post('nama_pg2');
        $pg2 = $this->input->post('pg2');
        $ruang = $this->input->post('ruang');     
        $pukul = $this->input->post('pukul');     
        $tanggal = $this->input->post('tanggal'); 
         $id_bimbing = $this->input->post('id_bimbing'); 
          $id_semprop = $this->input->post('id_semprop');     
            $id_syarat = $this->input->post('id_semprop');    
              $dipt = $this->input->post('dipt');      
     

       

                        $cek_kd = $this->Model_berkas->get_data_by_pk('semprop', 'id_semprop', $id_semprop);
                         $cek_kd1 = $this->Model_berkas->pb1();
                         $cek_kd2 = $this->Model_berkas->pembimbing();

                            if (($cek_kd->num_rows() == 0) && ($cek_kd1->num_rows() == 0) )  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                        'pg1'          => $pg1,
                                        'nama_pg1'          => $nama_pg1,
                                         'nama_pg2'          => $nama_pg2,
                                        'pg2'          => $pg2,
                                          'ruang'          => $ruang,
                                           'pukul'          => $pukul,
                                            'tanggal'          => $tanggal,
                                             'id_bimbing'          => $id_bimbing,
                                             'id_semprop'          => $id_semprop,
                                               'status'          => 'proses',
                                       
                                        
                                        );
                                    $data1 = array(
                                        'id_syarat'          => $id_semprop,
                            
                                               'acc_seminar'          => 's1',
                                       
                                        
                                        );
                                    
                                    
                                      $data2 = array(
                                       
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semprop',
                                        'dipt'          => $pg1,
                                        
                                        );
                                       $data3 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semprop',
                                                 'dipt'          => $pg2,
                                       
                                        
                                        );
                                        $data4 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semprop',
                                                 'dipt'          => $dipt,
                                       
                                        
                                        );
                                    $this->Model_berkas->save_data('semprop', $data);
                                    $this->Model_berkas->update_data('syarat', $data1);
                                       $this->Model_berkas->save_data('nilai', $data2);
                                       $this->Model_berkas->save_data('nilai', $data3);
                                         $this->Model_berkas->save_data('nilai', $data4);
                                     
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas');
                                     
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
                                     redirect('berkas');
                            }
                    }
        $data['operator'] = $this->Model_berkas->get_mahasiswa_id($id);
      $data['pageTitle'] = 'Daftar Seminar Proposal';
      $data['operator1'] = $this->Model_berkas->get_data_dosen();
        $data['bimbing'] = $this->Model_berkas->get_bimbing();
      $data['pageContent'] = $this->load->view('berkas/dosen_semprop', $data, TRUE);
      $this->load->view('template/layout', $data);      
  }
  public function iptsemhas($id)
  { 
     if (isset($_POST['btnlogin'])){
 $id_semhas = $this->input->post('id_semhas');
  $id_bimbing = $this->input->post('id_bimbing');
  $nama_pg1 = $this->input->post('nama_pg1');
       $nama_pg2 = $this->input->post('nama_pg2');
        $npm = $this->input->post('npm');
        $pg1 = $this->input->post('pg1');
        $pg2 = $this->input->post('pg2');
        $ruang = $this->input->post('ruang');     
        $pukul = $this->input->post('pukul');     
        $tanggal1 = $this->input->post('tanggal1'); 
          $dipt = $this->input->post('dipt');     
      

       

                        
                         $cek_kd = $this->Model_berkas->get_data_by_pk('semhas', 'id_semhas', $id_semhas);
                           $cek_kd1 = $this->Model_berkas->pb2();
                        

                           $cek_kd2 = $this->Model_berkas->pembimbing();

                            if (($cek_kd->num_rows() == 0) && ($cek_kd1->num_rows() == 0) )  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                         'id_semhas'          => $id_semhas,
                                          'id_bimbing'          => $id_bimbing,
                                        'npm'          => $npm,
                                          'nama_pg1'          => $nama_pg1,
                                        'nama_pg2'          => $nama_pg2,
                                        'pg1'          => $pg1,
                                        'pg2'          => $pg2,
                                          'ruang'          => $ruang,
                                           'pukul'          => $pukul,
                                            'tanggal1'          => $tanggal1,
                                             'status'          => 'proses',
                                       
                                         
                                           
                                        
                                        );
                                      $data1 = array(
                                        'id_syarat'          => $id_semhas,
                            
                                               'acc_seminar'          => 's2',
                                       
                                        
                                        );
                                        $data2 = array(
                                       
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semhas',
                                        'dipt'          => $pg1,
                                        
                                        );
                                       $data3 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semhas',
                                                 'dipt'          => $pg2,
                                       
                                        
                                        );
                                        $data4 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semhas',
                                                 'dipt'          => $dipt,
                                       
                                        
                                        );
                                    $this->Model_berkas->save_data('semhas', $data);
                                    $this->Model_berkas->save_data('nilai', $data2);
                                     $this->Model_berkas->save_data('nilai', $data3);
                                      $this->Model_berkas->save_data('nilai', $data4);
                                     $this->Model_berkas->update_data1('syarat', $data1);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/semhas');
                                     
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
                                     redirect('berkas/semhas');
                            }
                    }
      $data['operator'] = $this->Model_berkas->get_mahasiswa_id1($id);
      $data['pageTitle'] = 'Daftar Seminar Hasil';
      $data['operator1'] = $this->Model_berkas->get_data_dosen();
      $data['pageContent'] = $this->load->view('berkas/dosen_semhas', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }

  public function iptsidang($id)
  { 
     if (isset($_POST['btnlogin'])){
 $id_sidang = $this->input->post('id_sidang');
  $id_bimbing = $this->input->post('id_bimbing');
        $npm = $this->input->post('npm');
        $pg1 = $this->input->post('pg1');
         $nama_pg1 = $this->input->post('nama_pg1');
          $nama_pg2 = $this->input->post('nama_pg2');
        $pg2 = $this->input->post('pg2');
        $ruang = $this->input->post('ruang');     
        $pukul = $this->input->post('pukul');     
        $tanggal3 = $this->input->post('tanggal3');     
         $dipt = $this->input->post('dipt');     
      

       

                        
                         $cek_kd = $this->Model_berkas->get_data_by_pk('sidang', 'id_sidang', $id_sidang);
                            $cek_kd1 = $this->Model_berkas->pb3();
                        
 $cek_kd2 = $this->Model_berkas->pembimbing();

                            if (($cek_kd->num_rows() == 0) && ($cek_kd1->num_rows() == 0) )  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                         'id_sidang'          => $id_sidang,
                                         'id_bimbing'          => $id_bimbing,
                                        'npm'          => $npm,
                                        'pg1'          => $pg1,
                                         'nama_pg2'          => $nama_pg2,
                                          'nama_pg1'          => $nama_pg1,
                                        'pg2'          => $pg2,
                                          'ruang'          => $ruang,
                                           'pukul'          => $pukul,
                                            'tanggal3'          => $tanggal3,
                                            'status'          => 'proses',
                                       
                                         
                                           
                                        
                                        );
                                      $data1 = array(
                                        'id_syarat'          => $id_sidang,
                            
                                               'acc_seminar'          => 's3',
                                       
                                        
                                        );
                                       $data2 = array(
                                       
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'sidang',
                                        'dipt'          => $pg1,
                                        
                                        );
                                       $data3 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'sidang',
                                                 'dipt'          => $pg2,
                                       
                                        
                                        );
                                        $data4 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'sidang',
                                                 'dipt'          => $dipt,
                                       
                                        
                                        );
                                    $this->Model_berkas->save_data('nilai', $data2);
                                     $this->Model_berkas->save_data('nilai', $data3);
                                      $this->Model_berkas->save_data('nilai', $data4);
                                    $this->Model_berkas->save_data('sidang', $data);
                                     $this->Model_berkas->update_data2('syarat', $data1);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/sidang');
                                     
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
                                     redirect('berkas/sidang');
                            }
                    }
      $data['operator'] = $this->Model_berkas->get_mahasiswa_id1($id);
      $data['pageTitle'] = 'Daftar Sidang Skripsi';
      $data['operator1'] = $this->Model_berkas->get_data_dosen();
      $data['pageContent'] = $this->load->view('berkas/dosen_sidang', $data, TRUE);
    $this->load->view('template/layout', $data);  
  }
public function delete_mahasiswa($id)
  {
    $delete_mahasiswa = $this->Model_berkas->delete_mahasiswa($id);
  $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Akun telah Dihapus.
                                         </div>'
                                     );
     echo "<script>history.go(-1);</script>";
  }
 
 public function tbsemprop()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');  
       
            $cek_kd1 = $this->Model_berkas->get_data_by_pk('skripsi', 'id_skripsi', $id_syarat);
                         $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);
                            if (($cek_kd->num_rows() == 0) && ($cek_kd1->num_rows() == 1))  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'semprop',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                   
                                           
                                        
                                        );
                                    
                                  if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                 //   if (!empty($_FILES['ubk']['name'])) {
                                 //    $upload = $this->ubk();
                                 //     $data['ubk'] = $upload;
                                 // }
                                 //   if (!empty($_FILES['toefel']['name'])) {
                                 //    $upload = $this->toefel();
                                 //     $data['toefel'] = $upload;
                                 // }
                                  


                                    $this->Model_berkas->save_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsemprop');
                                     
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
                                     redirect('berkas');
                            }
                    }
        $data['pageTitle'] = 'Tambah Berkas Seminar Semprop';
        $data['tambah'] = $this->Model_berkas->get()->result();  
        $data['operator'] = $this->Model_berkas->get_skrip()->result();
         $data['mahasiswa'] = $this->Model_berkas->get_skrip1()->result();
        $data['pageContent'] = $this->load->view('berkas/tbsemprop', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

 public function etbsemprop()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');      
                         $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);
                            if ($cek_kd->num_rows() == 1)  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'semprop',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                           
                                        
                                        );
                                    
                                 if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                
                                  

                                    $this->Model_berkas->upda_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsemprop');
                                     
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
                                     redirect('berkas');
                            }
                    }
        $data['pageTitle'] = 'Ubah Berkas Seminar Semprop';
      
        $data['pageContent'] = $this->load->view('berkas/etbsemprop', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

    public function etbsemhas()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');      
                         $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);
                            if ($cek_kd->num_rows() == 1)  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'semhas',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                           
                                        
                                        );
                                    
                                  if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                 //   if (!empty($_FILES['ubk']['name'])) {
                                 //    $upload = $this->ubk();
                                 //     $data['ubk'] = $upload;
                                 // }
                                 //   if (!empty($_FILES['toefel']['name'])) {
                                 //    $upload = $this->toefel();
                                 //     $data['toefel'] = $upload;
                                 // }
                                  


                                    $this->Model_berkas->upda_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsemhas');
                                     
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
                                     redirect('berkas/semhas');
                            }
                    }
        $data['pageTitle'] = 'Ubah Berkas Seminar Hasil';
      
        $data['pageContent'] = $this->load->view('berkas/etbsemhas', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
public function etbsidang()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');      
                         $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);
                            if ($cek_kd->num_rows() == 1)  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'sidang',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                           
                                        
                                        );
                                    
                                 if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                 //   if (!empty($_FILES['ubk']['name'])) {
                                 //    $upload = $this->ubk();
                                 //     $data['ubk'] = $upload;
                                 // }
                                 //   if (!empty($_FILES['toefel']['name'])) {
                                 //    $upload = $this->toefel();
                                 //     $data['toefel'] = $upload;
                                 // }
                                  


                                    $this->Model_berkas->upda_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsidang');
                                     
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
                                     redirect('berkas/sidang');
                            }
                    }
        $data['pageTitle'] = 'Ubah Berkas Sidang Skripsi';
        $data['pageContent'] = $this->load->view('berkas/etbsidang', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }



public function tbsemhas()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');
         $id_nilai = $this->input->post('id_syarat');
          
       
        $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);

                  
                            

                            if ($cek_kd->num_rows() ==0 )  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'semhas',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                   
                                           
                                        
                                        );
                                    
                                  if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                 //   if (!empty($_FILES['ubk']['name'])) {
                                 //    $upload = $this->ubk();
                                 //     $data['ubk'] = $upload;
                                 // }
                                 //   if (!empty($_FILES['toefel']['name'])) {
                                 //    $upload = $this->toefel();
                                 //     $data['toefel'] = $upload;
                                 // }
                                  


                                    $this->Model_berkas->save_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsemhas');
                                     
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
                                     redirect('berkas/semhas');
                            }
                    }
        $data['pageTitle'] = 'Tambah Berkas Seminar Hasil';
        $data['tambah'] = $this->Model_berkas->get()->result();  
         $data['operator'] = $this->Model_berkas->get_semprop()->result(); 
          $data['mahasiswa'] = $this->Model_berkas->get_semprop1()->result();       
        $data['pageContent'] = $this->load->view('berkas/tbsemhas', $data,TRUE);

        $this->load->view('template/layout', $data);        
    }
   
public function tbsidang()
    {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
         $tahun = $this->input->post('tahun');
        $id_syarat = $this->input->post('id_syarat');
         $id_nilai = $this->input->post('id_syarat');
         

       
       

                        $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'id_syarat', $id_syarat);
                      
                            if ($cek_kd->num_rows() ==0 ){
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'sidang',
                                       'tahun'          =>  $tahun,
                                      'id_syarat'          => $id_syarat,
                                     

                                           
                                        
                                        );
                                    
                               if (!empty($_FILES['fileskrip']['name'])) {
                                    $upload = $this->fileskrip();
                                     $data['fileskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['kbskrip']['name'])) {
                                    $upload = $this->kbskrip();
                                     $data['kbskrip'] = $upload;
                                 }
                                   if (!empty($_FILES['sizin']['name'])) {
                                    $upload = $this->sizin();
                                     $data['sizin'] = $upload;
                                 }
                                   if (!empty($_FILES['ukt']['name'])) {
                                    $upload = $this->ukt();
                                     $data['ukt'] = $upload;
                                 }
                                 //   if (!empty($_FILES['plagiat']['name'])) {
                                 //    $upload = $this->plagiat();
                                 //     $data['plagiat'] = $upload;
                                 // }
                                   if (!empty($_FILES['transkrip']['name'])) {
                                    $upload = $this->transkrip();
                                     $data['transkrip'] = $upload;
                                 }
                                 //   if (!empty($_FILES['spenelitian']['name'])) {
                                 //    $upload = $this->spenelitian();
                                 //     $data['spenelitian'] = $upload;
                                 // }
                                   if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->lhs();
                                     $data['lhs'] = $upload;
                                 }
                                   if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->krs();
                                     $data['krs'] = $upload;
                                 }
                                   if (!empty($_FILES['ijazah']['name'])) {
                                    $upload = $this->ijazah();
                                     $data['ijazah'] = $upload;
                                 }
                                   if (!empty($_FILES['nim']['name'])) {
                                    $upload = $this->nim();
                                     $data['nim'] = $upload;
                                 }
                                   if (!empty($_FILES['foto']['name'])) {
                                    $upload = $this->foto();
                                     $data['foto'] = $upload;
                                 }
                                 //   if (!empty($_FILES['ubk']['name'])) {
                                 //    $upload = $this->ubk();
                                 //     $data['ubk'] = $upload;
                                 // }
                                 //   if (!empty($_FILES['toefel']['name'])) {
                                 //    $upload = $this->toefel();
                                 //     $data['toefel'] = $upload;
                                 // }
                                  

                                    $this->Model_berkas->save_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas/etbsidang');
                                     
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
                                     redirect('berkas/sidang');
                            }
                    }
        $data['pageTitle'] = 'Tambah Berkas Sidang Skripsi';
        $data['tambah'] = $this->Model_berkas->get()->result();  
        $data['operator'] = $this->Model_berkas->tbisidang()->result();
         $data['mahasiswa'] = $this->Model_berkas->tbisidang1()->result();       
        $data['pageContent'] = $this->load->view('berkas/tbsidang', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    
   
  
    public function tambah_mhs()
  {
    if (isset($_POST['btnlogin'])){

        $npm = $this->input->post('npm');
       
       

                        
                         $cek_kd = $this->Model_berkas->get_data_by_pk('syarat', 'npm', $npm);
                            if ($cek_kd->num_rows() == 0) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                      'acc_seminar'          => 'semprop',
                                           
                                        
                                        );
                                     if (!empty($_FILES['krs']['name'])) {
                                    $upload = $this->_do_upload();
                                     $data['krs'] = $upload;
                                 }
                                  if (!empty($_FILES['lhs']['name'])) {
                                    $upload = $this->_do_upload();
                                     $data['lhs'] = $upload;
                                 }

                                    $this->Model_berkas->save_data('syarat', $data);
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('berkas');
                                     
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
                                     redirect('berkas');
                            }
                    }
        $data['pageTitle'] = 'Tambah';
     $data['pageContent'] = $this->load->view('berkas/tambah_mhs2', $data, TRUE);
     $this->load->view('template/layout', $data);   
    }
    private function fileskrip()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileskrip')) {
            $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
           
        }
        
        return $this->upload->data('file_name');
    }
     private function kbskrip()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('kbskrip')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
    
     private function sizin()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('sizin')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
     private function ukt()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ukt')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
 private function plagiat()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('plagiat')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
     private function transkrip()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('transkrip')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
     private function spenelitian()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('spenelitian')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
     private function lhs()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('lhs')) {
           $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }
     private function krs()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('krs')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }

    private function ijazah()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ijazah')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    } 

 private function nim()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('nim')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }

 private function foto()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }

   private function ubk()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ubk')) {
           $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    }  

    private function toefel()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('toefel')) {
           $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen tidak sesuai.
                                         </div>'
                                     );
            redirect('berkas');
        }
         
        return $this->upload->data('file_name');
    } 
 public function lihat($id)
  {

     $data['pageTitle'] = 'Berkas Seminar';
      $data['operator'] = $this->Model_berkas->lihat_id($id);
       $data['pageContent'] = $this->load->view('berkas/lihat2', $data, TRUE);
        $this->load->view('template/layout', $data);        
      
}
 
 function getbi(){
        $npm = $this->input->post('npm');
        $data = $this->Model_berkas->getbi($npm);
        echo json_encode($data);
    }

    function getk2(){
        $id_skripsi = $this->input->post('id_skripsi');
        $data = $this->Model_berkas->getk2($id_skripsi);
        echo json_encode($data);
    }
     function getsemhas(){
        $id_bimbing = $this->input->post('id_bimbing');
        $data = $this->Model_berkas->getsemhas($id_bimbing);
        echo json_encode($data);
    }
    function getsidang(){
        $id_bimbing = $this->input->post('id_bimbing');
        $data = $this->Model_berkas->getsidang($id_bimbing);
        echo json_encode($data);
    }

function get_nmdosen(){
        $nip = $this->input->post('nip');
        $data = $this->Model_berkas->get_nmdosen($nip);
        echo json_encode($data);
      }
   public function sel($id)
  {

      $data['operator'] = $this->Model_berkas->get_aktifasi2_id($id);
      $data['pageTitle'] = 'Aktifasi';
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_berkas->edit_aktifasi2($id);
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Mahasiswa sudah diaktifasi.
                                         </div>'
                                     );
      redirect('berkas');
    
    
  }
}