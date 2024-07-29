<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
             
        $this->load->model('Model_biodata');
        $this->load->helper('date_helper');
       
      
    }
public function detail(){
   $data['pageTitle'] = 'Biodata';
   $tahun = $this->uri->segment(3);
  if ($tahun==''){
      echo "<script>alert('Angkatan belum dipilih');</script>";
      echo "<script>history.go(-1);</script>";
    }else {
  $data['mahasiswa'] = $this->Model_biodata->get_data($tahun);
  $data['pageContent'] = $this->load->view('data/sa', $data, TRUE);

        $this->load->view('template/layout', $data);   
    }
  }
    public function index()
    {                
        $data['pageTitle'] = 'Data Mahasiswa';
        $data['operator'] = $this->Model_biodata->get()->result();
          $data['satu'] = $this->Model_biodata->satu()->result();
        $data['mahasiswa'] = $this->Model_biodata->getm()->result();
        $data['pageContent'] = $this->load->view('data/akun', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     public function acc_judul()
    {                
        $data['pageTitle'] = 'Judul Skripsi';
        $data['data_mhs'] = $this->Model_biodata->get2()->result();
         $data['satu'] = $this->Model_biodata->satu()->result();
        $data['pageContent'] = $this->load->view('data/akun2', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    
    public function tbskrip()
    {
        
      if (isset($_POST['btnlogin'])){
        $npm = $this->input->post('npm');
        $nama_mhs = $this->input->post('nama_mhs');
        $judul = $this->input->post('judul');
        $jenis = $this->input->post('jenis');
        $lokasi = $this->input->post('lokasi');
         $tahun = $this->input->post('tahun');
    

                        
                           $cek_kd = $this->Model_biodata->tbskrip();
                           $cek_kd1 = $this->Model_biodata->get_data_by_pk('mahasiswa', 'npm', $npm);
                            if (($cek_kd->num_rows() == 0) && ($cek_kd1->num_rows() == 1)) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                         'judul'          => $judul,
                                          'jenis'          => $jenis,
                                           'lokasi'          => $lokasi,
                                           'tahun'          => $tahun,
                                             'acc_judul'          => 'proses'
                                         
                                           
                                           
                                        
                                        );
                                    $this->Model_biodata->save_data('skripsi', $data);
                                    
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('skripsi');
                                     
                            }else{
                                   $this->session->set_flashdata('msg',
                                         '
                                         <div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong>Data gagal disimpan
                                         </div>'
                                     );
                                     redirect('skripsi');
                            }
                    }
                  
        $data['pageTitle'] = 'Tambah Judul Skripsi';
        $data['tambah'] = $this->Model_biodata->get()->result();  
        $data['operator'] = $this->Model_biodata->get_mhs()->result();           
        $data['mahasiswa'] = $this->Model_biodata->getm()->result();         
        $data['pageContent'] = $this->load->view('data/tbskrip', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
    

               
  public function edit_acc($id)
  {

      $data['operator'] = $this->Model_biodata->get_acc_id($id);
      $data['pageTitle'] = 'Ubah Judul Skripsi';
      $data['pageContent'] = $this->load->view('data/acc', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_biodata->edit_acc($id);
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
      redirect('skripsi');
    
    
  }
public function tolak_mahasiswa($id)
  {
  
     $data['operator'] = $this->Model_biodata->get_acc_id($id);
      $data['pageTitle'] = 'Ubah Judul Skripsi';
      $data['pageContent'] = $this->load->view('data/acc', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_biodata->edit_acc1($id);
      $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil ditolak.
                                         </div>'
                                     );
    echo "<script>history.go(-1);</script>";
  }
  public function terima_bersyarat($id)
  {
  
     $data['operator'] = $this->Model_biodata->get_acc_id($id);
      $data['pageTitle'] = 'Ubah Judul Skripsi';
      $data['pageContent'] = $this->load->view('data/acc', $data, TRUE);
      $this->load->view('template/layout', $data);      
      $edit_mahasiswa = $this->Model_biodata->edit_acc2($id);
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
    echo "<script>history.go(-1);</script>";
  }

  public function delete_dosen($id)
  {
    $delete_dosen = $this->Model_biodata->delete_dosen($id);
  $this->session->set_flashdata('delete_dosen',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Akun telah Dihapus.
                                         </div>'
                                     );
     echo "<script>history.go(-1);</script>";
  
}
  public function tbp($id)
    {
        
      if (isset($_POST['btnlogin'])){
        $id_bimbing = $this->input->post('id_bimbing');
         $id_skripsi = $this->input->post('id_skripsi');
         $npm = $this->input->post('npm');
          $pb1 = $this->input->post('pb1');
             $nama_pb1 = $this->input->post('nama_pb1');
               $nama_pb2 = $this->input->post('nama_pb2');
         $pb2 = $this->input->post('pb2');
       

                        
                         $cek_kd = $this->Model_biodata->get_data_by_pk('pembimbing', 'id_bimbing', $id_bimbing);
                          $cek_kd1 = $this->Model_biodata->get_data_by_pk('dosen', 'nip', $pb1);
                           $cek_kd2 = $this->Model_biodata->get_data_by_pk('dosen', 'nip', $pb2);
                       
                            if (($cek_kd->num_rows() == 0) && ($cek_kd2->num_rows() == 1) &&($cek_kd1->num_rows() == 1))  {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'id_bimbing'          => $id_bimbing,
                                         'npm'          => $npm,
                                         'pb1'          => $pb1,
                                          'nama_pb1'          => $nama_pb1,
                                          'nama_pb2'          => $nama_pb2,
                                           'pb2'          => $pb2,
                                             
                                        );
                                      $data1 = array(
                                        'id_skripsi'          => $id_skripsi,
                                         'acc_judul'          => 'selesai',
                                        );
                                       $data2 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semprop',
                                                 'dipt'          => $pb1,
                                       
                                        
                                        );
                                       $data3 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'semhas',
                                                 'dipt'          => $pb1,
                                       
                                        
                                        );
                                       $data4 = array(
                                        
                                        'id_bimbing'          => $id_bimbing,
                            
                                               'npm'          => $npm,
                                                'jenis_seminar'          => 'sidang',
                                                 'dipt'          => $pb1,
                                       
                                        
                                        );
                                    $this->Model_biodata->save_data('nilai', $data2); 
                                    $this->Model_biodata->save_data('nilai', $data3); 
                                    $this->Model_biodata->save_data('nilai', $data4); 
                                    $this->Model_biodata->save_data('pembimbing', $data);  
                                    $this->Model_biodata->update_data('skripsi', $data1); 
                                   
                                   
                            $this->session->set_flashdata('berhasil',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.
                                         </div>'
                                     );
                                    redirect('skripsi');
                                     
                            }else{
                                   $this->session->set_flashdata('gagal',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong>Data gagal disimpan
                                         </div>'
                                     );
                                     redirect('skripsi');
                            }
                    }
        $data['pageTitle'] = 'Tambah Pembimbing';
          $data['mahasiswa2'] = $this->Model_biodata->get_mahasiswa_id($id);
         $data['data_mhs'] = $this->Model_biodata->get2()->result();
        $data['tambah'] = $this->Model_biodata->get()->result();  
         $data['operator'] = $this->Model_biodata->get_mhs()->result();
        $data['mahasiswa'] = $this->Model_biodata->get_mhs2()->result();
        $data['dosen'] = $this->Model_biodata->get_mhs3()->result();                  
        $data['pageContent'] = $this->load->view('data/tambah_mhs1', $data, TRUE);

        $this->load->view('template/layout', $data);        
    }
     function getbi(){
        $nip = $this->input->post('nip');
        $data = $this->Model_biodata->getbi($nip);
        echo json_encode($data);
    }
     public function etbskrip($id)
    {
        
    $this->form_validation->set_rules('judul', 'judul', 'required');
    $this->form_validation->set_rules('jenis', 'jenis', 'required');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
    if ($this->form_validation->run() === FALSE) {
    
      $data['operator'] = $this->Model_biodata->get_skripsi_id($id);
      $data['pageTitle'] = 'Ubah Judul Skripsi';
      $data['pageContent'] = $this->load->view('data/etbskrip', $data, TRUE);
      $this->load->view('template/layout', $data);      
   } else {
      $edit_aktifasi = $this->Model_biodata->edit_skripsi($id);
      $this->session->set_flashdata('edit_mahasiswa',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil diubah.
                                         </div>'
                                     );
      redirect('skripsi');
    }
    
  }
   
}