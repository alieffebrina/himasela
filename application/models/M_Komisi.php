<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Komisi extends CI_Model {

    function getspek($ida){
    	$this->db->where('id_masterkomisi', $ida);
        return $this->db->get('tb_masterkomisi')->result();
    }

    function tambahdata(){
    	$user = array(
    		'nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('nominal')),
            'poin' => $this->input->post('poin'),
            'level' => $this->input->post('level'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_masterkomisi', $user);
    }

    public function cekmkomisi($mkomisi){
        // $this->db->where('kelas', $kelas);
        $cek = $this->db->get_where('tb_masterkomisi', ['level' => $mkomisi])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

    function update() {
        $where = array(
            'level' => $this->input->post('level'),
        );
        $mkomisi = array(
            'nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('nominal')),
            'poin' => $this->input->post('poin'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
    	$this->db->where($where);
        $this->db->update('tb_masterkomisi',$mkomisi);
    }
}
