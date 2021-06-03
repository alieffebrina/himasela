<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Sejahtera extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Sejahtera');
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
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
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
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);
        $detail = array('id_sejahtera' => $ida );
        $data['anggota'] = $this->M_Sejahtera->getanggota($detail);
        $data['sejahtera'] = $this->M_Sejahtera->getspek($ida);
        $this->load->view('sejahtera/v_vsejahtera',$data); 
        $this->load->view('template/footer');
    }

    function edit($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);
        $detail = array('id_sejahtera' => $ida );
        $data['anggota'] = $this->M_Sejahtera->getanggota($detail);
        $data['sejahtera'] = $this->M_Sejahtera->getspek($ida);
        $this->load->view('sejahtera/v_editsejahtera',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('sejahtera/v_addsejahtera',$data); 
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

        $where = array('id_sejahtera' => $id);
        $this->M_Setting->delete($where,'tb_sejahtera');
        $detail = array('id_sejahtera' => $id);
        $this->M_Setting->delete($detail,'tb_detailsejahtera');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
            redirect('sejahtera'); 
    } 

    function tambahanggota()
    {
        $ang = $this->input->post('ang');
        $sejahtera = $this->input->post('idsejahtera');
        $dk = $this->M_Sejahtera->getdk($sejahtera, $ang);
        $getdetaildk = $this->M_Sejahtera->getdetaildk($sejahtera, $ang);
        if ($dk == NULL){
            $a = $this->input->post('idanggota');
            $jml = 1;

            // $this->M_Sejahtera->tambahleveldk($a, $jml);
        } else {
            // if($getdetaildk == NULL){
            //     echo "null";
            // } else {
            //     echo "ok";
            // }
            foreach ($getdetaildk as $key) {
                $detail = $key->id_detailsejahtera;
                echo $detail;
                $where = array('id_detailsejahtera' => $detail );
                $ddk = $this->M_Setting->cekakses('tb_detailsejahtera',$where);
                foreach ($ddk as $ddk) {
                    $a = $ddk->id_anggota;
                    $jml = $ddk->jumlahanggota+1;
                    echo $a.$jml;
                }
            }

            echo $detail;

            $this->M_Sejahtera->updateleveldk($detail, $jml);
        }
        $this->M_Sejahtera->tambahanggota($a, $jml);
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Tambah.
                                                </div>');
        redirect('sejahtera-anggota/'.$sejahtera);
    } 

    function anggota($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);

        $detail = array('id_sejahtera' => $ida );
        $data['cekanggota'] = $this->M_Sejahtera->cekanggota($ida);
        $data['anggota'] = $this->M_Sejahtera->getanggota($detail);
        $data['sejahtera'] = $this->M_Sejahtera->getspek($ida);
        // if ($dk == NULL){
        //     $data['dk'] = 'null';
        // } else {
        //     $data['dk'] = $this->M_Sejahtera->getdk($ida, $ang);
        // }
        $data['user'] = $this->M_User->getall();
        $this->load->view('sejahtera/v_anggotasejahtera',$data); 
        $this->load->view('template/footer');
    }

    function editanggota($ida, $sejahtera)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);
        $sek = array('id_sejahtera' => $sejahtera );
        $detail = array('id_detailsejahtera' => $ida );
        $data['sejahtera'] = $this->M_Sejahtera->getspek($sejahtera);
        $data['anggota'] = $this->M_Sejahtera->getanggota($sek);
        $data['user'] = $this->M_User->getall();
        $data['usersejahtera'] = $this->M_Sejahtera->getanggota($detail);
        $this->load->view('sejahtera/v_anggotaedit',$data); 
        $this->load->view('template/footer');
    }

      function updateanggota()
    {   
        $sejahtera = $this->input->post('idsejahtera');
        $this->M_Sejahtera->updateanggota();
        $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Sukses!</strong> Data Berhasil di Tambah.
                                            </div>');
        redirect('sejahtera-anggota/'.$sejahtera);
    }

    function hapusanggota($id, $sejahtera)
    {

        $as = array('id_detailsejahtera' => $id );
        $ddk = $this->M_Setting->cekakses('tb_detailsejahtera',$as);
        foreach ($ddk as $ddk) {
            $a = $ddk->id_up;

            $bs = array('id_anggota' => $a );
            $bbs = $this->M_Setting->cekakses('tb_detailsejahtera',$bs);
            foreach ($bbs as $bbs) {
                $idd = $bbs->id_detailsejahtera;
                $jml = $bbs->jumlahanggota-1;
            $this->M_Sejahtera->updateleveldk($idd, $jml);
            }

        }
        $where = array('id_detailsejahtera' => $id);
        $this->M_Setting->delete($where,'tb_detailsejahtera');
        $this->session->set_flashdata('sukses', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Data Berhasil di Hapus.
                                                </div>');
        redirect('sejahtera-anggota/'.$sejahtera);
    } 

    function history()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
        $this->load->view('template/sidebar.php', $data);

        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '12'
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
            'id_menu' => '12'
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
            'id_menu' => '12'
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
        if($id == 'administrator'){
            $data['data'] = $this->M_Sejahtera->getdetail();
        } else {
            $data['data'] = $this->M_Sejahtera->gethistory($iduser);
        }
        $this->load->view('sejahtera/v_history',$data); 
        $this->load->view('template/footer');
    }
}