<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Barang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Barang');
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
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '17';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '17'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '17'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '17'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['barang'] = $this->M_Barang->getbarang(); 
        $this->load->view('barang/v_barang',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '17';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '17'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '17'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '17'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['katbarang'] = $this->db->get('tb_kategoribarang')->result(); 
        $this->load->view('barang/v_addbarang',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '17';
        $this->load->view('template/sidebar.php', $data);
                $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '17'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $tambah = array(
            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '17'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '17'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['barang'] = $this->M_Barang->getspek($ida); 
        $data['katbarang'] = $this->db->get('tb_kategoribarang')->result(); 
        $this->load->view('barang/v_editbarang',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if($this->M_Barang->cekbarang($this->input->post('barang', true))){
            $this->M_Barang->tambahdata();
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('barang');            
        }
    } 

    function update()
    {   
        if($this->input->post('hargabeliawal') != $this->input->post('hargabeli') || $this->input->post('hargajualawal') != $this->input->post('hargajual') ){
            $this->M_Barang->tambahhistoryharga();
        }
        
        $this->M_Barang->update();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Sukses!</strong> Data Berhasil di Rubah.
                                            </div>');
        redirect('barang');  
    }


    function hapus($id)
    {

        $where = array('id_barang' => $id);
        $this->M_Setting->delete($where,'tb_barang');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('barang'); 
    } 

    function historyharga()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '18';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '18'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '18'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '18'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['history'] = $this->M_Barang->gethistoryharga(); 
        $this->load->view('barang/v_historyharga',$data); 
        $this->load->view('template/footer');
    }

    function hapushistory($id)
    {

        $where = array('id_historybarang' => $id);
        $this->M_Setting->delete($where,'tb_historybarang');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('historyharga'); 
    } 

    function stok()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '19';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '19'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '19'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '19'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['stok'] = $this->M_Barang->getbarang(); 
        $this->load->view('stok/v_stok',$data); 
        $this->load->view('template/footer');
    }

    function stokview($idbarang)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '19';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '19'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '19'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '19'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['barang'] = $this->M_Barang->getspek($idbarang); 
        $data['stok'] = $this->M_Barang->getviewstok($idbarang); 
        $this->load->view('stok/v_stokview',$data); 
        $this->load->view('template/footer');
    }

    function stokopname($idbarang)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '19';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '19'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }
        $tambah = array(

            'tipeuser' => $id,
            'add' => '1',
            'id_menu' => '19'
        );
        $hasiltambah = $this->M_Setting->cekakses($tabel, $tambah);
        if(count($hasiltambah)!=0){ 
            $tomboltambah = 'aktif';
        } else {
            $tomboltambah = 'tidak';
        }

        $hapus = array(
            'tipeuser' => $id,
            'delete' => '1',
            'id_menu' => '19'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   
        $data['aksesadd'] = $tomboltambah;   

        $data['barang'] = $this->M_Barang->getspek($idbarang); 
        $data['stok'] = $this->M_Barang->getviewstok($idbarang); 
        $this->load->view('stok/stokopname',$data); 
        $this->load->view('template/footer');
    }

    function updatestok()
    {   
        $this->M_Barang->updatestok();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Sukses!</strong> Data Berhasil di Rubah.
                                            </div>');
        redirect('stok');  
    }

}