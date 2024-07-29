<?php
class Model_mahasiswadata extends CI_Model {
    public function get()
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
    public function tbskrip()
    {
       $id_skripsi = $this->input->post('id_skripsi');

       
      $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->where('id_skripsi', $id_skripsi);
      $this->db->where('acc_judul', 'terima');
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
    public function get_tb()
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

  public function get_insemprop()
  {
     $npm = $this->session->userdata('username');
     $this->db->select('*');
      $this->db->from('semprop');
       $this->db->where('status', 'selesai');
       $this->db->where('npm', $npm);
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
   public function tbisidang()
  {
     $npm = $this->session->userdata('username');
    $this->db->select('*');
      $this->db->from('nilai');
        $this->db->where('npm', $npm);
      $this->db->where('jenis_seminar', 'semhas');
       $this->db->where('status1', 'lulus');
      $this->db->order_by('id_nilai', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
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
     public function getsemprop()
    {
       $npm = $this->session->userdata('username');
        $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      // $this->db->where('acc_seminar', 'semprop');
       $this->db->where('mahasiswa.npm', $npm);
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  function getsemhas($id_semprop){
    $this->db->select('*');
    $this->db->from('semprop');
    $this->db->where('id_semprop', $id_semprop);
    $this->db->where('status', 'selesai');
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_semprop' => $data->id_semprop,
         

         
          
          );
      }
    }
    return $hasil;
  }
 
    function getsidang($id_nilai){
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->where('id_nilai', $id_nilai);
    $this->db->where('status1', 'lulus');
    $this->db->where('jenis_seminar', 'semhas');
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_nilai' => $data->id_nilai,
         

         
          
          );
      }
    }
    return $hasil;
  }
    public function get_semhas()
    {
 $npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'semhas');
        $this->db->where('mahasiswa.npm', $npm);
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }

   public function get_sidang()
    {
$npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'sidang');
       $this->db->where('mahasiswa.npm', $npm);
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
 
   public function get_skripsemprop()
  {
    $npm = $this->session->userdata('username');
     $this->db->select('*');
      $this->db->from('skripsi');
      $this->db->join('pembimbing', 'pembimbing.id_bimbing = skripsi.id_skripsi');
      $this->db->where('acc_judul', 'selesai');
       $this->db->where('pembimbing.npm', $npm);
      $this->db->order_by('id_skripsi', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
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
  public function getskrip()
    {

      $this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('mahasiswa', 'mahasiswa.npm = syarat.npm');
      $this->db->where('acc_seminar', 'semprop');
      $this->db->or_where('acc_seminar', 's1');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
 
    //  $this->load->database();
    // $query=$this->db->query('SELECT * FROM operator where operator.username='g1a015055'');
    // return $query->result();

  }
  public function satu()
    {
      $this->db->distinct();
      $this->db->select('tahun');
      $this->db->from('syarat');
      $this->db->order_by('id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;

  }
  public function get_mhs()
  {
     $this->db->select('*');
      $this->db->from('mahasiswa');
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
    // }    
  }
    public function get_where($where)
    {
        // Jalankan query
        $query = $this->db            
       
                   
            ->where($where)
            ->order_by('npm', 'DESC')
            ->get('mahasiswa');

        // Return hasil query
        return $query;
    }

    public function insert($data)
    {        
        $query = $this->db->insert('mahasiswa', $data);        
        return $query;
    }
    public function get_data_by_pk($tbl, $where, $id)
    {
                $this->db->from($tbl);
                $this->db->where($where,$id);
                $query = $this->db->get();

                return $query;
    }
    
    public function update_data($tbl, $data)
    {
        
         $npm = $this->session->userdata('username');
         $this->db->where('npm', $npm);
    $this->db->update($tbl, $data);
        
    }
        public function save_data($tbl, $data)
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
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
    public function get2()
    {
      
       
      $this->db->select('*');
      $this->db->from('mahasiswa');
     
      $this->db->order_by('npm', 'DESC');      
      $query = $this->db->get();
 
      
      return $query;
  
   

  }
   public function get_data_dosen()
  {
    $query = $this->db->get('dosen');
    return $query->result();
  }
   public function get_seminar()
  {
    $query = $this->db->get('semprop');
    return $query->result();
  }
  public function get_mahasiswa()
  {
    $npm = $this->session->userdata('username');
    $query = $this->db->get_where('skripsi', array('npm' => $npm));
    return $query->result();
  }
  public function get_mahasiswa_id()
  {
     $npm = $this->session->userdata('username');
    $query = $this->db->get_where('mahasiswa', array('npm' => $npm));
    $operator = $query->row();

    
    $data = array(
    
       'nama_mhs' => $operator->nama_mhs
    );

    return $data;
  }
   public function edit_mahasiswa()
  {
    $data = array(
      'nama_mhs' => $this->input->post('nama_mhs')
       
    
    );
 $npm = $this->session->userdata('username');
    $this->db->where('npm', $npm);
    $this->db->update('mahasiswa', $data);
  }
  public function tbsemhas()
  {
     $npm = $this->input->post('npm');
        $this->db->select('*');
        $this->db->from('syarat');
        $this->db->where('npm',$npm);
        $this->db->where('acc_seminar','semhas');
        $this->db->order_by('id_syarat', 'DESC');
        $query = $this->db->get();

        return $query;
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
}