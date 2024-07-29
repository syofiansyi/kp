<?php
class Model_berkas extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
    public function get_mahasiswa()
  {
    $query = $this->db->get('mahasiswa');
    return $query->result();
  }
   public function get_skrip()
  {
     $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = skripsi.id_skripsi');
      $this->db->where('acc_judul', 'selesai');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   
    public function get_skrip1()
  {
    $npm = $this->session->userdata('username');
     $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = skripsi.id_skripsi');
       $this->db->where('skripsi.npm',$npm);
      $this->db->where('acc_judul', 'selesai');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function get_semprop()
  {
      $this->db->distinct();
      $this->db->select('id_bimbing, nilai.npm, skripsi.judul');
      $this->db->from('nilai');
      $this->db->join('skripsi', 'skripsi.npm = nilai.npm');
      $this->db->where('jenis_seminar', 'semprop');
       $this->db->where('status1', 'lulus');
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function get_semprop1()
  {
     $npm = $this->session->userdata('username');
    $this->db->distinct();
      $this->db->select('id_bimbing, nilai.npm , skripsi.judul');
       $this->db->from('nilai');
      $this->db->join('skripsi', 'skripsi.npm = nilai.npm');
      $this->db->where('nilai.npm',$npm);
      $this->db->where('jenis_seminar', 'semprop');
       $this->db->where('status1', 'lulus');
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
  public function tbisidang()
  {
    $this->db->distinct();
      $this->db->select('id_bimbing, nilai.npm, skripsi.judul');
      $this->db->from('nilai');
      $this->db->join('skripsi', 'skripsi.npm = nilai.npm');
      $this->db->where('jenis_seminar', 'semhas');
       $this->db->where('status1', 'lulus');
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function tbisidang1()
  {
    $npm = $this->session->userdata('username');
    $this->db->distinct();
     $this->db->select('id_bimbing, nilai.npm, skripsi.judul');
      $this->db->from('nilai');
      $this->db->join('skripsi', 'skripsi.npm = nilai.npm');
      $this->db->where('jenis_seminar', 'semhas');
       $this->db->where('nilai.npm', $npm);
       $this->db->where('status1', 'lulus');
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
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
   public function get_bimbing()
  {
    $query = $this->db->get('pembimbing');
    return $query->result();
  }

  public function get_data($tahun){
    $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
       $this->db->where('tahun', $tahun);
      $this->db->where('acc_seminar', 's1');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function get_data1($tahun){
    $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
       $this->db->where('tahun', $tahun);
      $this->db->where('acc_seminar', 's2');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  public function get_data2($tahun){
    $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
       $this->db->where('tahun', $tahun);
      $this->db->where('acc_seminar', 's3');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function satu()
    {

      $this->db->distinct();
      $this->db->select ('tahun');
      $this->db->from('syarat');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
    public function get()
    {

      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
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
  public function get1()
    {
  $npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('syarat.npm', $npm);
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
  
   public function get11()
    {
      $npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('syarat.npm', $npm);
      $this->db->order_by('id_syarat', 'DESC');      
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
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'semhas');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }

  public function get_semhas1()
    {
 $npm = $this->session->userdata('username');
     
      $this->db->select('*');
      $this->db->from('syarat');
       $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
  $this->db->where('syarat.npm',$npm);
     
      $this->db->where('acc_seminar', 'semhas');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
  public function get_semhas11()
    {
 $npm = $this->session->userdata('username');
     
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('syarat.npm',$npm);
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
   public function get_sidang()
    {

      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'sidang');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
 
 public function get_sidang1()
    {
 $npm = $this->session->userdata('username');
     
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('syarat.npm', $npm);
     
        $this->db->where('acc_seminar', 'sidang');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
  public function get_sidang11()
    {
 $npm = $this->session->userdata('username');
     
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('syarat.npm', $npm);
     
        $this->db->where('acc_seminar', 's3');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

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

public function tbsemhas()
  {
     
     $npm = $this->input->post('npm');
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('semprop', 'nilai.id_bimbing = semprop.id_bimbing');
        $this->db->where('seminar.npm',$npm);
        $this->db->where('jenis_seminar','semprop');   
        $this->db->where('status1','lulus');
        $this->db->order_by('id_nilai', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function pb1()
  {
     $ruang = $this->input->post('ruang');
      $pukul = $this->input->post('pukul');
       $tanggal = $this->input->post('tanggal'); 
        $this->db->select('*');
        $this->db->from('semprop');
        $this->db->where('tanggal',$tanggal);
         $this->db->where('pukul',$pukul); 
        $this->db->where('ruang',$ruang);   
       
            
        $this->db->order_by('id_semprop', 'DESC');
        $query = $this->db->get();

        return $query;
  }
   public function pembimbing()
  {
     $pb1 = $this->input->post('pg1');
     $id_bimbing = $this->input->post('id_bimbing');
      $pb2 = $this->input->post('pg2');
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->where('id_bimbing',$id_bimbing); 
        $this->db->where('pb1',$pb1); 
        $this->db->or_where('pb1',$pb2);
        $this->db->or_where('pb2',$pb1);
        $this->db->or_where('pb2',$pb2);

        $this->db->order_by('id_bimbing', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function pb2()
  {
     $ruang = $this->input->post('ruang');
      $pukul = $this->input->post('pukul');
       $tanggal1 = $this->input->post('tanggal1'); 
        $this->db->select('*');
        $this->db->from('semhas');
        $this->db->where('ruang',$ruang);   
        $this->db->where('pukul',$pukul); 
        $this->db->where('tanggal1',$tanggal1);    
        $this->db->order_by('id_semhas', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function pb3()
  {
     $ruang = $this->input->post('ruang');
      $pukul = $this->input->post('pukul');
       $tanggal3 = $this->input->post('tanggal3'); 
        $this->db->select('*');
        $this->db->from('sidang');
        $this->db->where('ruang',$ruang);   
        $this->db->where('pukul',$pukul); 
        $this->db->where('tanggal3',$tanggal3);    
        $this->db->order_by('id_sidang', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  
  public function tbsemhas1()
  {
     $npm = $this->input->post('npm');
        $this->db->select('*');
        $this->db->from('syarat');
        $this->db->where('npm',$npm);
          $this->db->where('acc_seminar','s2');
           $this->db->where('status1','lulus');
        $this->db->order_by('id_syarat', 'DESC');
        $query = $this->db->get();


        return $query;
  }
  public function tbsidang()
  {
    $npm = $this->input->post('npm');
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('semhas', 'nilai.id_bimbing = semhas.id_bimbing');
        $this->db->where('semhas.npm',$npm);
        $this->db->where('jenis_seminar','semhas');   
        $this->db->where('status1','lulus');
        $this->db->order_by('id_nilai', 'DESC');
        $query = $this->db->get();
         return $query;
  }
  public function tbsidang1()
  {
     $npm = $this->input->post('npm');
        $this->db->select('*');
        $this->db->from('syarat');
        $this->db->where('npm',$npm);
          $this->db->where('acc_seminar','sidang');
           $this->db->or_where('acc_seminar','s3');
        $this->db->order_by('id_syarat', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function upda_data($tbl, $data)
    {
       $id_syarat = $this->input->post('id_syarat');
        $this->db->where('id_syarat', $id_syarat);
        $this->db->update($tbl, $data);

    }
 public function update_data($tbl, $data)
    {
        
          $id_syarat = $this->input->post('id_semprop');
         $this->db->where('id_syarat', $id_syarat);
    $this->db->update($tbl, $data);
        
    }
    public function update_data1($tbl, $data)
    {
        
          $id_syarat = $this->input->post('id_semhas');
         $this->db->where('id_syarat', $id_syarat);
    $this->db->update($tbl, $data);
        
    }
     public function update_data2($tbl, $data)
    {
        
          $id_syarat = $this->input->post('id_sidang');
         $this->db->where('id_syarat', $id_syarat);
    $this->db->update($tbl, $data);
        
    }

public function get_mahasiswa_id($id)
  {
    $query = $this->db->get_where('skripsi', array('id_skripsi' => $id));
    $operator = $query->row();    
    $data = array(
       'npm' => $operator->npm,
        'id_skripsi' => $operator->id_skripsi,
        


 );
    return $data;
  }
  public function get_mahasiswa_id1($id)
  {
    $query = $this->db->get_where('syarat', array('id_syarat' => $id));
    $seminar = $query->row();    
    $data = array(
       'npm' => $seminar->npm,
        'id_syarat' => $seminar->id_syarat,
         'fileskrip' => $seminar->fileskrip,
         'kbskrip' => $seminar->kbskrip,


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

  public function edit_mahasiswa($id)
  {

    $data = array(
       
     'npm' => $this->input->post('npm'),
      'pg1' => $this->input->post('pg1'),
      'pg2' => $this->input->post('pg2'),
      'tanggal' => $this->input->post('tanggal'),
      'pukul' => $this->input->post('pukul'),
      'ruang' => $this->input->post('ruang')
            
      
    );
  $this->db->where('npm', $id);
    $this->db->update('semprop', $data);
  }
   public function dosen_semhas($id)
  {
    $data = array(
       
     'npm' => $this->input->post('npm'),
      'dosen_penguji1' => $this->input->post('dosen_penguji1'),
      'dosen_penguji2' => $this->input->post('dosen_penguji2'),
      'jadwal' =>$this->input->post('jadwal'),
       'status' =>'proses'

    );
   
    $this->db->insert('semhas', $data);
  }
 
  public function delete_mahasiswa($id)
  {
      
    $this->db->delete('syarat', array('id_syarat' => $id));
    
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
    public function edit_lihat1($id)
  {
    $data = array(
      'lhs' => $this->input->post('lhs'),
       'kb_semprop' => $this->input->post('kb_semprop')
    );

    $this->db->where('id_syarat', $id);
    $this->db->update('syarat', $data);
  }
    public function edit_lihat2($id)
  {
    $data = array(
      'kb_semprop' => $this->input->post('kb_semprop')
    );

    $this->db->where('id_syarat', $id);
    $this->db->update('syarat', $data);
  }
 function getbi($npm){
    $this->db->select('*');
    $this->db->from('pembimbing');
    $this->db->where('npm', $npm);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
          'id_bimbing' => $data->id_bimbing,
           'npm' => $data->npm,
           

         
          
          );
      }
    }
    return $hasil;
  }
  function getk2($id_skripsi){
    $this->db->select('*');
    $this->db->from('skripsi');
    $this->db->where('id_skripsi', $id_skripsi);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_skripsi' => $data->id_skripsi,
         

         
          
          );
      }
    }
    return $hasil;
  }
  function getsemhas($id_bimbing){
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->where('id_bimbing', $id_bimbing);
    $this->db->where('status1', 'lulus');
    $this->db->where('jenis_seminar', 'semprop');
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_bimbing' => $data->id_bimbing,
        

         
          
          );
      }
    }
    return $hasil;
  }
    function getsidang($id_bimbing){
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->where('id_bimbing', $id_bimbing);
    $this->db->where('status1', 'lulus');
    $this->db->where('jenis_seminar', 'semhas');
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_bimbing' => $data->id_bimbing,
         

         
          
          );
      }
    }
    return $hasil;
  }
  public function get_aktifasi2_id($id)
  {
    $query = $this->db->get_where('syarat', array('id_syarat' => $id));
    $operator = $query->row();

    
    $data = array(
      'id_syarat' => $operator->id_syarat
      
    );

    return $data;
  }
  public function edit_aktifasi2($id)
  {
    $data = array(
     
        'acc_seminar' =>'s1'
    );

    $this->db->where('id_syarat', $id);
    $this->db->update('syarat', $data);
  }

   public function iptsemprop()
    {
       $id_semprop = $this->input->post('id_semprop');
      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->where('id_semprop', $id_semprop);
      $this->db->where('status', 'proses');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
   public function iptsidang()
    {
       $npm = $this->input->post('npm');

       
      $this->db->select('*');
      $this->db->from('sidang');
      $this->db->where('npm', $npm);
      $this->db->where('status', 'proses');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  function get_nmdosen($nip){
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
}
