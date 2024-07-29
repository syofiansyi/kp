<?php
class Model_laporan extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
 
    public function get()
    {
$this->db->select('*');
      $this->db->from('syarat');
      $this->db->join('semprop', 'syarat.id_syarat = semprop.id_semprop');
        $this->db->join('semhas', 'syarat.id_syarat = semhas.id_semhas');
      $this->db->order_by('syarat.id_syarat', 'DESC');      
      $query = $this->db->get();
 
      // Return hasil query
      return $query;
  }
  
  public function semprop()
    {       
       
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('semprop', 'semprop.id_semprop = pembimbing.id_bimbing');
        $this->db->join('skripsi', 'skripsi.id_skripsi = pembimbing.id_bimbing');
        $this->db->order_by('pembimbing.id_bimbing', 'ASC');
        $query = $this->db->get();      

        // Return hasil query
        return $query;
    }

  public function semhas()
    {       
       
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('semhas', 'semprop.id_semhas = pembimbing.id_bimbing');
        $this->db->join('skripsi', 'skripsi.id_skripsi = pembimbing.id_bimbing');
        $this->db->order_by('pembimbing.id_bimbing', 'ASC');
        $query = $this->db->get();      

        // Return hasil query
        return $query;
    }

  public function sidang()
    {       
       
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('sidang', 'sidang.id_sidang = pembimbing.id_bimbing');
        $this->db->join('skripsi', 'skripsi.id_skripsi = pembimbing.id_bimbing');
        $this->db->order_by('pembimbing.id_bimbing', 'ASC');
        $query = $this->db->get();      

        // Return hasil query
        return $query;
    }



}

