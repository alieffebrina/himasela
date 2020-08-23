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
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->getuser();
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

    // function cek_upline(){
    //     $tabel = 'tb_anggota';
    //     $cek = 'id_upline';
    //     $kode = $this->input->post('upline');
    //     $hasil_kode = $this->M_Setting->cek($cek,$kode,$tabel);
    //     if ($cek == '1'){ $max = 2} else { $max = 3} 
    //     if(count($hasil_kode)>$max){ 
    //         $callback = array(' '= 'Downline anda penuh'); 
    //     }         
    // }

    public function tambah()
    {   
        $upload = $this->M_User->upload();
        if ($upload['result'] == "success"){
            $this->M_User->tambahdata($upload);
            $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
            redirect('C_User');  
        }
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
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

    function hapus($id){
        $where = array('id_anggota' => $id);
        $this->M_Setting->delete($where,'tb_anggota');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_User');
    }

    function konfirm($iduser)
    {   
        $id = $this->session->userdata('statusanggota');
        $data = $this->M_User->getnama($iduser);
        foreach ($data as $data) {
            $bayar = $data->statusbayar;
            $anggota = $data->statusanggota;
            $username = $data->nik;
        }
        $this->M_User->konfirm($iduser,$bayar,$anggota,$id,$username);
        echo "<script>alert('Transaksi Sukses.Data Sudah ada dalam Laporan');window.location='C_User'</script>";
        redirect('C_User');
    }

}