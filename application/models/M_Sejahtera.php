<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Sejahtera extends CI_Model {

	function getsejahtera(){
		$this->db->order_by('id_sejahtera', 'ASC');
        $query = $this->db->get('tb_sejahtera');
    	return $query->result();
    }

    function getspek($ida){
    	$this->db->where('id_sejahtera', $ida);
        return $this->db->get('tb_sejahtera')->result();
    }

    function tambahdata(){
    	$user = array(
            'id_sejahtera' => $this->input->post('level'),
    		'anggota' => $this->input->post('anggota'),
            'tabungan' => preg_replace('/([^0-9]+)/','',$this->input->post('tabungan')),
            'income' => preg_replace('/([^0-9]+)/','',$this->input->post('income')),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_sejahtera', $user);
    }

    public function cekSejahtera($sejahtera){
        // $this->db->where('kelas', $kelas);
        $cek = $this->db->get_where('tb_sejahtera', ['id_sejahtera' => $sejahtera])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

     function update() {
        $where = array(
            'id_sejahtera' => $this->input->post('id'),
        );
        $Berita = array(
            'id_sejahtera' => $this->input->post('level'),
            'anggota' => $this->input->post('anggota'),
            'tabungan' => preg_replace('/([^0-9]+)/','',$this->input->post('tabungan')),
            'income' => preg_replace('/([^0-9]+)/','',$this->input->post('income')),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s')
        );
        $this->db->where($where);
        $this->db->update('tb_sejahtera',$Berita);
    }

    function selectmax(){
        $this->db->select_max('id_sejahtera');
        return $this->db->get('tb_sejahtera')->result();
    }
}
