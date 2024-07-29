<?php
class Model_login extends CI_Model {    
 
   function __construct(){
      parent::__construct();
      $this->load->database();
    }
    
  public function login_operator()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $query = $this->db->get_where('operator', $data);

    if ($query->num_rows() == 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
 public function login_dosen()
  {
    $data = array(
      'nip' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $query = $this->db->get_where('dosen', $data);

    if ($query->num_rows() == 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function login_mahasiswa()
  {
    $data = array(
      'npm' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $query = $this->db->get_where('mahasiswa', $data);

    if ($query->num_rows() == 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function get_operator()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $query = $this->db->get_where('operator', $data);
    return $query;
  }

  public function get_mahasiswa()
  {
    $data = array(
      'npm' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    
    $query = $this->db->get_where('mahasiswa', $data);
    return $query;
  }
  public function get_dosen()
  {
    $data = array(
      'nip' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    
    $query = $this->db->get_where('dosen', $data);
    return $query;
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
}
