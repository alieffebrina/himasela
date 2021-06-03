<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        $this->load->model('M_Berita');
        $this->load->model('M_User');
        $this->load->model('M_Donasi');
        $this->load->model('M_Level');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

	public function index()
	{
		$this->load->view('template/header.php');
		$id = $this->session->userdata('statusanggota');
        $nourut = $this->session->userdata('nourut');
        $user = $this->session->userdata('id_user');
        $data['menukom'] = $this->M_Setting->getmenukom($id);
        $data['menupos'] = $this->M_Setting->getmenupos($id);
		$this->load->view('template/sidebar.php', $data);
		if($id=='administrator'){
			$data['anggota'] = $this->M_User->totalanggota();
			$data['konfirmupline'] = $this->M_User->waitupline();		
			$data['konfirmadmin'] = $this->M_User->waitadmin();		
			$data['sdhbayar'] = $this->M_User->sdhbayar();
			$data['info'] = 0;
        	$data['listanggota'] = $this->M_User->getall();
		} else {
			$data['anggota'] = $this->M_User->totalanggotadwonline($user);
			$data['konfirmupline'] = $this->M_User->waituplinedwonline($user);		
			$data['konfirmadmin'] = $this->M_User->waitadmindwonline($user);		
			$data['sdhbayar'] = $this->M_User->sdhbayardwonline($user);
			$ceklevel = $this->M_Donasi->ceklevel($user);
			foreach ($ceklevel as $key) {
				$hasilcel = $key->level;
			}
			$data['info'] = $this->M_Donasi->anggotabayar($user, $hasilcel);
        	$data['listanggota'] = $this->M_User->getallspek($user);
		}
		
        $data['admin'] = $this->M_User->getspekadmin();
       	$data['level'] = $this->M_Level->selectmax();
        $data['downline'] = $this->M_Setting->getdownline();
        $data['berita'] = $this->M_Berita->getBerita();
		$this->load->view('template/index.php', $data);
		$this->load->view('template/footer.php');
	}
}
