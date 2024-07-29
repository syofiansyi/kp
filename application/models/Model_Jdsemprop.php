<?php
class Model_Jdsemprop extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function tglsemprop()
    {
      $this->db->distinct();
      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function tglsemhas()
    {
      $this->db->distinct();
      $this->db->select('*');
      $this->db->from('semhas');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function tglsidang()
    {
      $this->db->distinct();
      $this->db->select('*');
      $this->db->from('sidang');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 
    public function get()
    {

      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semprop.id_semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
      // $this->db->where('acc_seminar', 's1');
      $this->db->where('status', 'proses');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
    public function dosen()
  {
   
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('level', '2');
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $operator) {
        $hasil=array(
         'nip' => $operator->nip,
         'nama_dosen' => $operator->nama_dosen,
          
          );
      }
    }
    return $hasil;
  }
   public function get_data_by_pk($tbl, $where, $id)
    {
                $this->db->from($tbl);
                $this->db->where($where,$id);
                $query = $this->db->get();

                return $query;
    }
   public function getsemprop_laporan($tahun)
    {

      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semprop.id_semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
      // $this->db->where('acc_seminar', 's1');
      $this->db->like('tanggal', $tahun);
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function getsemhas_laporan($tahun)
    {

      $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm,semhas.tanggal1, semhas.id_semhas, skripsi.judul,semhas.nama_pg1, semhas.nama_pg2, semhas.id_semhas' );
      $this->db->from('semhas');
      $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semhas.id_semhas');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
      $this->db->like('tanggal1', $tahun);
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function getsidang_laporan($tahun)
    {

   $this->db->distinct();
      $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, skripsi.judul,sidang.nama_pg1, sidang.nama_pg2, sidang.id_sidang', 'sidang.tanggal3');
      $this->db->from('sidang');
      // $this->db->join('syarat', 'syarat.id_syarat = sidang.id_bimbing');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
     $this->db->like('sidang.tanggal3', $tahun);
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function dpt()
    {

      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semprop.id_semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
    // $this->db->where('acc_seminar', 's1');
      $this->db->where('status', 'selesai');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function dptm()
    {
 $npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = semprop.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semprop.id_semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
      $this->db->where('semprop.npm', $npm);
    // $this->db->where('acc_seminar', 's1');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function dptd()
    {
 $nip = $this->session->userdata('username');

      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_semprop');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = semprop.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semprop.id_semprop');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
      $this->db->where('status', 'proses');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }

   public function get1()
    {

     $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm, semhas.tanggal1, semprop.tanggal,semhas.id_semhas,skripsi.judul,semhas.nama_pg1, semhas.nama_pg2 , semhas.status');
      $this->db->from('semhas');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semhas.id_bimbing');
       $this->db->join('semprop', 'semhas.id_bimbing = semprop.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
       $this->db->where('semhas.status', 'proses');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function get5()
    {

     $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm, semhas.tanggal1, semprop.tanggal,semhas.id_semhas,skripsi.judul, semhas.nama_pg2, semhas.nama_pg1 , semhas.status');
      $this->db->from('semhas');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semhas.id_semhas');
       $this->db->join('semprop', 'semhas.id_bimbing = semprop.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
       $this->db->where('semhas.status', 'proses');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }


  public function dptm1()
    {
$npm = $this->session->userdata('username');
     $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm, semhas.tanggal1, semprop.tanggal,semhas.id_semhas, semhas.pg1, semhas.pg2, semhas.nama_pg1, semhas.nama_pg2,semhas.id_semhas, semhas.status');
      $this->db->from('semhas');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semhas.id_semhas');
       $this->db->join('semprop', 'semhas.id_bimbing = semprop.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
       $this->db->where('semhas.npm', $npm);
        // $this->db->where('acc_seminar', 's2');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function dpt1()
    {

        $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm, semhas.tanggal1, semprop.tanggal, skripsi.judul, semhas.nama_pg2, semhas.nama_pg1, semhas.id_semhas , semhas.status');
      $this->db->from('semhas');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
        $this->db->join('pembimbing', 'pembimbing.id_bimbing = semhas.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = semhas.id_semhas');
       $this->db->join('semprop', 'semhas.id_bimbing = semprop.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
      // $this->db->where('acc_seminar', 's2');
       $this->db->where('semhas.status', 'selesai');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function dptd1()
    {
$nip = $this->session->userdata('username');
         $this->db->select('semhas.ruang, semhas.pukul,mahasiswa.nama_mhs, semhas.npm, semhas.tanggal1, semprop.tanggal, skripsi.judul, semhas.id_semhas, semhas.nama_pg1, semhas.nama_pg2 ,semhas.status');
      $this->db->from('semhas');
       $this->db->join('pembimbing', 'pembimbing.id_bimbing = semhas.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
      $this->db->join('syarat', 'syarat.id_syarat = semhas.id_bimbing');
       $this->db->join('semprop', 'semhas.id_bimbing = semprop.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
      // $this->db->where('acc_seminar', 's2');
       $this->db->where('semhas.status', 'proses');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
    public function get2()
    {
$this->db->distinct();
     $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, skripsi.judul, sidang.nama_pg2, sidang.nama_pg1 , sidang.status');
      $this->db->from('sidang');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      $this->db->join('syarat', 'syarat.id_syarat = sidang.id_bimbing');
      $this->db->join('semhas', 'semhas.id_bimbing = sidang.id_bimbing');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
    
      // $this->db->where('acc_seminar', 's3');
       $this->db->where('sidang.status', 'proses');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function get6()
    {

     $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, skripsi.judul, sidang.nama_pg1, sidang.nama_pg2 , sidang.status');
      $this->db->from('sidang');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      $this->db->join('syarat', 'syarat.id_syarat = sidang.id_bimbing');
      $this->db->join('semhas', 'semhas.id_bimbing = sidang.id_bimbing');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
    
      // $this->db->where('acc_seminar', 's3');
       $this->db->where('sidang.status', 'proses');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function dptm2()
    {
$npm = $this->session->userdata('username');
 $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, sidang.pg1, sidang.pg2, sidang.nama_pg1, sidang.nama_pg2, sidang.nama_pg2, sidang.nama_pg1, sidang.status');
    
      $this->db->from('sidang');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = sidang.id_sidang');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
     $this->db->where('sidang.npm', $npm);
      // $this->db->where('acc_seminar', 's3');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 
    public function dpt2()
    {
 $this->db->distinct();
      $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, skripsi.judul,sidang.nama_pg1, sidang.nama_pg2, sidang.id_sidang , sidang.status');
      $this->db->from('sidang');
      
      // $this->db->join('syarat', 'syarat.id_syarat = sidang.id_bimbing');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
    $this->db->where('sidang.status', 'selesai');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function dptd2()
    {
$nip = $this->session->userdata('username');
 $this->db->distinct();
      $this->db->select('sidang.ruang, sidang.pukul,mahasiswa.nama_mhs, sidang.npm, sidang.tanggal3, semprop.tanggal, sidang.id_sidang, skripsi.judul, sidang.nama_pg1, sidang.nama_pg2 ,sidang.status');
      $this->db->from('sidang');
     
       $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
      // $this->db->join('syarat', 'syarat.id_syarat = sidang.id_bimbing');
      $this->db->join('semprop', 'semprop.id_bimbing = sidang.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
    $this->db->where('sidang.status', 'proses');
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 
   
     public function get_idpenguji($id)
  {
   
   $this->db->select('*');
    $this->db->from('semprop');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = semprop.id_bimbing');
     $this->db->join('nilai', 'nilai.id_bimbing = semprop.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semprop.id_bimbing');
     $this->db->join('mahasiswa', 'mahasiswa.npm = semprop.npm');
    $this->db->where('semprop.id_bimbing', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $operator) {
        $hasil=array(
         'id_semprop' => $operator->id_semprop,
          'id_bimbing' => $operator->id_bimbing,
         'pukul' => $operator->pukul,
          'nama_pg1' => $operator->nama_pg1,
           'pg1' => $operator->pg1,
            'nama_pg2' => $operator->nama_pg2,
           'pg2' => $operator->pg2,
           'nama_pb1' => $operator->nama_pb1,
           'pb1' => $operator->pb1,
            'nama_pb2' => $operator->nama_pb2,
           'pb2' => $operator->pb2,
          'ruang' => $operator->ruang,
            'tanggal' => $operator->tanggal,
             'npm' => $operator->npm,
             'nama_mhs' => $operator->nama_mhs,
              'judul' => $operator->judul,   
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
               'metopen'  => $operator->metopen,

           
         

         
          
          );
      }
    }
    return $hasil;
  }
   public function get_idpenguji1($id)
  {
     $this->db->select('*');
    $this->db->from('semhas');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = semhas.id_bimbing');
     $this->db->join('nilai', 'nilai.id_bimbing = semhas.id_bimbing');
       $this->db->join('skripsi', 'skripsi.id_skripsi = semhas.id_bimbing');
     $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
    $this->db->where('id_semhas', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $operator) {
        $hasil=array(
         'id_semhas' => $operator->id_semhas,
          'id_bimbing' => $operator->id_bimbing,
         'pukul' => $operator->pukul,
          'nama_pg1' => $operator->nama_pg1,
           'pg1' => $operator->pg1,
            'nama_pg2' => $operator->nama_pg2,
           'pg2' => $operator->pg2,
           'nama_pb1' => $operator->nama_pb1,
           'pb1' => $operator->pb1,
            'nama_pb2' => $operator->nama_pb2,
           'pb2' => $operator->pb2,
          'ruang' => $operator->ruang,
            'tanggal1' => $operator->tanggal1,
             'npm' => $operator->npm,
             'nama_mhs' => $operator->nama_mhs,
              'judul' => $operator->judul,
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
      'metopen'  => $operator->metopen,

         

         
          
          );
      }
    }
    return $hasil;
  }

 public function get_idpenguji2($id)
 {
     $this->db->select('*');
    $this->db->from('sidang');
     $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
      $this->db->join('nilai', 'nilai.id_bimbing = sidang.id_bimbing');
      $this->db->join('skripsi', 'skripsi.id_skripsi = sidang.id_bimbing');
     $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
    $this->db->where('id_sidang', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $operator) {
        $hasil=array(
         'id_sidang' => $operator->id_sidang,
          'id_bimbing' => $operator->id_bimbing,
         'pukul' => $operator->pukul,
          'nama_pg1' => $operator->nama_pg1,
           'pg1' => $operator->pg1,
            'nama_pg2' => $operator->nama_pg2,
           'pg2' => $operator->pg2,
           'nama_pb1' => $operator->nama_pb1,
           'pb1' => $operator->pb1,
            'nama_pb2' => $operator->nama_pb2,
           'pb2' => $operator->pb2,
          'ruang' => $operator->ruang,
            'tanggal3' => $operator->tanggal3,
             'npm' => $operator->npm,
             'nama_mhs' => $operator->nama_mhs,
              'judul' => $operator->judul,
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
      'metopen'  => $operator->metopen,


         
          
          );
      }
    }
    return $hasil;
  }
  public function id_semprop()
  {
     $id_semprop = $this->input->post('id_semprop');


        $this->db->select('*');
        $this->db->from('semprop');
        $this->db->where('id_semprop',$id_semprop);
        $this->db->order_by('id_semprop', 'DESC');
        $query = $this->db->get();

        return $query;
  }

public function id_semhas()
  {
     $id_semhas = $this->input->post('id_semhas');


        $this->db->select('*');
        $this->db->from('semhas');
        $this->db->where('id_semhas',$id_semhas);
        $this->db->order_by('id_semhas', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function id_sidang()
  {
     $id_sidang = $this->input->post('id_sidang');


        $this->db->select('*');
        $this->db->from('sidang');
        $this->db->where('id_sidang',$id_sidang);
        $this->db->order_by('id_sidang', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function update_data($tbl, $data)
    {
        
          $id_semprop = $this->input->post('id_semprop');
         $this->db->where('id_semprop', $id_semprop);
    $this->db->update($tbl, $data);
        
    }
    public function update_data1($tbl, $data)
    {
        
          $id_semhas = $this->input->post('id_semhas');
         $this->db->where('id_semhas', $id_semhas);
    $this->db->update($tbl, $data);
        
    }
     public function update_data2($tbl, $data)
    {
        
          $id_sidang = $this->input->post('id_sidang');
         $this->db->where('id_sidang', $id_sidang);
    $this->db->update($tbl, $data);
        
    }
}
