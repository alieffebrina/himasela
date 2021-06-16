<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Struktur extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Struktur');
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
        $data1['menukom'] = $this->M_Setting->getmenukom($id);
        $data1['menupos'] = $this->M_Setting->getmenupos($id);
        $data1['menujenis'] = 'komunitas';
        $data1['activeMenu'] = '10';
        $this->load->view('template/sidebar.php', $data1);
        $data['total'] = $this->M_Struktur->gettotal();
        $data['user'] = $this->M_Struktur->getuser();
        $data['ida'] = $iduser;
        $data['length'] = $this->M_Struktur->getlenght();
        $data['downline'] = $this->M_Struktur->getdownline();
        $data['parent'] = $this->M_Struktur->getAdmin($iduser);
        $data['child'] = $this->M_Struktur->getAnak($iduser);
        $this->load->view('struktur/v_newstruktur.php', $data);
        $this->load->view('template/footer.php', $data);

    }

    function strukturd($idang)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $nourut = $this->session->userdata('nourut');
        $data1['menukom'] = $this->M_Setting->getmenukom($id);
        $data1['menupos'] = $this->M_Setting->getmenupos($id);
        $data1['menujenis'] = 'komunitas';
        $data1['activeMenu'] = '10';
        $this->load->view('template/sidebar.php', $data1);
        $data['total'] = $this->M_Struktur->gettotal();
        $data['user'] = $this->M_Struktur->getuser();
        $data['ida'] = $iduser;
        $data['length'] = $this->M_Struktur->getlenght();
        $data['downline'] = $this->M_Struktur->getdownline();
        $data['parent'] = $this->M_Struktur->getAdmin($idang);
        $data['child'] = $this->M_Struktur->getAnak($idang);
        $this->load->view('struktur/v_newstruktur.php', $data);
        $this->load->view('template/footer.php', $data);

    }

    function getAnak($ida){
        $data['child'] = $this->M_Struktur->getAnak($ida);
    }

    function getChild($ida){
        // $this->load->view('template/header');
        // $id = $this->session->userdata('statusanggota');
        // $iduser = $this->session->userdata('id_user');
        // $nourut = $this->session->userdata('nourut');
        // $data['menu'] = $this->M_Setting->getmenu1($id);
        // $this->load->view('template/sidebar.php', $data);
        // $this->load->view('struktur/v_struktur',$data);  

        $where = array('id_upline' => $ida);
        $child = $this->db->get_where('tb_anggota', $where);
        echo "<ul class='clearfix'>";
        if($child->num_rows() > 0){
            foreach ($child->result() as $ch) {
                echo "<li>".$ch->id_anggota."-".$ch->nourut; 
                $this->getChild($ch->id_anggota);
            }
        } 
        echo "</ul>";


        // $this->load->view('struktur/v_bawahstruktur');  
        // $this->load->view('template/footer');
    }

}
