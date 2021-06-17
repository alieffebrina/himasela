<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Barang extends CI_Model {

    function getspek($ida){
        $this->db->join('tb_kategoribarang', 'tb_kategoribarang.id_kategoribarang = tb_barang.id_kategoribarang');
    	$this->db->where('id_barang', $ida);
        return $this->db->get('tb_barang')->result();
    }  

    function getbarang(){
        $this->db->join('tb_kategoribarang', 'tb_kategoribarang.id_kategoribarang = tb_barang.id_kategoribarang');
        $query = $this->db->get('tb_barang');
        return $query->result();
    }


    function tambahdata(){
    	$user = array(
    		'hargabeli' => preg_replace('/([^0-9]+)/','',$this->input->post('hargabeli')),
            'hargajual' => preg_replace('/([^0-9]+)/','',$this->input->post('hargajual')),
            'barang' => $this->input->post('barang'),
            'id_kategoribarang' => $this->input->post('katbarang'),
            'stokmin' => $this->input->post('stokmin'),
            'stok' => '0',
            'stokretur' => '0',
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
    	);
    	$this->db->insert('tb_barang', $user);
    }

    function tambahhistoryharga(){
        $user = array(
            'hargabeliawal' => preg_replace('/([^0-9]+)/','',$this->input->post('hargabeliawal')),
            'hargajualawal' => preg_replace('/([^0-9]+)/','',$this->input->post('hargajualawal')),
            'hargabeliakhir' => preg_replace('/([^0-9]+)/','',$this->input->post('hargabeli')),
            'hargajualakhir' => preg_replace('/([^0-9]+)/','',$this->input->post('hargajual')),
            'id_barang' => $this->input->post('id'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
        $this->db->insert('tb_historybarang', $user);
    }


    public function cekbarang($barang){
        $cek = $this->db->get_where('tb_barang', ['barang' => $barang])->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }

    function update() {
        $where = array(
            'id_barang' => $this->input->post('id'),
        );
        $barang = array(
            'hargabeli' => preg_replace('/([^0-9]+)/','',$this->input->post('hargabeli')),
            'hargajual' => preg_replace('/([^0-9]+)/','',$this->input->post('hargajual')),
            'barang' => $this->input->post('barang'),
            'id_kategoribarang' => $this->input->post('katbarang'),
            'stokmin' => $this->input->post('stokmin'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date('Y-m-d h:i:s')
        );
    	$this->db->where($where);
        $this->db->update('tb_barang',$barang);
    }
    
     function gethistoryharga(){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_historybarang.id_user');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_historybarang.id_barang');
        $query = $this->db->get('tb_historybarang');
        return $query->result();
    }
}
