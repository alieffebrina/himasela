<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Level extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Level');
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
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'komunitas';
        $data['activeMenu'] = '7';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '7'
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
            'id_menu' => '7'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   

        $data['level'] = $this->M_Level->getlevel();
        $this->load->view('level/v_level',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'komunitas';
        $data['activeMenu'] = '7';
        $this->load->view('template/sidebar.php', $data);
        $data['level'] = $this->M_Level->getspek($ida);
        $this->load->view('level/v_vlevel',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'komunitas';
        $data['activeMenu'] = '7';
        $this->load->view('template/sidebar.php', $data);
        $data['level'] = $this->M_Level->getspek($ida);
        $this->load->view('level/v_editlevel',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'komunitas';
        $data['activeMenu'] = '7';
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('level/v_addlevel',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if($this->M_Level->cekLevel($this->input->post('level', true))){
            $this->M_Level->tambahdata();
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            redirect('level');
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('level');            
        }
    } 

    function update()
    {   
        $id =  $this->input->post('id');
        $where = array('id_level' => $id );
        $donasi = array('nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('donasi')));
        $wherelevel = array('id_level' => $this->input->post('level'));
        $donasilevel = array('nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('donasi')), 'id_level' => $this->input->post('level'));
        if ( $this->input->post('id') == $this->input->post('level')){
            $this->M_Level->update($where, $donasi);
        } else {
            if($this->M_Level->cekLevel($this->input->post('level', true))){
                $this->M_Level->update($where, $donasilevel);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            } else {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
            }
        }
        redirect('level');  
    }


    function hapus($id)
    {

        $where = array('id_level' => $id);
        $this->M_Setting->delete($where,'tb_level');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('level'); 
    } 
}