<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Setting extends CI_Model {
	function getprovinsi(){
		$this->db->select('*');
		$this->db->from('tb_provinsi');
		$query = $this->db->get();
    	return $query->result();
    }

    function getkota($id){
        $this->db->select('*');
        $where = array(
            'id_provinsi' => $id
        );
        $query = $this->db->get_where('tb_kota', $where);
        return $query->result();
    }

    function getakses($ida){
        $this->db->select('*');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_akses.id_menu');
        $this->db->join('tb_anggota', 'tb_anggota.statusanggota = tb_akses.tipeuser');
        $where = array(
            'tb_akses.tipeuser' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();

        // return $this->db->get('tb_menu')->result();
    }

    function getuser(){
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $query = $this->db->get();
        return $query->result();
    }

    function getbarang(){
        $this->db->select('*');
        $this->db->from('tb_satuan');
        $this->db->from('tb_jenisbarang');
        $this->db->from('tb_konversi');
        $query = $this->db->get();
        return $query->result();
    }

    function gethargabarang(){
        $this->db->select('*');
        $this->db->join('tb_jenisbarang', 'tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->from('tb_barang');
        $query = $this->db->get();
        return $query->result();
    }

    function getsuplier(){
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $query = $this->db->get();
        return $query->result();
    }

    function getmenu1($id){
        $this->db->distinct();
        $this->db->select('tb_menu.*');
        $this->db->order_by('urutan', 'ASC');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.tipeuser' => $id, 'tb_akses.view' => '1', 'tb_menu.status'=>'aktif'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function editv($iduser,$submenu,$view){
            $where = array(
                'id_user' =>  $iduser,
                'id_submenu' => $view
            );

            $view = array(
                'view' =>  '1'
            );

            $this->db->where($where);
            $this->db->update('tb_akses',$view);         
        }

    function edita($iduser,$submenu,$add){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $add
        );

        $add = array(
            'add' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$add);         
    }

    function edite($iduser,$submenu,$edit){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $edit
        );

        $edit = array(
            'edit' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$edit);         
    }


    function editd($iduser,$submenu,$delete){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $delete
        );

        $delete = array(
            'delete' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$delete);         
    }

    function refresh($iduser){
        $user = array(
            'view' => '0',
            'add' => '0',
            'edit' => '0',
            'delete' => '0'
        );

        $where = array(
            'id_user' =>  $iduser
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_akses',$user);       
    }


    function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    }

     function getkode(){
        $this->db->select('*');
        $this->db->from('tb_kode');
        $query = $this->db->get();
        return $query->result();
    }

    function tambahdata(){
        $kode = array(
            'modultransaksi' => $this->input->post('modultransaksi'),
            'kodefinal' => $this->input->post('final')
        );
        
        $this->db->insert('tb_kode', $kode);
    }

    function cekkode($modul){        
        $this->db->select('kodefinal');
        $where = array(
            'modultransaksi' => $modul
        );
        $query = $this->db->get_where('tb_kode', $where);
        return $query->result();
    }
 }