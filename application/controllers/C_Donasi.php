<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Donasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Donasi');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        // $totalupline = $this->M_Donasi->getuserupline($nourut);
        // if(count($totalupline) > 5){
            
        //     $data['upline'] = $this->M_Donasi->getuserupline($nourut);
        // }
        //     $data['upline'] = $this->M_Donasi->getuserupline($nourut); else {
        // }

        
            $data['upline'] = $this->M_Donasi->getuserupline($nourut);

        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '1'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   

        $data['donasi'] = $this->M_Donasi->getdonasi();
        if($id != 'administrator'){ 
            $this->load->view('donasi/v_donasi',$data); 
        } else {
            $this->load->view('donasi/v_donasiadmin',$data); 
        }
        $this->load->view('template/footer');
    }

    function bayar($idgo, $level)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
       
        $totalupline = $this->M_Donasi->getuserupline($nourut);
        if(count($totalupline) > 5){
            
            $data['upline'] = $this->M_Donasi->getuserupline($nourut);
        }

        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '1'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }
        $data['idgo'] = $idgo;
        $data['level'] = $level;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $this->load->view('donasi/v_adddonasi',$data); 
        $this->load->view('template/footer');
    }

    function upgrade()
    {   
        $anggota = $this->input->post('id');
        $level = $this->input->post('level');
        $upload = $this->M_Donasi->upload();
        if ($upload['result'] == "success"){
            $this->M_Donasi->upgrade($upload, $level, $anggota);
            $this->session->set_flashdata('Sukses', "Data Berhasil Di Simpan!!");
            redirect('C_Donasi');  
        } else {
            'gagal';
        }
    }

    function aprove($iduser,$idanggota,$level)
    {  
        $this->M_Donasi->aprove($iduser,$idanggota,$level);
        $this->session->set_flashdata('Sukses', "Pembayaran berhasil di aprove!!!!");
            redirect('C_Donasi'); //data calon anggota
    }
}
