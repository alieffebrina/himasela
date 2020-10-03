<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Level extends CI_Model {

	function getlevel(){
		$this->db->order_by('id_level', 'ASC');
        $query = $this->db->get('tb_level');
    	return $query->result();
    }

    function getspek($ida){
    	$this->db->where('id_level', $ida);
        return $this->db->get('tb_level')->result();
    }

    function tambahdata(){
    	$user = array(
    		'id_level' => $this->input->post('level'),
    		'nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('donasi')),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_level', $user);
    }

    public function cekLevel($level){
        // $this->db->where('kelas', $kelas);
        $cek = $this->db->get_where('tb_level', ['id_level' => $level])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

    function update($where, $level) {
    	$this->db->where($where);
        $this->db->update('tb_level',$level);
    }

    function selectmax(){
        $this->db->select_max('id_level');
        return $this->db->get('tb_level')->result();
    }
}
