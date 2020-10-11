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
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['total'] = $this->M_Struktur->gettotal();
        $data['user'] = $this->M_Struktur->getuser();
        $data['length'] = $this->M_Struktur->getlenght();
        $data['child'] = $this->getChild($iduser);
        $this->load->view('struktur/v_struktur',$data);    
        $this->load->view('template/footer');
    }

    function getChild($id){
        $where = array('id_upline' => $id);
        $child = $this->db->get_where('tb_anggota', $where);
        if($child->num_rows() > 0){
            foreach ($child->result() as $ch) {
                $this->getChild($ch->id_anggota);
            }
        }
    }

    public function setCategoryTree()
    {
        // $this->load->model("Category_Model");

        $arrViewData = array(
            "objTree" => $this->M_Struktur->getCategoryTreeData()
        );

        $this->load->view("v_struktur",$arrViewData);
    }
}
