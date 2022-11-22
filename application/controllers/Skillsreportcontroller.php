<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillsreportcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('skillsreportmodel', 'skrm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function lgu_tabular_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->skrm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['content'] = $this->skrm->get_lgu_tabular_skills_report($mun_id);
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/treports2', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function lgu_graphical_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$municipal = $this->session->userdata('municipal');
			$mun = $this->skrm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['skill1'] = $this->skrm->count_lgu_skill1($mun_id);
			$data['skill2'] = $this->skrm->count_lgu_skill2($mun_id);
			$data['skill3'] = $this->skrm->count_lgu_skill3($mun_id);
			$data['skill4'] = $this->skrm->count_lgu_skill4($mun_id);
			$data['skill5'] = $this->skrm->count_lgu_skill5($mun_id);
			$data['skill6'] = $this->skrm->count_lgu_skill6($mun_id);
			$data['skill7'] = $this->skrm->count_lgu_skill7($mun_id);
			$data['skill8'] = $this->skrm->count_lgu_skill8($mun_id);
			$data['skill9'] = $this->skrm->count_lgu_skill9($mun_id);
			$data['skill10'] = $this->skrm->count_lgu_skill10($mun_id);
			$data['skill11'] = $this->skrm->count_lgu_skill11($mun_id);
			$data['skill12'] = $this->skrm->count_lgu_skill12($mun_id);
			$data['skill13'] = $this->skrm->count_lgu_skill13($mun_id);
			$data['skill14'] = $this->skrm->count_lgu_skill14($mun_id);
			$data['skill15'] = $this->skrm->count_lgu_skill15($mun_id);
			$data['skill16'] = $this->skrm->count_lgu_skill16($mun_id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/greports4', $data);
			$this->load->view('sPartials/footer');
		}
	}


}