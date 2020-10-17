<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Profil extends CI_Controller{
    
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

        $data['provinsi'] = $this->M_Setting->getprovinsi();
        if($id == 'administrator'){
            $data['user'] = $this->M_User->getspekadmin($iduser); 
        } else {
            $data['user'] = $this->M_User->getspek($iduser); 
        }

        $this->load->view('profil/v_profil',$data); 
        $this->load->view('template/footer');
    }

    function edit()
    {   
        $this->M_User->username();
        $this->session->set_flashdata('Sukses', "Data Berhasil Di Rubah!!");
        redirect('profil');
    }
}