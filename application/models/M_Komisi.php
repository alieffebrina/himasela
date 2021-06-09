<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Komisi extends CI_Model {

    function getspek($ida){
    	$this->db->where('id_masterkomisi', $ida);
        return $this->db->get('tb_mkomisi')->result();
    }

    function tambahdata(){
    	$user = array(
    		'nominal' => $this->input->post('nominal'),
            'poin' => $this->input->post('poin'),
            'level' => $this->input->post('level'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_mkomisi', $user);
    }

    public function cekmkomisi($mkomisi){
        // $this->db->where('kelas', $kelas);
        $cek = $this->db->get_where('tb_mkomisi', ['id_masterkomisi' => $mkomisi])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

    function update($where, $mkomisi) {
    	$this->db->where($where);
        $this->db->update('tb_mkomisi',$mkomisi);
    }
}
