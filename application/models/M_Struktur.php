<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Struktur extends CI_Model {

	function gettotal(){
		$this->db->select_max('Length(nourut)', 'nourut');
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }

    function getuser(){
    	$this->db->where('id_anggota', '1');
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }
}