<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Donasi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Donasi');
        $this->load->model('M_Level');
        $this->load->model('M_Setting');
        $this->load->model('M_Sejahtera');
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
        $data['upline'] = $this->M_Donasi->getdonasi($iduser);

        $tabel = 'tb_akses';
        $edit = array(
            'tipeuser' => $id,
            'edit' => '1',
            'id_menu' => '1'
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
            'id_menu' => '1'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else{
            $tombolhapus = 'tidak';
        }

        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;   

        $data['donasi'] = $this->M_Donasi->getdonasi();
        $data['donasianggota'] = $this->M_Donasi->getdonasianggota($iduser);
        if($id != 'administrator'){ 
            $this->load->view('donasi/v_donasianggota',$data); 
        } else {
            $this->load->view('donasi/v_donasiadmin',$data); 
        }
        $this->load->view('template/footer');
    }

    function bayar($idgo, $level)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $levelup = $level+1;
        $data['level'] = $this->M_Level->getspek($levelup);
        $data['data'] = $this->M_Donasi->getuserspek($idgo);
        $this->load->view('donasi/v_adddonasi',$data); 
        $this->load->view('template/footer');
    }

     function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $mx = $this->M_Level->selectmax();
        foreach ($mx as $mx) {
            $max = $mx->id_level;
        }

        if ($id == 'anggota'){
            $data['data'] = $this->M_Donasi->getuserupline($iduser, $max);
        } else {
            $data['data'] = $this->M_Donasi->getuser();            
        }
        $data['levelmax'] = $max;
        $this->load->view('donasi/v_adddonasianggota',$data); 
        $this->load->view('template/footer');
    }


    function upgrade()
    {   
        $mx = $this->M_Level->selectmax();
        foreach ($mx as $mx) {
            $max = $mx->id_level;
        }
        // echo $max;
        $lv = $this->input->post('level');
        $upload = $this->M_Donasi->upload();
        if ($upload['result'] == "success" && $lv <= $max){
            $this->M_Donasi->upgrade($upload);
            $this->session->set_flashdata('sukses','<div class="alert alert-warning left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Silahkan tunggu aprove admin.
                                                </div>');

            
            redirect('C_Donasi');  
        }  else {
            'gagal';
        }
    }

    function aprove($iduser,$idanggota,$level)
    {  
        $this->M_Donasi->aprove($iduser,$idanggota,$level);

        //kirim pesan

        $idlevel = $this->db->query("SELECT MAX(id_level) as id_level from tb_level");
        $lev = $idlevel->result();
        foreach ($lev as $lev) {  $levelmax = $lev->id_level; } 

        $downline = $this->M_Setting->getdownline();
        foreach ($downline as $downline) {
          $down = $downline->downline;
        }

        $cariupline = $this->M_Donasi->ceklevel($idanggota);
        foreach ($cariupline as $key) {
            $totalbawah = $this->M_Donasi->anggotabayar($key->id_upline, $key->level);
            if ($totalbawah >= $down){
                $dapatupline = $this->M_Donasi->ceklevel($key->id_upline);
                foreach ($dapatupline as $dapatupline) {
                    $level = $dapatupline->level;
                    $up = $level+1;
                    if($level < $levelmax){
                        $getuserspek = $this->M_Donasi->getuserspek($key->id_upline);
                        foreach ($getuserspek as $getuserspek) {
                            $getspek = $this->M_Level->getspek($level);
                            foreach ($getspek as $getspek) {

                                $cariuplinenya = $this->M_Donasi->ceklevel($dapatupline->id_upline);
                                foreach ($cariuplinenya as $cariuplinenya) {
                                $pesan = 'Silahkan upgrade ke Level '.$up.' dan Donasi ke Upline '.$getuserspek->namaupline.' sebesar Rp '.number_format($getspek->nominal).' No Rek '.$cariuplinenya->norek.' Bank '.$cariuplinenya->bank.' No HP '.$cariuplinenya->tlp;
                                }
                            }
                        }
                    }
                    $nohp = $dapatupline->tlp;
                }
            } else {
                echo 'belum';
            }
            if ($key->level == $levelmax) {
                $sejahtera = $this->M_Sejahtera->cekuser($idanggota);
                if($sejahtera == NULL){
                    $pesan = "Selamat Anda telah dilevel Dana Kesejahteraan silahkan transfer ke Admin No Rekening...... Konfirmasi Hp No 081615879352 (admin)";

                    $nohp = $key->tlp;
                }
            }
           
        }

        



        // echo $nohp.$pesan.$level.$down;
        $a = '+'.$nohp;
        $no = str_split($a, 3);
        $n = $no[0];

        $ganti = str_replace($n,"628",$a);
        // echo $ganti;

            $demokey='5fa0891178423f215b2b5c082522b61d617adab5e8a2969b'; //this is demo key please change with your own key
            $url='http://116.203.92.59/api/send_message';
            $data = array(
              "phone_no"=> $ganti,
              "key"     =>$demokey,
              "message" => $pesan
            );
            $data_string = json_encode($data);
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 360);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
            );
            echo $res=curl_exec($ch);
            curl_close($ch);

            $this->session->set_flashdata('Sukses', "Pembayaran berhasil di aprove!!!!");
            redirect('C_Donasi'); //data calon anggota

        }

    function cancel($iduser,$idanggota,$level)
    {  
        $this->M_Donasi->cancel($iduser,$idanggota,$level);
        $this->session->set_flashdata('Sukses', "Donasi berhasil di Cancel!!!!");
            redirect('C_Donasi'); //data calon anggota
    }

    function getuserspek(){
        $id = $this->input->post('idanggota');
        $data = $this->M_Donasi->getuserspek($id);
        foreach($data as $data){
            $levelup = $data->level+1;
            $getlevel = $this->M_Level->getspek($levelup);
            foreach ($getlevel as $key) {
             $nominal = "<input type='text' name='nominal' value='".$key->nominal."' readonly class='form-control'> ";
            }
          $level = "<input type='text' name='level' value='".$levelup."' readonly class='form-control'> ";
          $upline =  "<input type='hidden' name='upline' value='".$data->id_upline."' class='form-control'>".$data->namaupline;
        }
        
        $callback = array('level'=>$level, 'upline' => $upline, 'nominal'=>$nominal); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

     function transaksi()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['data'] = $this->M_Donasi->gethistory($iduser);
        $this->load->view('donasi/v_history',$data); 
        $this->load->view('template/footer');
    }

    function teswa()
    {
        $key='5fa0891178423f215b2b5c082522b61d617adab5e8a2969b'; //this is demo key please change with your own key
        $url='http://116.203.92.59/api/send_message';
        $data = array(
          "phone_no"=> '6283857913752',
          "key"     =>$key,
          "message" =>'DEMO AKUN WOOWA. tes woowa api v3.0 mohon di abaikan'
        );
        $data_string = json_encode($data);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 360);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
        );
        echo $res=curl_exec($ch);
        curl_close($ch);
          redirect('C_Donasi');
    }

}
