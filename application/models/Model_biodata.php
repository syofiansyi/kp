<?php
class Model_biodata extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
    public function get_mhs()
  {
     $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('level', '2');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
  }
   public function get_data($tahun){
     $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('mahasiswa', 'mahasiswa.npm = skripsi.npm');
       $this->db->like('tahun',$tahun);
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
    
    return $query;
  }
    public function satu()
    {

     
      $this->db->distinct();
      $this->db->select('tahun');
      $this->db->from('skripsi');
      $this->db->like('tahun','201');
       $this->db->or_like('tahun','201');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  

  }
    public function get()
    {

      $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('mahasiswa', 'mahasiswa.npm = skripsi.npm');
      $this->db->where('acc_judul','proses');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   
  }
   public function getm()
    {
         $npm = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('skripsi');
         $this->db->join('mahasiswa', 'mahasiswa.npm = skripsi.npm');
        $this->db->where('skripsi.npm',$npm);
         // $this->db->where('acc_judul','proses');
        $this->db->order_by('id_skripsi', 'DESC');
        $query = $this->db->get();

        return $query;
    }
    public function tma()
    {
         $npm = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('skripsi');
        $this->db->where('npm',$npm);
         $this->db->where('acc_judul','proses');
        $this->db->order_by('id_skripsi', 'DESC');
        $query = $this->db->get();

        return $query;
    }
  public function get2()
    {

      $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('mahasiswa', 'mahasiswa.npm = skripsi.npm');
      $this->db->where('acc_judul','terima');
      $this->db->or_where('acc_judul','tb');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   
  }
  public function get_mhs2()
  {
     $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('level', '2');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
  }
  public function get_mhs3()
  {
     $this->db->select('*');
      $this->db->from('dosen');
      $this->db->order_by('nip', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
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
    // $query=$this->db->query('SELECT * FROM mahasiswa where mahasiswa.npm='g1a015055'');
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
    // $query=$this->db->query('SELECT * FROM mahasiswa where mahasiswa.npm='g1a015055'');
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
    // $query=$this->db->query('SELECT * FROM mahasiswa where mahasiswa.npm='g1a015055'');
    // return $query->result();

  }
   public function get_dosen()
    {
      
       
      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->where('npm','19');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM mahasiswa where mahasiswa.npm='g1a015055'');
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
    $query = $this->db->get_where('skripsi', array('id_skripsi' => $id));
    $mahasiswa2 = $query->row();

    
    $data = array(
      'id_skripsi' => $mahasiswa2->id_skripsi,
      'npm' => $mahasiswa2->npm,
     
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
public function get_dosen_id($id)
  {
    $query = $this->db->get_where('mahasiswa', array('npm' => $id));
    $mahasiswa = $query->row();

    
    $data = array(
      'npm' => $mahasiswa->npm,
      'password' => $mahasiswa->password,
      'password2' => $mahasiswa->password2
    );

    return $data;
  }
 
  public function edit_mahasiswa($npm)
  {
    $data = array(
      'npm' => $this->input->post('npm')
    );

    $this->db->where('npm', $npm);
    $this->db->update('mahasiswa', $data);
  }
  
  public function edit_dosen($id)
  {
    $data = array(
      'npm' => $this->input->post('npm'),
      'password' => md5($this->input->post('password')),
      'password2' =>$this->input->post('password2')
      
    );

    $this->db->where('npm', $id);
    $this->db->update('mahasiswa', $data);
  }
  public function update_data($tbl, $data)
    {
        
          $id_skripsi = $this->input->post('id_skripsi');
         $this->db->where('id_skripsi', $id_skripsi);
    $this->db->update($tbl, $data);
        
    }
  public function delete_mahasiswa($id)
  {
    $this->db->delete('skripsi', array('id_skripsi' => $id));
    

  }
   public function delete_dosen($id)
  {
    $this->db->delete('mahasiswa', array('npm' => $id));
  }
public function edit_acc($id)
  {
    $data = array(
      'acc_judul' => 'terima'
      
    );

    $this->db->where('id_skripsi', $id);
    $this->db->update('skripsi', $data);
  }

public function edit_acc1($id)
  {
    $data = array(
      'acc_judul' => 'tolak'
      
    );

    $this->db->where('id_skripsi', $id);
    $this->db->update('skripsi', $data);
  } 
public function edit_acc2($id)
  {
    $data = array(
      'acc_judul' => 'tb'
      
    );

    $this->db->where('id_skripsi', $id);
    $this->db->update('skripsi', $data);
  } 
    public function get_acc_id($id)
  {
    $query = $this->db->get_where('skripsi', array('id_skripsi' => $id));
    $mahasiswa = $query->row();

    
    $data = array(
       'npm' => $mahasiswa->npm,
        'id_skripsi' => $mahasiswa->id_skripsi,
        'acc_judul' => $mahasiswa->acc_judul
    
    );

    return $data;
  }
  public function get_id($id)
  {
    $query = $this->db->get_where('semprop', array('npm' => $npm));
    $mahasiswa = $query->row();

    
    $data = array(
       'npm' => $mahasiswa->npm
    );

    return $data;
  }
 
 function getbi($nip){
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('nip', $nip);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
          
            'nip' => $data->nip,
             'nama_dosen' => $data->nama_dosen,


         
          
          );
      }
    }
    return $hasil;
  }
  
   public function tbskrip()
    {
       $npm = $this->input->post('npm');

       
      $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->where('npm', $npm);
      $this->db->where('acc_judul', 'terima');
       $this->db->where('acc_judul', 'selesai');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  public function get_skripsi_id($id)
  {
    $query = $this->db->get_where('skripsi', array('id_skripsi' => $id));
    $operator = $query->row();

    
    $data = array(
      'npm' => $operator->npm,
      'id_skripsi' => $operator->id_skripsi,
        'jenis' => $operator->jenis,
         'judul' => $operator->judul,
       'lokasi' => $operator->lokasi
    );

    return $data;
  }
  public function edit_skripsi($id)
  {
    $data = array(
      'npm' => $this->input->post('npm'),
      'id_skripsi' => $this->input->post('id_skripsi'),
      'jenis' => $this->input->post('jenis'),
      'lokasi' =>$this->input->post('lokasi'),
      'judul' =>$this->input->post('judul'),
      
    );

    $this->db->where('id_skripsi', $id);
    $this->db->update('skripsi', $data);
  }
}
