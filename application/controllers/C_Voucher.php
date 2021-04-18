<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Voucher extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Voucher');
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
            'id_menu' => '14'
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
            'id_menu' => '14'
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
            'id_menu' => '14'
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

        $data['voucher'] = $this->db->get('tb_voucher')->result();   
        $this->load->view('voucher/v_order',$data); 
        $this->load->view('template/footer');
    }

    public function order(){
        $this->M_Voucher->tambahdata();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Voucher Dapat Digunakan.
                                                </div>');
        redirect('voucher');
    }

    function hapus($id)
    {

        $where = array('id_voucher' => $id);
        $this->M_Setting->delete($where,'tb_voucher');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Voucher Berhasil di Hapus.
                                                </div>');
            redirect('voucher'); 
    } 

}
