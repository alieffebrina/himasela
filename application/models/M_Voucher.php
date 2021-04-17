<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Voucher extends CI_Model {

	function getBerita(){
		$this->db->order_by('tb_berita.tglupdate', 'DESC');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_berita.id_user');
        $query = $this->db->get('tb_berita');
    	return $query->result();
    }

    function tambahdata(){
    	$user = array(
    		'voucher' => $this->input->post('voucher'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s'),
            'status' => 'tidak'
    	);
    	$this->db->insert('tb_voucher', $user);
    }
}