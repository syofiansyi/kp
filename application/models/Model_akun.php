<?php
class Model_akun extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }

  public function get_data($level){
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('level',$level);
    $query = $this->db->get();
    
    return $query;
  }
   public function jabatan(){
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('level','2');
    $query = $this->db->get();
    
    return $query;
  }
   public function kprodi(){
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('level','1');
    $query = $this->db->get();
    
    return $query;
  }
  public function save_data2($tbl, $data)
    {
        
          $nip = $this->input->post('nip');
         $this->db->where('nip', $nip);
    $this->db->update($tbl, $data);
        
    }
    public function get()
    {
      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('level','1');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();

      return $query;
  }
    public function pesan()
    {
       $username = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('pesan');
      $this->db->where('pengirim',$username);
      $this->db->order_by('id_pesan', 'DESC');      
      $query = $this->db->get();

      return $query;
  }

 public function pesanbc()
    {
       $username = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('pesan');
      $this->db->where('penerima',$username);
      $this->db->order_by('id_pesan', 'DESC');      
      $query = $this->db->get();

      return $query;
  }
   
   public function satu()
    {
      
       
      $this->db->distinct();
      $this->db->select('level');
      $this->db->from('mahasiswa');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
   public function getaktifasi()
    {
      
       
      $this->db->select('*');
      $this->db->from('mahasiswa');
    
      $this->db->where('level','2');
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
      $this->db->from('dosen');
      $this->db->order_by('nip', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

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

public function get_mahasiswa_id($id)
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $id));
    $operator = $query->row();

    
    $data = array(
      'npm' => $operator->npm,
      'nama_mhs' => $operator->nama_mhs,
      'password' => $operator->password,
       
       'level' => $operator->level
    );

    return $data;
  }
  public function get_operator($id)
  {
    $query = $this->db->get_where('operator', array('username' => $id));
    $operator = $query->row();

    
    $data = array(
      'username' => $operator->username,
      'password' => $operator->password
       
    );

    return $data;
  }
  public function get_aktifasi2_id($id)
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $id));
    $operator = $query->row();

    
    $data = array(
      'npm' => $operator->npm
      
    );

    return $data;
  }
  public function getidpesan($id)
  {
    $query = $this->db->get_where('pesan', array('id_pesan' => $id));
    $operator = $query->row();

    
    $data = array(
      'id_pesan' => $operator->id_pesan,
      'pengirim' => $operator->pengirim,
      'penerima' => $operator->penerima,
      'nama' => $operator->nama,
      'doc' => $operator->doc,
      'pesan' => $operator->pesan
      
    );

    return $data;
  }
public function get_dosen_id($id)
  {
    $query = $this->db->get_where('dosen', array('nip' => $id));
    $operator = $query->row();

    
    $data = array(
      'nip' => $operator->nip,
      'level' => $operator->level,
      'nama_dosen' => $operator->nama_dosen,
      'password' => $operator->password
     
    );

    return $data;
  }
  public function edit_mahasiswa($id)
  {
    $data = array(
      'npm' => $this->input->post('npm'),
      'password' => md5($this->input->post('password'))
    
      
    );

    $this->db->where('npm', $id);
    $this->db->update('mahasiswa', $data);
  }
  public function edit_aktifasi2($id)
  {
    $data = array(
     
        'level' =>'2'
    );

    $this->db->where('npm', $id);
    $this->db->update('mahasiswa', $data);
  }
   public function editpesan($id)
  {
    $data = array(
     

        'status' =>'dibaca'
    );

    $this->db->where('id_pesan', $id);
    $this->db->update('pesan', $data);
  }
   public function update_data($tbl, $data)
    {
        
          $username = $this->input->post('username');
         $this->db->where('username', $username);
    $this->db->update($tbl, $data);
        
    }
    public function update_data1($tbl, $data)
    {
        $this->db->update($tbl, $data);
        return $this->db->update($tbl, $data);
    }
   public function edit_aktifasi($id)
  {
    $data = array(
      'npm' => $this->input->post('npm'),
        'level' =>'2'
    );

    $this->db->where('npm', $id);
    $this->db->update('mahasiswa', $data);
  }
  public function edit_dosen($id)
  {
    $data = array(
      'nip' => $this->input->post('nip'),
      'level' => $this->input->post('level'),
      'password' => md5($this->input->post('password'))
    
      
    );

    $this->db->where('nip', $id);
    $this->db->update('dosen', $data);
  }
  public function edit_operator($id)
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    
      
    );
    $this->db->where('username', $id);
    $this->db->update('operator', $data);
  }
  public function delete_mahasiswa($id)
  {
    $this->db->delete('mahasiswa', array('npm' => $id));
     $this->db->delete('syarat', array('npm' => $id));
      $this->db->delete('nilai', array('npm' => $id));
      
  }
  public function delete_pesan($id)
  {
    $this->db->delete('pesan', array('id_pesan' => $id));
  }
   public function delete_dosen($id)
  {
    $this->db->delete('dosen', array('nip' => $id));
  }
public function lihat_id($id)
  {
   $query = $this->db->get_where('mahasiswa', array('npm' => $id));
    return $query->row();
  }
   public function edit_lihat($id)
  {
    $data = array(
      'matkul_metopen' => $this->input->post('matkul_metopen')

    );

    $this->db->where('npm', $id);
    $this->db->update('mahasiswa', $data);
  }
  public function get4()
    {
      $npm = $this->session->userdata('username');
      $query = $this->db->get_where('mahasiswa', array('npm' => $npm));
    return $query->row();
    }
    public function get_mahasiswaid()
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $this->session->userdata('username')));
    $operator = $query->row();    
    $data = array(
       'npm' => $operator->npm,     
 );
    return $data;
  }
}
