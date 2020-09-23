<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Berita extends CI_Model {

	function getBerita(){
		$this->db->order_by('tb_berita.tglupdate', 'DESC');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_berita.id_user');
        $query = $this->db->get('tb_berita');
    	return $query->result();
    }

    function getspek($ida){
        $this->db->select('tb_anggota.nama, tb_berita.*');
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_berita.id_user');
    	$this->db->where('id_Berita', $ida);
        return $this->db->get('tb_berita')->result();
    }

    function tambahdata(){
    	$user = array(
    		'judul' => $this->input->post('judul'),
    		'isi' => $this->input->post('berita'),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_berita', $user);
    }

    function update() {
        $where = array(
            'id_berita' => $this->input->post('id'),
        );
        $Berita = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('berita'),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
    	$this->db->where($where);
        $this->db->update('tb_berita',$Berita);
    }
}
