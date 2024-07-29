<?php
class Model_Stsdosen extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
     public function pembimbing()
  {
     $pb1 = $this->input->post('pg1');
      $pb2 = $this->input->post('pg2');
      
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('skripsi', 'skripsi.id_skripsi = pembimbing.id_bimbing');
        $this->db->where('pb1',$pb1); 
        $this->db->or_where('pb1',$pb2);
        $this->db->or_where('pb2',$pb1);
        $this->db->or_where('pb2',$pb2);

        $this->db->order_by('id_bimbing', 'DESC');
        $query = $this->db->get();

        return $query;
  }
 
    public function get()
    {

      $this->db->select('*');
      $this->db->from('pembimbing');
      $this->db->join('mahasiswa', 'pembimbing.npm = mahasiswa.npm');
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function getm()
    {
 $npm = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('pembimbing');
      $this->db->join('mahasiswa', 'pembimbing.npm = mahasiswa.npm');
         $this->db->where('pembimbing.npm', $npm);
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
     public function getd()
    {
 $nip = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('pembimbing');
      $this->db->join('mahasiswa', 'pembimbing.npm = mahasiswa.npm');
      $this->db->where('pb1', $nip);
       $this->db->or_where('pb2', $nip);
      $this->db->order_by('id_bimbing', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function get_dosen()
    {

      $this->db->select('*');
      $this->db->from('dosen');
      $this->db->order_by('nip', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
   public function get1()
    {
     
      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('mahasiswa', 'semprop.npm = mahasiswa.npm');
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function get11()
    {
      $nip = $this->session->userdata('username');
     
      $this->db->select('*');
      $this->db->from('semprop');
      $this->db->join('mahasiswa', 'semprop.npm = mahasiswa.npm');
      $this->db->where('pg1', $nip);
      $this->db->or_where('pg2', $nip);
      
      $this->db->order_by('id_semprop', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
 public function get21()
    {

      $nip = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('semhas');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
      $this->db->where('pg1', $nip);
      $this->db->or_where('pg2', $nip);
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function get2()
    {

      
      $this->db->select('*');
      $this->db->from('semhas');
      $this->db->join('mahasiswa', 'mahasiswa.npm = semhas.npm');
      $this->db->order_by('id_semhas', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
public function get3()
    {

   
       $this->db->select('*');
      $this->db->from('sidang');
      $this->db->join('mahasiswa', 'mahasiswa.npm = sidang.npm');
  
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
public function get31()
    {

    $nip = $this->session->userdata('username');
      $this->db->select('*');
      $this->db->from('sidang');
      $this->db->join('mahasiswa', 'sidang.npm = mahasiswa.npm');
      $this->db->where('pg1', $nip);
      $this->db->or_where('pg2', $nip);
      $this->db->order_by('id_sidang', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
   

  }
  public function get_idbimbing($id)
  {
    $query = $this->db->get_where('pembimbing', array('id_bimbing' => $id));
    $operator = $query->row();

    
    $data = array(
      'id_bimbing' => $operator->id_bimbing,
      'pb1' => $operator->pb1,
      'nama_pb1' => $operator->nama_pb1,
      'nama_pb2' => $operator->nama_pb2,
        'pb2' => $operator->pb2
       
    );

    return $data;
  }

 public function get_idpenguji($id)
  {
     $this->db->select('*');
    $this->db->from('semprop');
    $this->db->join('pembimbing', 'pembimbing.id_bimbing = semprop.id_bimbing');
    $this->db->where('id_semprop', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_semprop' => $data->id_semprop,
           'nama_pg1' => $data->nama_pg1,
            'nama_pg2' => $data->nama_pg2,
            'nama_pb1' => $data->nama_pb1,
            'nama_pb2' => $data->nama_pb2,
             'pg1' => $data->pg1,
              'pg2' => $data->pg2,
               'pb1' => $data->pb1,
                'pb2' => $data->pb2,
          
          );
      }
    }
    return $hasil;
  }
  public function get_idpengujih($id)
  {
   $this->db->select('*');
    $this->db->from('semhas');
    $this->db->join('pembimbing', 'pembimbing.id_bimbing = semhas.id_bimbing');
    $this->db->where('id_semhas', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_semhas' => $data->id_semhas,
           'nama_pg1' => $data->nama_pg1,
            'nama_pg2' => $data->nama_pg2,
            'nama_pb1' => $data->nama_pb1,
            'nama_pb2' => $data->nama_pb2,
             'pg1' => $data->pg1,
              'pg2' => $data->pg2,
               'pb1' => $data->pb1,
                'pb2' => $data->pb2,
          
          );
      }
    }
    return $hasil;
  }
  public function get_idpengujis($id)
  {
     $this->db->select('*');
    $this->db->from('sidang');
    $this->db->join('pembimbing', 'pembimbing.id_bimbing = sidang.id_bimbing');
    $this->db->where('id_sidang', $id);
    $query = $this->db->get();
 
    if($query->num_rows()>0){
      foreach ($query->result() as $data) {
        $hasil=array(
            'npm' => $data->npm,
          'id_sidang' => $data->id_sidang,
           'nama_pg1' => $data->nama_pg1,
            'nama_pg2' => $data->nama_pg2,
            'nama_pb1' => $data->nama_pb1,
            'nama_pb2' => $data->nama_pb2,
             'pg1' => $data->pg1,
              'pg2' => $data->pg2,
               'pb1' => $data->pb1,
                'pb2' => $data->pb2,
          
          );
      }
    }
    return $hasil;
  }
   public function edit_bimbing($id)
 {
    $data = array(
     
      'pb1' => $this->input->post('pb1'),
      'nama_pb2' => $this->input->post('nama_pb2'),
      'nama_pb1' => $this->input->post('nama_pb1'),
      'pb2' =>$this->input->post('pb2'),
      
    );

    $this->db->where('id_bimbing', $id);
    $this->db->update('pembimbing', $data);
  }

public function nip_semhas()
  {
    

        $this->db->select('*');
        $this->db->from('semhas');
        $this->db->order_by('id_semhas', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function nip_sidang()
  {
    

        $this->db->select('*');
        $this->db->from('sidang');
        $this->db->order_by('id_sidang', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function get_data_by_pk($tbl, $where, $id)
    {
                $this->db->from($tbl);
                $this->db->where($where,$id);
                $query = $this->db->get();

                return $query;
    }
  public function nip1()
  {
     $nip1 = $this->input->post('pg1');


        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nip',$nip1);
        $this->db->order_by('nip', 'DESC');
        $query = $this->db->get();

        return $query;
  }
   public function nip2()
  {
     $nip2 = $this->input->post('pg2');


        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nip',$nip2);
        $this->db->order_by('nip', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function id_bimbing()
  {
     $id_bimbing = $this->input->post('id_bimbing');

        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->where('id_bimbing',$id_bimbing);
        $this->db->order_by('id_bimbing', 'DESC');
        $query = $this->db->get();

        return $query;
  }
   public function pb1()
  {
     $pb1 = $this->input->post('pb1');


        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nip',$pb1);
        $this->db->order_by('nip', 'DESC');
        $query = $this->db->get();

        return $query;
  }
  public function pb2()
  {
     $pb2 = $this->input->post('pb2');


        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nip',$pb2);
        $this->db->order_by('nip', 'DESC');
        $query = $this->db->get();

        return $query;
  }
public function edit_penguji($id)
 {
    $data = array(
     'id_semprop' => $this->input->post('id_semprop'),
      'pg1' => $this->input->post('pg1'),
      
      'pg2' =>$this->input->post('pg2')
      
    );

    $this->db->where('id_semprop', $id);
    $this->db->update('semprop', $data);
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
  public function update_data($tbl, $data)
    {
        
          $id_bimbing = $this->input->post('id_bimbing');
         $this->db->where('id_bimbing', $id_bimbing);
    $this->db->update($tbl, $data);
        
    }
public function update_data1($tbl, $data)
    {
        
          $id_semprop = $this->input->post('id_semprop');
         $this->db->where('id_semprop', $id_semprop);
    $this->db->update($tbl, $data);
        
    }
public function update_data2($tbl, $data)
    {
        
          $id_semhas = $this->input->post('id_semhas');
         $this->db->where('id_semhas', $id_semhas);
    $this->db->update($tbl, $data);
        
    }

    public function update_data3($tbl, $data)
    {
        
          $id_sidang = $this->input->post('id_sidang');
         $this->db->where('id_sidang', $id_sidang);
    $this->db->update($tbl, $data);
        
    }



}
