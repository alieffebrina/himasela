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
        $data['ida'] = $iduser;
        $data['length'] = $this->M_Struktur->getlenght();
        echo '
              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Struktur Himasela
                    <small></small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="'.site_url('Welcome').'"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="'.site_url('Welcome').'">Struktur Himasela</a></li>
                    <li class="active">Struktur Himasela</li>
                  </ol>
                </section>
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Struktur Himasela</h3>
                        </div>';
                echo "<div class='box-body table-responsive'>";
                $data['child'] = $this->getChild($iduser);  
                echo "            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
";

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

    public function setCategoryTree()
    {
        // $this->load->model("Category_Model");

        $arrViewData = array(
            "objTree" => $this->M_Struktur->getCategoryTreeData()
        );

        $this->load->view("v_struktur",$arrViewData);
    }
    
}
