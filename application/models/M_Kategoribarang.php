<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kategoribarang extends CI_Model {

    function getspek($ida){
    	$this->db->where('id_kategoribarang', $ida);
        return $this->db->get('tb_kategoribarang')->result();
    }

    function tambahdata(){
    	$user = array(
    		'kategoribarang' => $this->input->post('kategoribarang'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_kategoribarang', $user);
    }

    public function cekkategoribarang($kategoribarang){
        // $this->db->where('kelas', $kelas);
        $cek = $this->db->get_where('tb_kategoribarang', ['id_kategoribarang' => $kategoribarang])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

    function update($where, $kategoribarang) {
    	$this->db->where($where);
        $this->db->update('tb_kategoribarang',$kategoribarang);
    }
}
