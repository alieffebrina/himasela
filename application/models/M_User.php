<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	function getuser(){
		$this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'tb_anggota.id_upline = b.id_user');
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_anggota' => $ida
        );
        return $this->db->get_where('tb_anggota',$where)->result();
    }

    function cek_user($kode){
        $this->db->select('*');
        $where = array(
            'username' => $kode
        );
        $query = $this->db->get_where('tb_anggota', $where);
        return $query->result();
    }

    function tambahdata(){
        $user = array(
            // 'nik' => $this->input->post('nik'),
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            // 'alamat' => $this->input->post('alamat'),
            // 'id_kota' => $this->input->post('kota'),
            // 'id_provinsi' => $this->input->post('prov'),
            'password' => $this->input->post('password'),
        );
        
        $this->db->insert('tb_anggota', $user);
    }

    function cekkodeuser(){
        $this->db->select_max('id_anggota');
        $iduser = $this->db->get('tb_anggota');
        return $iduser->row();
    }

    function tambahakses($id){
        $total = $this->db->count_all_results('tb_submenu');

        for($i=0; $i<$total; $i++){
            $fungsi = array('id_submenu' => $i+1 , 
                'id_anggota' => $id);

            $this->db->insert('tb_akses', $fungsi);            
        }
    }

    function getspek($iduser){
		$this->db->select('*'); 
        $where = array(
            'id_anggota' => $iduser
        );
        $query = $this->db->get_where('tb_anggota', $where);
    	return $query->result();
    }

    function edit(){
        $user = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
        );

        $where = array(
            'id_anggota' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }

    
}