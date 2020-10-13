<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Berita extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Berita');
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
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '9'
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
            'id_menu' => '9'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $add = array(
            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '9'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasiladd)!=0){ 
            $tomboltambah = 'aktif';
        } else{
            $tomboltambah = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['berita'] = $this->M_Berita->getBerita();
        $this->load->view('berita/v_berita',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['berita'] = $this->M_Berita->getspek($ida);
        $this->load->view('berita/v_vberita',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['berita'] = $this->M_Berita->getspek($ida);
        $this->load->view('berita/v_eberita',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('berita/v_addberita',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $this->M_Berita->tambahdata();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berita Berhasil di Tambah.
                                                </div>');
        redirect('berita');
    } 

    function update()
    {   
        $this->M_Berita->update();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Sukses!</strong> Berita berhasil dirubah.
                                            </div>');
        redirect('berita');  
    }


    function hapus($id)
    {

        $where = array('id_berita' => $id);
        $this->M_Setting->delete($where,'tb_berita');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berita Berhasil di Hapus.
                                                </div>');
            redirect('berita'); 
    } 
}