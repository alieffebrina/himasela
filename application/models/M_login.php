<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function get($username){
  	$this->db->where('username',$username);
    $this->db->where_not_in('statusanggota', 'tidak aktif');
  	$result = $this->db->get('tb_anggota')->row();
  	return $result;
}
}
?>