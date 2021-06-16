<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_kategoribarang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Kategoribarang');
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
        $data['activeMenu'] = '15';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '15'
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
            'id_menu' => '15'
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
            'id_menu' => '15'
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

        $data['kategoribarang'] = $this->db->get('tb_kategoribarang')->result(); 
        $this->load->view('kategoribarang/v_kategoribarang',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '15';
        $this->load->view('template/sidebar.php', $data);
                $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '15'
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
            'id_menu' => '15'
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
            'id_menu' => '15'
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

        $data['kat'] = $this->db->get_where('tb_kategoribarang', ['id_kategoribarang' => $ida])->result();
        $data['kategoribarang'] = $this->db->get('tb_kategoribarang')->result(); 
        $this->load->view('kategoribarang/v_editkategori',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if($this->M_Kategoribarang->cekkategoribarang($this->input->post('kategoribarang', true))){
            $this->M_Kategoribarang->tambahdata();
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('kategori');            
        }
    } 

    function update()
    {   
        $id =  $this->input->post('id');
        $where = array('id_kategoribarang' => $id );
        $wherekategoribarang = array('kategoribarang' => $this->input->post('kategoribarang'));
        
            if($this->M_Kategoribarang->cekkategoribarang($this->input->post('kategoribarang', true))){
                $this->M_Kategoribarang->update($where, $wherekategoribarang);
                $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            } else {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
            }
        
        redirect('kategori');  
    }


    function hapus($id)
    {

        $where = array('id_kategoribarang' => $id);
        $this->M_Setting->delete($where,'tb_kategoribarang');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('kategori'); 
    } 
}