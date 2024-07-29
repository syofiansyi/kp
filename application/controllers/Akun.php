<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();  
         $this->cekLogin(); 
        $this->load->model(array('model_akun','Model_login', 'Model_dashboard', 'Model_biodata'));
        $this->load->helper('date_helper');
      
    }

public function detail(){
   $data['pageTitle'] = 'Biodata';
   $level = $this->uri->segment(3);
  if ($level==''){
      echo "<script>alert('Angkatan belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
  $data['mahasiswa'] = $this->model_akun->get_data($level);
  $data['pageContent'] = $this->load->view('akun/sa', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
  }
  
    public function index()
    {                
         $data['pageTitle'] = 'Biodata';
        $data['biodata'] = $this->model_akun->get()->result();
        $data['pageContent'] = $this->load->view('akun/akun', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
     public function pesan()
    {                
         $data['pageTitle'] = 'Pesan';
        $data['pesan'] = $this->model_akun->pesan()->result();
        $data['pageContent'] = $this->load->view('akun/pesan', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
    
     public function pesanbc()
    {                
         $data['pageTitle'] = 'Pesan';
        $data['pesan'] = $this->model_akun->pesanbc()->result();
        $data['pageContent'] = $this->load->view('akun/pesanbc2', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
    
    public function aktifasi_akun()
    {                
        $data['pageTitle'] = 'Akun Teraktifasi';
        $data['biodata'] = $this->model_akun->getaktifasi()->result();
        $data['satu'] = $this->model_akun->satu()->result();
       
        $data['pageContent'] = $this->load->view('akun/aktifasi_akun', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     public function dosen()
    {                
        $data['pageTitle'] = 'Dosen';
        $data['biodata'] = $this->model_akun->get_dosen()->result();
       
        $data['pageContent'] = $this->load->view('akun/dosen', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

  public function tambah_mhs()
    {
        
      if (isset($_POST['btnlogin'])){
        $npm = $this->input->post('npm');
    $nama_mhs= $this->input->post('nama_mhs');
        $password = md5($this->input->post('password'));
       

                        
                         $cek_kd = $this->model_akun->get_data_by_pk('mahasiswa', 'npm', $npm);
                            if ($cek_kd->num_rows() == 0) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                        'nama_mhs' => $nama_mhs,
                                        'password'          => $password,
                                      
                                        'level'          => '1',
                                      
                                        );
                                      if (!empty($_FILES['matkul_metopen']['name'])) {
                                    $upload = $this->matkul_tambah();
                                     $data['matkul_metopen'] = $upload;
                                 }

                                    $this->model_akun->save_data('mahasiswa', $data);
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );

                                    redirect('akun');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert" style="height: 40px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                              <strong>Gagal!</strong>Npm telah terdaftar.
                                         </div>'
                                     );
                                     redirect('akun/tambah_mhs');
                            }
                    }
        $data['pageTitle'] = 'Tambah Akun Mahasiswa';
        $data['tambah'] = $this->model_akun->get()->result();           
        $data['pageContent'] = $this->load->view('akun/tambah_mhs', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     public function tambah_dosen()
    {
        
      if (isset($_POST['btnlogin'])){
        $nip = $this->input->post('nip');
        $nama_dosen = $this->input->post('nama_dosen');
        $password = md5($this->input->post('password'));
       

                        
                         $cek_kd = $this->model_akun->get_data_by_pk('dosen', 'nip', $nip);
                            if ($cek_kd->num_rows() == 0) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'nip'          => $nip,
                                        'nama_dosen'          => $nama_dosen,
                                        'password'          => $password,
                                        'level'          => '1',
                                     
                                      
                                      
                                        );
                                    $this->model_akun->save_data('dosen', $data);
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
                                    redirect('akun/dosen');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Gagal!</strong>Nip telah terdaftar.
                                         </div>'
                                     );
                                     redirect('akun/tambah_dosen');
                            }
                    }
        $data['pageTitle'] = 'Tambah Akun Dosen';
        $data['tambah'] = $this->model_akun->get()->result();           
        $data['pageContent'] = $this->load->view('akun/tambah_dosen', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }

public function tbpesan()
    {
        
      if (isset($_POST['btnlogin'])){
        $penerima = $this->input->post('penerima');
        $pesan = $this->input->post('pesan');
         $pengirim = $this->session->userdata('username');
          $nama = $this->session->userdata('nama');
      
       

                        
                         $cek_kd1 = $this->model_akun->get_data_by_pk('dosen', 'nip', $penerima);
                          $cek_kd2 = $this->model_akun->get_data_by_pk('mahasiswa', 'npm', $penerima);
                           $cek_kd3 = $this->model_akun->get_data_by_pk('operator', 'username', $penerima);
                            if (($cek_kd1->num_rows() == 1) || ($cek_kd2->num_rows() == 1)||($cek_kd3->num_rows() == 1))  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'penerima'          => $penerima,
                                        'pesan'          => $pesan,
                                        'pengirim'          => $pengirim,
                                        'nama'         => $nama,
                                         'status'         => 'terkirim',
                                     
                                        );
                                      if (!empty($_FILES['doc']['name'])) {
                                    $upload = $this->doc();
                                     $data['doc'] = $upload;
                                 }
                                    $this->model_akun->save_data('pesan', $data);
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert ">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Berhasil!</strong> Pesan Berhasil Dikirim.
                                         </div>'
                                     );
                                    redirect('akun/pesan');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert ">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Gagal!</strong> Username tidak terdaftar.
                                         </div>'
                                     );
                                     redirect('akun/pesan');
                            }
                    }
        $data['pageTitle'] = 'Pesan';      
        $data['pageContent'] = $this->load->view('akun/tbpesan', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }


 public function aktifasi($id)
  {

      $data['operator'] = $this->model_akun->get_aktifasi2_id($id);
      $data['pageTitle'] = 'Aktifasi';
      $data['pageContent'] = $this->load->view('akun/aktifasi', $data, TRUE);
      $this->load->view('template/layout', $data);      
  
      $edit_mahasiswa = $this->model_akun->edit_aktifasi2($id);
      $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
      redirect('akun/aktifasi_akun');
    
    
  }    
   public function gtpesanbc($id)
  {

      $data['operator'] = $this->model_akun->getidpesan($id);
      $data['pageTitle'] = 'Aktifasi';
        $data['pesan'] = $this->model_akun->pesan()->result();
      $data['pageContent'] = $this->load->view('akun/editpesan', $data, TRUE);
      $this->load->view('template/layout', $data);      
  
      $edit_mahasiswa = $this->model_akun->editpesan($id);
      
     
    
    
  }           
 public function btpesanbc($id)
  {

      $data['operator'] = $this->model_akun->getidpesan($id);
      $data['pageTitle'] = 'Aktifasi';
        $data['pesan'] = $this->model_akun->pesan()->result();
      $data['pageContent'] = $this->load->view('akun/pesanbc', $data, TRUE);
      $this->load->view('template/layout', $data);      
  
    
  }  
  public function edit_aktifasi($id)
  {

    $this->form_validation->set_rules('npm', 'npm', 'required');
     $this->form_validation->set_rules('nama_mhs', 'nama_mhs', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
  
    if ($this->form_validation->run() === FALSE) {
    
      $data['operator'] = $this->model_akun->get_mahasiswa_id($id);
      $data['pageTitle'] = 'Ubah Password';
      $data['pageContent'] = $this->load->view('akun/aktifasi_ubah', $data, TRUE);
      $this->load->view('template/layout', $data);      
   } else {
      $edit_aktifasi = $this->model_akun->edit_mahasiswa($id);
      $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
      redirect('akun/aktifasi_akun');
    }
    
  }
  public function ubah_passwordm($id)
  {

    $this->form_validation->set_rules('npm', 'npm', 'required');
     $this->form_validation->set_rules('nama_mhs', 'nama_mhs', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
  
    if ($this->form_validation->run() === FALSE) {
    
      $data['operator'] = $this->model_akun->get_mahasiswa_id($id);
      $data['pageTitle'] = 'Ubah Password';
      $data['pageContent'] = $this->load->view('akun/ubah_passwordm', $data, TRUE);
      $this->load->view('template/layout', $data);      
   } else {
      $edit_aktifasi = $this->model_akun->edit_mahasiswa($id);
      $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
      redirect('akun/logout');
    }
    
  }
  public function edit_dosen($id)
  {

  if (isset($_POST['btnlogin'])){
        $nip = $this->input->post('nip');
         $level = $this->input->post('level');
        $nama_dosen = $this->input->post('nama_dosen');
        $password = md5($this->input->post('password'));

       
   $cek_kd = $this->model_akun->get_data_by_pk('dosen', 'nip', $nip);
                        
                         
                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'nip'          => $nip,
                                        'nama_dosen'          => $nama_dosen,
                                        'password'          => $password,
                                        'level'          => $level,
                                      
                                      
                                        );
                                    $this->model_akun->save_data2('dosen', $data);
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
                                    redirect('akun/dosen');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Gagal!</strong>Ketua Prodi Telah Terdaftar.
                                         </div>'
                                     );
                                     redirect('akun/dosen');
                            }
                    }
        $data['pageTitle'] = 'Ubah Akun Dosen';
         $data['operator'] = $this->model_akun->get_dosen_id($id);
        $data['tambah'] = $this->model_akun->get()->result();           
        $data['pageContent'] = $this->load->view('akun/dosen_ubah', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
   public function ubah_passwordd($id)
  {

    $this->form_validation->set_rules('nip', 'nip', 'required');
$this->form_validation->set_rules('nama_dosen', 'nama_dosen', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
  
    if ($this->form_validation->run() === FALSE) {
    
      $data['operator'] = $this->model_akun->get_dosen_id($id);
      $data['pageTitle'] = 'Ubah Password';
      $data['pageContent'] = $this->load->view('akun/ubah_passwordd', $data, TRUE);
      $this->load->view('template/layout', $data);      
   } else {
      $edit_dosen = $this->model_akun->edit_dosen($id);
      $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
      redirect('akun/logout');
    }
    
  }
  public function ubah_passwordo($id)
  {
      if (isset($_POST['btnlogin'])){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
     

                        
                         $cek_kd = $this->model_akun->get_data_by_pk('operator', 'username', $username);
                            if ($cek_kd->num_rows() == 1) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                       
                                        'username'          => $username,
                                        'password'          => $password,
                                     
                                      
                                      
                                        );
                                    $this->model_akun->update_data('operator', $data);
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
                                    redirect('akun/logout');
                                     
                            }else{
                                   $this->session->set_flashdata('msg',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong>'.strtoupper($nip).' sudah terdaftar.
                                         </div>'
                                     );
                                     redirect('akun/logout');
                            }
                    }
        $data['pageTitle'] = 'Ubah Password';
        $data['operator'] = $this->model_akun->get_operator($id);         
        $data['pageContent'] = $this->load->view('akun/operator_ubah', $data, TRUE);

        $this->load->view('template/layout', $data);        

  }
public function delete_mahasiswa($id)
  {
    $delete_mahasiswa = $this->model_akun->delete_mahasiswa($id);
  $this->session->set_flashdata('sukses',
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
  public function delete_pesan($id)
  {
    $delete_mahasiswa = $this->model_akun->delete_pesan($id);
  $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Pesan telah Dihapus.
                                         </div>'
                                     );
    echo "<script>history.go(-1);</script>";
  }
  public function delete_dosen($id)
  {
    $delete_dosen = $this->model_akun->delete_dosen($id);
  $this->session->set_flashdata('sukses',
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
   public function logout()
    {
        // Hapus semua data pada session
        $this->session->sess_destroy();

        // redirect ke halaman login  
        redirect('akun/login');
    }

     private function matsyarat()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('matkul_metopen')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen Tidak sesuai.
                                         </div>'
                                     );
            redirect('akun/daftar');
        }
         
        return $this->upload->data('file_name');
    }
     
     private function matkul_metopen()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('matkul_metopen')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen Tidak sesuai.
                                         </div>'
                                     );
            redirect('akun/ubah_matkul');
        }
         
        return $this->upload->data('file_name');
    }
     private function matkul_tambah()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('matkul_metopen')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen Tidak sesuai.
                                         </div>'
                                     );
            redirect('akun/tambah_mhs');
        }
         
        return $this->upload->data('file_name');
    }
     private function doc()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png|pdf|';
        $config['max_size']             = 500000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('doc')) {
          $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Kapasitas Dokumen Tidak sesuai.
                                         </div>'
                                     );
           echo "<script>history.go(-1);</script>";
        }
         
        return $this->upload->data('file_name');
    }
     public function lihat($id)
  {

      $data['operator'] = $this->model_akun->lihat_id($id);
      $data['pageTitle'] = 'Matkul';
      $data['pageContent'] = $this->load->view('akun/lihat', $data, TRUE);
      $this->load->view('template/layout', $data);        
}
  public function ubah_matkul()
  { 
     if (isset($_POST['btnlogin'])){
  $npm = $this->session->userdata('username');
 $cek_kd = $this->model_akun->get_data_by_pk('mahasiswa', 'npm', $npm);
                        
                        if ($cek_kd->num_rows() == 1)   {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                   
                                    
                                     if (!empty($_FILES['matkul_metopen']['name'])) {
                                    $upload = $this->matkul_metopen();
                                     $data['matkul_metopen'] = $upload;
                                 }


                                    $this->model_akun->update_data1('mahasiswa', $data);
                                    
                            $this->session->set_flashdata('sukses',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
                                    redirect('akun/blm_verif');
                                     
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
                                     redirect('akun/ubah_matkul');
                            }
                          }
      $data['operator'] = $this->model_akun->get_mahasiswaid();
      $data['pageTitle'] = 'Ubah Matkul Prasyarat';
      $data['pageContent'] = $this->load->view('akun/ubah', $data, TRUE);
      $this->load->view('template/layout', $data);     
}
 public function blm_verif()
    {
    $data['operator'] = $this->model_akun->get4();
      $data['pageTitle'] = 'belum terverifikasi';
      $data['pageContent'] = $this->load->view('akun/lihat_matkul', $data, TRUE);
      $this->load->view('template/layout', $data);     
    }
     public function dashboard()
    {

        $data['pageTitle'] = 'Dashboard';
        
        $data['mahasiswa'] = $this->Model_dashboard->count_mahasiswa();
          $data['dosen'] = $this->Model_dashboard->count_dosen();
        
        $data['pageContent'] = $this->load->view('dashboard', $data, TRUE);

        $this->load->view('template/layout', $data);
    }

}