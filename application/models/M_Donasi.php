<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Donasi extends CI_Model {

	function getuser(){
		$this->db->select('tb_anggota.*, b.nama namaupline');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $this->db->where('tb_anggota.statusanggota', 'anggota');
        $query = $this->db->get('tb_anggota');
    	return $query->result();
    }

    function getuserupline($nourut){
        $this->db->select('tb_anggota.*, b.nama namaupline');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $this->db->where('tb_anggota.statusanggota', 'anggota');
        $this->db->like('tb_anggota.nourut', $nourut, 'after');
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getuserspek($id_user){
        $this->db->select('tb_anggota.*, b.nama namaupline');
        $this->db->join('tb_anggota b', 'b.id_anggota = tb_anggota.id_upline');
        $this->db->where('tb_anggota.id_anggota', $id_user);
        $query = $this->db->get('tb_anggota');
        return $query->result();
    }

    function getdonasi(){
        $this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_donasi.id_anggota');
        $query = $this->db->get('tb_donasi');
        return $query->result();
    }

    function upload(){
        $file_name = $this->input->post('imagebt');
        $path= FCPATH.'/images';
        //echo $path;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $config['width']= '3000';
        $config['height']= '4000';
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        if($this->upload->do_upload('imagebt')){ // Lakukan upload dan Cek jika proses upload berhasil
           $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else{
            $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
            return $return; 
        }
    
    }

    function upgrade($upload, $level, $anggota){
         $user = array(
            'buktibayar' => $upload['file']['file_name'],
            'id_anggota' => $anggota,
            'levelupgrade' => $level,
            'tglbayar' => date('Y-m-d'),
            'status' => 'menunggu aprove'
        );
        
        $this->db->insert('tb_donasi', $user);
    }

    function aprove($iduser, $idanggota,$level){
        $user = array(
            'tglaprove' => date('Y-m-d'),
            'status' => 'Aproval',
        );

        $where = array(
            'id_donasi' =>  $iduser,
        );
        
        $this->db->where($where);
        $this->db->update('tb_donasi',$user);

        $anggota = array(
            'level' => $level,
        );

        $whereanggota = array(
            'id_anggota' =>  $idanggota,
        );
        
        $this->db->where($whereanggota);
        $this->db->update('tb_anggota',$anggota);
    } 

}