<?php
class Model_dashboard extends CI_Model {
    public function get_mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        
        $this->db->order_by('npm', 'mahasiswa');
        $query = $this->db->get();
        
        return $query;
    }

    public function count_mahasiswa()
    {
        $query = $this->db->count_all_results('mahasiswa');
        return $query;
    }

 public function get_dosen()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        
        $this->db->order_by('nip', 'dosen');
        $query = $this->db->get();
        
        return $query;
    }

    public function count_dosen()
    {
        $query = $this->db->count_all_results('dosen');
        return $query;
    }
    
}