<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Sejahtera extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Sejahtera');
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
            'id_menu' => '11'
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
            'id_menu' => '11'
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
            'id_menu' => '11'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else{
            $tomboladd = 'tidak';
        }

        $data['aksesadd'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   

        $data['income'] = $this->M_Sejahtera->getsejahtera();
        $this->load->view('sejahtera/v_sejahtera',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['sejahtera'] = $this->M_Sejahtera->getspek($ida);
        $this->load->view('sejahtera/v_vsejahtera',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['sejahtera'] = $this->M_Sejahtera->getspek($ida);
        $this->load->view('sejahtera/v_editSejahtera',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('sejahtera/v_addSejahtera',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if($this->M_Sejahtera->cekSejahtera($this->input->post('level', true))){
            $this->M_Sejahtera->tambahdata();
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            redirect('sejahtera');
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('sejahtera');            
        }
    } 

    function update()
    {   
        $id =  $this->input->post('id');
        $where = array('id_Sejahtera' => $id );
        $donasi = array('nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('donasi')));
        $whereSejahtera = array('id_Sejahtera' => $this->input->post('level'));
        $donasiSejahtera = array('nominal' => preg_replace('/([^0-9]+)/','',$this->input->post('donasi')), 'id_Sejahtera' => $this->input->post('Sejahtera'));
        if ( $this->input->post('id') == $this->input->post('level')){
            $this->M_Sejahtera->update($where, $donasi);
        } else {
            if($this->M_Sejahtera->cekSejahtera($this->input->post('Sejahtera', true))){
                $this->M_Sejahtera->update($where, $donasiSejahtera);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            } else {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
            }
        }
        redirect('sejahtera');  
    }


    function hapus($id)
    {

        $where = array('id_Sejahtera' => $id);
        $this->M_Setting->delete($where,'tb_Sejahtera');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('sejahtera'); 
    } 
}