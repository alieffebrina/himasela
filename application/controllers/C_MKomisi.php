<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_MKomisi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Komisi');
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
        $data['activeMenu'] = '16';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '16'
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
            'id_menu' => '16'
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
            'id_menu' => '16'
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

        $data['komisi'] = $this->db->get('tb_masterkomisi')->result(); 
        $this->load->view('komisi/v_mkomisi',$data); 
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
        $data['activeMenu'] = '16';
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '16'
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
            'id_menu' => '16'
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
            'id_menu' => '16'
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

        $data['komisi'] = $this->db->get('tb_masterkomisi')->result(); 
        $this->load->view('komisi/v_addmkomisi',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $data['menujenis'] = 'pos';
        $data['activeMenu'] = '16';
        $this->load->view('template/sidebar.php', $data);
                $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '16'
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
            'id_menu' => '16'
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
            'id_menu' => '16'
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

        $data['kat'] = $this->db->get_where('tb_masterkomisi', ['id_masterkomisi' => $ida])->result();
        $data['komisi'] = $this->db->get('tb_masterkomisi')->result(); 
        $this->load->view('komisi/v_editmkomisi',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if($this->M_Komisi->cekmkomisi($this->input->post('level', true))){
            $this->M_Komisi->tambahdata();
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                    </div>');
            redirect('masterkomisi');
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('masterkomisi');            
        }
    } 

    function update()
    {   
        $this->M_Komisi->update();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Sukses!</strong> Data Berhasil di Rubah.
                                            </div>');
        redirect('masterkomisi');  
    }


    function hapus($id)
    {

        $where = array('id_masterkomisi' => $id);
        $this->M_Setting->delete($where,'tb_masterkomisi');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('masterkomisi'); 
    } 
}