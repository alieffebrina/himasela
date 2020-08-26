<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
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
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if ($id == 'anggota'){
            $data['user'] = $this->M_User->getuserspek($iduser);
        } else {
            $data['user'] = $this->M_User->getuser();            
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
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['header'] = 'Calon Anggota';
        $this->load->view('user/v_user',$data); 
        $this->load->view('user/v_modal',$data); 
        $this->load->view('template/footer');
    }

    function all()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if ($id == 'anggota'){
            $data['user'] = $this->M_User->getallspek($iduser);
        } else {
            $data['user'] = $this->M_User->getall();            
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
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['header'] = 'Anggota';
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['user'] = $this->M_User->getuserall();
        $this->load->view('user/v_adduser', $data); 
        $this->load->view('template/footer');
    }

     function cek_nik(){
        $tabel = 'tb_anggota';
        $cek = 'nik';
        $kode = $this->input->post('nik');
        $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
        if(count($hasil_kode)!=0){ 
            echo '1';
        }else{
            echo '2';
        }
         
    }
    
    public function tambah()
    {   
        $kalimat = $this->input->post('upline');
        $data = explode("/" , $kalimat);
        $upline =  $data[0];
        $tabel = 'tb_anggota';
        $cek = 'id_upline';
        $hasil_kode = $this->M_Setting->cek($cek,$upline,$tabel);
        $hitung = count($hasil_kode);
        if(count($hasil_kode) == 0){
            $nourut = 1;
        } else {
            $nourut = $hitung+1;
        }
        $no = $data[1].' '.+$nourut.' ';
        $nourut = str_replace(' ', '', $no);
        // $upload = $this->M_User->upload();
        // if ($upload['result'] == "success"){
            $this->M_User->tambahdata($nourut, $upline);
            $this->session->set_flashdata('Sukses', "Data Berhasil Di Simpan!!");
            redirect('C_User');  
        // }
    }

    function tambahtf()
    {   
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->konfirmadmin($upload);
            $this->session->set_flashdata('Sukses', "Data Berhasil Di Simpan!!");
            redirect('C_User/all');  
        }
    }

    function ttf($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if ($id == 'upline' || $id == 'downline'){
            $data['user'] = $this->M_User->getuserspek($iduser);
        } else {
            $data['user'] = $this->M_User->getuser();            
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
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        }
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['header'] = 'Calon Anggota';
        $data['upload'] = $this->M_User->getspek($ida);
        $this->load->view('user/v_upload',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getspek($ida);
        $this->load->view('user/v_vuser',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['user'] = $this->M_User->getspek($iduser);
        $this->load->view('user/v_euser',$data); 
        $this->load->view('template/footer');
    }

    function edituser()
    {   
        $this->M_User->edit();
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Rubah!!");
        if($this->input->post('statusanggota') == 'menunggu konfirmasi admin' || $this->input->post('statusanggota') == 'menunggu konfirmasi upline' ){
            redirect('C_User');
        } else {
            redirect('C_User/all');
        }
    }

    function hapus($id){
        $this->M_User->hapus($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Hapus!!!!");
        redirect('C_User/all');
    }

    function konfirm($iduser)
    {   
        $id = $this->session->userdata('statusanggota');
        $data = $this->M_User->getnama($iduser);
        foreach ($data as $data) {
            $bayar = $data->statusbayar;
            $anggota = $data->statusanggota;
            $username = $data->nik;
            $foto = $data->buktitransfer;
        }
        $this->M_User->konfirm($iduser,$bayar,$anggota,$id,$username);
        $this->session->set_flashdata('Sukses', "Data berhasil di konfirmasi!!!!");

        if($anggota == 'menunggu konfirmasi admin' || $anggota == 'menunggu konfirmasi upline' ){
            redirect('C_User'); //data calon anggota
        } else {
            redirect('C_User/all'); //data anggota
        }
    }

    function laporan()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        if ($id == 'upline' || $id == 'downline'){
            $data['user'] = $this->M_User->getallspek($iduser);
        } else {
            $data['user'] = $this->M_User->getall();            
        }
        $data['header'] = 'Anggota';
        $this->load->view('user/v_laporanuser',$data); 
        $this->load->view('template/footer');
    }

    public function excel()
    {   
        $id = $this->session->userdata('statusanggota');
        if ($id == 'upline' || $id == 'downline'){
            $user = $this->M_User->getallspek($iduser);
        } else {
            $user = $this->M_User->getall();            
        }
        $data = array('title' => 'Laporan Anggota',
                'excel' => $user);
        $this->load->view('user/v_exceluser', $data);
    }

}