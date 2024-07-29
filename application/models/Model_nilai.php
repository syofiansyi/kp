<?php
class Model_nilai extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
 
    public function get_nlsemprop()
    {
     $this->db->distinct();
      $this->db->select('nilai.npm , nilai.id_bimbing, semprop.status, nilai.status1, semprop.tanggal');
      $this->db->from('nilai');
      $this->db->join('semprop', 'semprop.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'semprop');
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function draft_nlsemprop()
    {
       $nip = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('nilai');
      $this->db->join('semprop', 'semprop.id_semprop = nilai.id_bimbing');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'semprop');
      $this->db->where('dipt', $nip);
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
  
   public function get_nlsemprop1()
    {
      $npm = $this->session->userdata('username');
      $this->db->distinct();
      $this->db->select('nilai.npm , mahasiswa.nama_mhs , skripsi.judul, skripsi.id_skripsi, nilai.status1');
      $this->db->from('nilai');
      $this->db->join('semprop', 'semprop.id_semprop = nilai.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = nilai.npm');
      $this->db->join('skripsi', 'skripsi.id_skripsi = nilai.id_bimbing');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
      $this->db->where('semprop.npm',$npm);
      $this->db->where('jenis_seminar', 'semprop');
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
   public function get_nlsemhas()
    {
      $this->db->distinct();
      $this->db->select('nilai.npm , nilai.id_bimbing, semhas.status, nilai.status1, semhas.tanggal1 ');
      $this->db->from('nilai');
      $this->db->join('semhas', 'semhas.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'semhas');
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function draft_nlsemhas()
    {
      $nip = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('nilai');
      $this->db->join('semhas', 'semhas.id_bimbing = nilai.id_bimbing');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'semhas');
      $this->db->where('dipt', $nip);
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }

   public function get_nlsemhas1()
    {
      $npm = $this->session->userdata('username');
    $this->db->distinct();
    $this->db->select('nilai.npm , mahasiswa.nama_mhs , skripsi.judul, skripsi.id_skripsi, nilai.status1');   
    $this->db->from('nilai');
    $this->db->join('semhas', 'semhas.id_bimbing = nilai.id_bimbing');
    $this->db->join('skripsi', 'skripsi.id_skripsi = nilai.id_bimbing');
    $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
    $this->db->join('mahasiswa', 'mahasiswa.npm = nilai.npm');
    $this->db->where('semhas.npm',$npm);
    $this->db->where('jenis_seminar', 'semhas');
    $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
  public function get_nlsidang()
    {
     $this->db->distinct();
      $this->db->select('nilai.npm , nilai.id_bimbing, sidang.status, nilai.status1');
      $this->db->from('nilai');
      $this->db->join('sidang', 'sidang.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'sidang');     
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function draft_nlsidang()
    {
       $nip = $this->session->userdata('username');
$this->db->select('*');
      $this->db->from('nilai');
        $this->db->join('sidang', 'sidang.id_bimbing = nilai.id_bimbing');
   $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
      $this->db->where('jenis_seminar', 'sidang');
     $this->db->where('dipt', $nip);
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function get_nlsidang1()
    {
      $npm = $this->session->userdata('username');
      $this->db->distinct(); 
$this->db->select('mahasiswa.nama_mhs, nilai.npm, skripsi.judul, nilai.status1');
      $this->db->from('nilai');
        $this->db->join('sidang', 'sidang.id_bimbing = nilai.id_bimbing');
          $this->db->join('skripsi', 'skripsi.id_skripsi = nilai.id_bimbing');
   $this->db->join('pembimbing', 'pembimbing.id_bimbing = nilai.id_bimbing');
   $this->db->join('mahasiswa', 'mahasiswa.npm = nilai.npm');
     $this->db->where('sidang.npm',$npm);
      $this->db->where('jenis_seminar', 'sidang');
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
   public function geta()
    {
$this->db->select('*');
      $this->db->from('semprop');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
  public function getam()
    {
$this->db->select('*');
      $this->db->from('semhas');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function getsid()
    {
$this->db->select('*');
      $this->db->from('sidang');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
   
   public function update_data1($tbl, $data)
    {
        
          $id_bimbing = $this->input->post('id_bimbing');
         $this->db->where('id_bimbing', $id_bimbing);
    $this->db->update($tbl, $data);
        
    }
     public function update_data2($tbl, $data)
    {
        
          $id_bimbing = $this->input->post('id_bimbing');
         $this->db->where('id_bimbing', $id_bimbing);
    $this->db->update($tbl, $data);
        
    }
     public function update_data3($tbl, $data)
    {
        
          $id_bimbing = $this->input->post('id_bimbing');
         $this->db->where('id_bimbing', $id_bimbing);
    $this->db->update($tbl, $data);
        
    }
   public function getm()
    {

      $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->join('semhas', 'syarat.npm = semhas.npm');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'semhas');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 
 public function get2()
    {

      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('sidang', 'syarat.id_syarat = sidang.id_sidang');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
    
      $this->db->where('acc_seminar', 'sidang');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 public function get_mahasiswa()
  {
    $query = $this->db->get('mahasiswa');
    return $query->result();
  }
  public function get_data_dosen()
  {
    $query = $this->db->get('semprop');
    return $query->result(); 
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
    function getAsn($id_semprop){
    $this->db->select('*');
    $this->db->from('semprop');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = semprop.id_bimbing');
    $this->db->where('id_semprop', $id_semprop);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
          'id_semprop' => $data->id_semprop,
          'id_bimbing' => $data->id_bimbing,
           'npm' => $data->npm,
                  'pg1' => $data->pg1,
                  'pg2' => $data->pg2,
                  'pb1' => $data->pb1,
                   'pb2' => $data->pb2,
                 
          );
      }
    }
    return $hasil;
  }
  
   function getok($id_semhas){
  
    $this->db->select('*');
    $this->db->from('semhas');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = semhas.id_bimbing');
    $this->db->where('id_semhas', $id_semhas);
    $query = $this->db->get();

    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
           'id_semhas' => $data->id_semhas,
           'npm' => $data->npm,
           'pg1' => $data->pg1,
           'pg2' => $data->pg2,
            'pb1' => $data->pb1,
             'pb2' => $data->pb2,

                  
          );
      }
    }
    return $hasil;
  }
 function getuk($id_sidang){
  
    $this->db->select('*');
    $this->db->from('sidang');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
    $this->db->where('id_sidang', $id_sidang);
    $query = $this->db->get();

    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
           'id_sidang' => $data->id_sidang,
           'npm' => $data->npm,
           'pg1' => $data->pg1,
           'pg2' => $data->pg2,
            'pb1' => $data->pb1,
             'pb2' => $data->pb2,

                  
          );
      }
    }
    return $hasil;
  }

 function getasa($npm){
    $this->db->select('*');
    $this->db->from('pembimbing');
    $this->db->where('npm', $npm);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
       
           'npm' => $data->npm,
           
                  'pb1' => $data->pb1,
                  'pb2' => $data->pb2,
                 
          
          );
      }
    }
    return $hasil;
  }

 function getasam($npm){
    $this->db->select('*');
    $this->db->from('pembimbing');
    $this->db->where('npm', $npm);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
       
           'npm' => $data->npm,
           
                  'pb1' => $data->pb1,
                  'pb2' => $data->pb2,
                 
          
          );
      }
    }
    return $hasil;
  }
   
 public function get_status_id($id)
  {
    $query = $this->db->get_where('nilai', array('id_bimbing' => $id));
    $mahasiswa = $query->row();

    
    $data = array(
       'id_bimbing' => $mahasiswa->id_bimbing
       
    
    );

    return $data;
  }
  public function status_lulus($id)
  {
    $data = array(
      'status1' => 'lulus'
      
    );

    $this->db->where('id_bimbing', $id);
     $this->db->where('jenis_seminar', 'semprop');
    $this->db->update('nilai', $data);
  }
   public function status_gagal($id)
  {
    $data = array(
      'status1' => 'gagal'
      
    );

    $this->db->where('id_bimbing', $id);
      $this->db->where('jenis_seminar', 'semprop');
    $this->db->update('nilai', $data);
  }
   public function stlulus_semhas($id)
  {
    $data = array(
      'status1' => 'lulus'
      
    );

    $this->db->where('id_bimbing', $id);
     $this->db->where('jenis_seminar', 'semhas');
    $this->db->update('nilai', $data);
  }
   public function stgagal_semhas($id)
  {
    $data = array(
      'status1' => 'gagal'
      
    );

    $this->db->where('id_bimbing', $id);
      $this->db->where('jenis_seminar', 'semhas');
    $this->db->update('nilai', $data);
  }
   public function stlulus_sidang($id)
  {
    $data = array(
      'status1' => 'lulus'
      
    );

    $this->db->where('id_bimbing', $id);
     $this->db->where('jenis_seminar', 'sidang');
    $this->db->update('nilai', $data);
  }
   public function stgagal_sidang($id)
  {
    $data = array(
      'status1' => 'gagal'
      
    );

    $this->db->where('id_bimbing', $id);
      $this->db->where('jenis_seminar', 'sidang');
    $this->db->update('nilai', $data);
  }
   public function id_nilai()
  {
     $id_nilai = $this->input->post('id_nilai');


        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->where('id_nilai',$id_nilai);
        $this->db->order_by('id_nilai', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function update_data($tbl, $data)
    {
        
          $id_nilai = $this->input->post('id_nilai');
         $this->db->where('id_nilai', $id_nilai);
    $this->db->update($tbl, $data);
        
    }
      public function get_idnilai($id)
  {
    $query = $this->db->get_where('nilai', array('id_nilai' => $id));
    $operator = $query->row();
    $data = array(
      'id_nilai' => $operator->id_nilai,
      'id_bimbing' => $operator->id_bimbing,
      'pendahuluan' => $operator->pendahuluan,
      'pustaka'  => $operator->pustaka,
      'hasilpem' => $operator->hasilpem,
      'materi'   => $operator->materi,
      'simpsar'  => $operator->simpsar,
      'bahasa'   => $operator->bahasa,
      'ttulis'   => $operator->ttulis,
      'argumen'  => $operator->argumen,
      'metode'   => $operator->metode,
       'total'   => $operator->total,
      'metopen'  => $operator->metopen
       
    );

    return $data;
}
}
