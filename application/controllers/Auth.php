<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model(array('model_akun','Model_login', 'Model_dashboard', 'Model_biodata'));
        $this->load->helper('date_helper');
      
    }
 public function index()
    {
        switch ($this->session->userdata('akses')) {
            case 'operator':
                redirect('akun/dashboard');
                break;
            
            case 'mahasiswa':
                redirect('akun/dashboard');
                break;
             case 'dosen':
                redirect('akun/dashboard');
                break;
            default:
               $data['pageTitle'] = 'login';
                
                $this->load->view('login/login', $data);

                break;
        }
    }
     public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
                        redirect('Auth');
        } else {
           
             $login_operator = $this->Model_login->login_operator();
            $login_dosen = $this->Model_login->login_dosen();
             $login_mahasiswa = $this->Model_login->login_mahasiswa();

            if ($login_operator) {
                $get_operator = $this->Model_login->get_operator();
                $row_operator = $get_operator->row();

                $session_operator = array(
                    'akses' => 'operator',
                    'username' => $row_operator->username,
                    'password' => $row_operator->password,
                    'nama' => $row_operator->nama
                );

                $this->session->set_userdata($session_operator);
                redirect('akun/dashboard');
            }

            if ($login_mahasiswa) {
                $get_mahasiswa = $this->Model_login->get_mahasiswa();
                $row_mahasiswa = $get_mahasiswa->row();

                $session_mahasiswa = array(
                    'akses' => 'mahasiswa',
                    'level' => $row_mahasiswa->level,
                    'nama' => $row_mahasiswa->nama_mhs,
                    'username' => $row_mahasiswa->npm
                  
                );

                $this->session->set_userdata($session_mahasiswa);
                redirect('akun/dashboard');
            }

            if ($login_dosen) {
                $get_mahasiswa = $this->Model_login->get_dosen();
                $row_mahasiswa = $get_mahasiswa->row();

                $session_mahasiswa = array(
                      
                        'akses' => 'dosen',
                         'dosen' => $row_mahasiswa->level,
                    'username' => $row_mahasiswa->nip,
                   'nama' => $row_mahasiswa->nama_dosen


                );

                $this->session->set_userdata($session_mahasiswa);
                redirect('akun/dashboard');
           
            }
            if (!$login_operator || !$login_mahasiswa || !$login_dosen) {
                $this->session->set_flashdata('msg',
                                         '
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Gagal!</strong> Usernama atau Password Salah.
                                         </div>'
                                     );
                redirect('Auth');
            }
        }
    }

   public function daftar()
    {

        $this->load->view('login/daftar');
        if (isset($_POST['btnlogin'])){
        $npm = $this->input->post('npm');
     
          $nama_mhs = $this->input->post('nama_mhs');
        $password = md5($this->input->post('password'));

                        
                         $cek_kd = $this->Model_biodata->get_data_by_pk('mahasiswa', 'npm', $npm);
                            if ($cek_kd->num_rows() == 0) {
                                $status = "simpan";
                            }else{
                                $status = "";
                            }
                        if ($status == "simpan") {
                                    $data = array(
                                        'npm'          => $npm,
                                        'password'          => $password,
                                       
                                         'nama_mhs'=>$nama_mhs,
                                        'level'          =>'1'
                                        );
                                       if (!empty($_FILES['matkul_metopen']['name'])) {
                                    $upload = $this->matkul_metopen();
                                     $data['matkul_metopen'] = $upload;}
                                     
                                    $this->Model_biodata->save_data('mahasiswa', $data);
                            $this->session->set_flashdata('msg',
                                         '
                                         <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                                <strong>Sukses!</strong> Data berhasil disimpan.

                                         </div>'
                                     );
                                    redirect('Auth/daftar');
                                     
                            }else{
                                   $this->session->set_flashdata('msg',
                                         '
                                         <div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times; &nbsp;</span>
                                                </button>
                                               <strong>Gagal!</strong>Npm telah terdaftar.

                                         </div>'
                                     );
                                     redirect('Auth/daftar');
                            }
                    }

      
}

    
   public function logout()
    {
        // Hapus semua data pada session
        $this->session->sess_destroy();

        // redirect ke halaman login  
        redirect('Auth/login');
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
            redirect('Auth/daftar');
        }
         
        return $this->upload->data('file_name');
    }
    
 
}