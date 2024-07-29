<?php
class Model_mhsblm extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
    public function get_jurusan()
  {
    $query = $this->db->get('mahasiswa');
    return $query->result();
  }
  public function get_kelas()
  {
    $query = $this->db->get('syarat');
    return $query->result();
  }
    public function get_operator()
  {
    $query = $this->db->get('mahasiswa');
    return $query->result();
  }
    public function get_seminar()
  {
    $query = $this->db->get('semprop');
    return $query->result();
  }
   public function get_data_dosen()
  {
    $query = $this->db->get('dosen');
    return $query->result();
  }
    public function get()
    {

      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
      $this->db->join('syarat', 'syarat.npm = semprop.npm');
      $this->db->where('acc_seminar', 'semprop');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
 
 
  public function get_semprop()
    {

      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('kb_semprop',"");
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  public function get_semhas()
    {

      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('npm', 'g1a');
      // $this->db->where('npm', 'g1a');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  public function get_sidang()
    {

      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('npm', 'g1a');
      // $this->db->where('npm', 'g1a');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
   public function get_dosen()
    {
      
       
      $this->db->select('*');
      $this->db->from('operator');
      $this->db->where('username','19');
      $this->db->order_by('username', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }

public function get_mahasiswa_id()
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $this->session->userdata('username')));
    $operator = $query->row();    
    $data = array(
       'npm' => $operator->npm,     
 );
    return $data;
  }
  public function get_semprop_id($id)
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $id));
    $semprop = $query->row();

    
    $data = array(
    
      'dosen_penguji' => $semprop->dosen_penguji
    );

    return $data;
  }

  public function edit_mahasiswa()
  {
      
   if ($_FILES['matkul_metopen']['name']) {
                                    $upload = $this->_do_upload();
                                     $data['matkul_metopen'] = $upload;
                                 }
   
 $this->db->update('mahasiswa',$data,array('npm'=>$this->session->userdata('username')));
   
  }
 
  private function matkul_metopen()
    {
        $config['upload_path']      = 'gambar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_widht']            = 100000;
        $config['max_height']       = 10000;
        $config['file_name']            = round(microtime(true)*10000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('matkul_metopen')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
            redirect('matkul_metopen');
        }
         
        return $this->upload->data('file_name');
    }
  public function delete_mahasiswa($id)
  {
    
       
    $this->db->delete('skripsi', array('npm' => $id));
    $this->db->delete('syarat', array('npm' => $id));
     $this->db->delete('semprop', array('npm' => $id));
  }
 

   public function delete_dosen($id)
  {
    $this->db->delete('operator', array('username' => $id));
  }
  public function lihat_id($id)
  {
   $query = $this->db->get_where('syarat', array('id_syarat' => $id));
    return $query->row();
  }
   public function lihat1_id($id)
  {
   $query = $this->db->get_where('syarat', array('id_syarat' => $id));
    return $query->row();
  }
  public function edit_lihat($id)
  {
    $data = array(
      'krs' => $this->input->post('krs')
    );

    $this->db->where('id_syarat', $id);
    $this->db->update('syarat', $data);
  }

public function add_mahasiswa() {
  
    $matkul_metopen = $this->input->post('matkul_metopen');
  
    $data = array(
      'npm' =>$this->session->userdata('username'),
      'matkul_metopen' => $this->input->post('matkul_metopen')
    
    );

    $this->db->insert('syarat', $data);
  }
public function get4()
    {
         $npm = $this->session->userdata('username');
       $query = $this->db->get_where('mahasiswa', array('npm' => $npm));
    return $query->row();
    }
    public function get_data_by_pk($tbl, $where, $id)
    {
                $this->db->from($tbl);
                $this->db->where($where,$id);
                $query = $this->db->get();

                return $query;
    }
    
    public function save_data($tbl, $data)
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }
    public function update_data($tbl, $data)
    {
        $this->db->update($tbl, $data);
        return $this->db->update($tbl, $data);
    }
}
