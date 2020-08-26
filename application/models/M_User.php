<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	function getuser(){
		$this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $anggota = array('anggota', 'administrator', 'admin','tidak aktif');
        $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }

    function totalanggota(){
        $this->db->where_not_in('statusanggota', 'tidak aktif');
        $query = $this->db->get('tb_anggota');
        return $query->num_rows();
    }

    function waitupline(){
        $this->db->where('statusanggota', 'menunggu konfirmasi upline');
        $query = $this->db->get('tb_anggota');
        return $query->num_rows();
    }

    function waitadmin(){
        $this->db->where('statusanggota', 'menunggu konfirmasi admin');
        $query = $this->db->get('tb_anggota');
        return $query->num_rows();
    }

    function sdhbayar(){
        $this->db->where('statusbayar', 'sudah bayar');
        $this->db->where_not_in('statusanggota', 'tidak aktif');
        $query = $this->db->get('tb_anggota');
        return $query->num_rows();
    }

    function getall(){
        $this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $anggota = array('menunggu konfirmasi admin', 'menunggu konfirmasi upline','tidak aktif');
        $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getuserspek($iduser){
        $this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $anggota = array('anggota', 'administrator', 'admin','tidak aktif');
        $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $this->db->where('tb_anggota.id_upline', $iduser);
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getallspek($iduser){
        $this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $anggota = array('menunggu konfirmasi admin', 'menunggu konfirmasi upline','tidak aktif');
        $this->db->where_not_in('tb_anggota.statusanggota', $anggota);
        $this->db->where('tb_anggota.id_upline', $iduser);
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

    function upload(){
        $file_name = $this->input->post('input_gambar');
        $path= FCPATH.'images';
        //echo $path;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $config['width']= '3000';
        $config['height']= '4000';
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
           $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else{
            $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
            return $return; 
        }
    
    }

    
    

    function tambahdata($nourut, $upline){
        $user = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'bank' => $this->input->post('bank'),
            'norek' => $this->input->post('norek'),
            'pemilik' => $this->input->post('pemilik'),
            'jumlahhu' => $this->input->post('jumlahhu'),
            'namasponsor' => $this->input->post('namasponsor'),
            'id_upline' => $upline,
            'nourut' => $nourut,
            // 'buktitransfer' => $upload['file']['file_name'],
            'statusbayar' => 'belum bayar',
            'statusanggota' => 'menunggu konfirmasi upline',
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );
        
        $this->db->insert('tb_anggota', $user);
    }

    function getuserall(){

        $this->db->where_not_in('statusanggota', 'tidak aktif');
        $iduser = $this->db->get('tb_anggota');
        return $iduser->result();
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
        $this->db->select('tb_anggota.*, b.nama namaupline, tb_provinsi.*, tb_kota.*, tb_kecamatan.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_anggota.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_anggota.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_anggota.id_kecamatan');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $where = array(
            'tb_anggota.id_anggota' => $iduser
        );
        $query = $this->db->get_where('tb_anggota', $where);
    	return $query->result();
    }

    function edit(){
        $user = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_kota' => $this->input->post('kota'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'bank' => $this->input->post('bank'),
            'norek' => $this->input->post('norek'),
            'pemilik' => $this->input->post('pemilik'),
            'jumlahhu' => $this->input->post('jumlahhu'),
            'namasponsor' => $this->input->post('namasponsor'),
            // 'id_upline' => $this->input->post('upline'),
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'id_anggota' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }

    function hapus($id){
        $user = array(
            'statusanggota' => 'tidak aktif',
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'id_anggota' =>  $id,
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }

    function konfirm($iduser,$bayar,$anggota,$id,$username){
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';//buat karakter yang akan digunakan sebagai password
        $st = '';
        for($i=0; $i<8; $i++){
            $p = rand(0, strlen($huruf)-1);
            $st .=$huruf{$p};
        }

        $password = $st;
        if ($anggota == 'menunggu konfirmasi upline'){
            $statusanggota = 'menunggu konfirmasi admin';
            $username = '';
            $password = '';
            $statusbayar = '';
        } else {
            $statusanggota = 'anggota';
            $username = $username;
            $password = $password;
            $statusbayar = 'sudah bayar';
        }

        $user = array(
            'statusanggota' => $statusanggota,
            'statusbayar' => $statusbayar,
            'id_user' => $id,
            'username' => $username,
            'password' => $password,
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
        );

        $where = array(
            'id_anggota' =>  $iduser,
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    }   

    function konfirmadmin($upload){
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';//buat karakter yang akan digunakan sebagai password
        $st = '';
        for($i=0; $i<8; $i++){
            $p = rand(0, strlen($huruf)-1);
            $st .=$huruf{$p};
        }

        $password = $st;
        $password = $password;


        $user = array(
            'buktitransfer' => $upload['file']['file_name'],
            'statusanggota' => 'anggota',
            'id_user' => $this->session->userdata('id_user'),
            'tglupdate' => date('Y-m-d h:i:s'),
            'username' => $this->input->post('nik'),
            'password' => $password,
            'statusbayar' => 'sudah bayar',
        );

        $where = array(
            'id_anggota' =>  $this->input->post('noanggota'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_anggota',$user);
    } 
}