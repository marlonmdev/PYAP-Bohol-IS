<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interestreportcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('interestreportmodel', 'irm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

    function lgu_tabular_interest_hobbies_report(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $this->load->model('accountmodel', 'acm');
            $id = $this->session->userdata('id');
            $municipal = $this->session->userdata('municipal');
            $mun = $this->irm->get_municipal_id($municipal);
            $mun_id = $mun->mun_id;
            $data['content'] = $this->irm->get_lgu_interest_hobbies_report($mun_id);
            $data['row'] = $this->acm->fetch_account($id);
            $this->load->view('sPartials/header');
            $this->load->view('staff/treports4', $data);
            $this->load->view('sPartials/footer');
        }
    }

    function lgu_graphical_interest_hobbies_report(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $this->load->model('accountmodel', 'acm');
            $id = $this->session->userdata('id');
            $data['row'] = $this->acm->fetch_account($id);
            $municipal = $this->session->userdata('municipal');
            $mun = $this->irm->get_municipal_id($municipal);
            $mun_id = $mun->mun_id;
            $data['interest1'] = $this->irm->count_lgu_graphical_interest1($mun_id);
            $data['interest2'] = $this->irm->count_lgu_graphical_interest2($mun_id);
            $data['interest3'] = $this->irm->count_lgu_graphical_interest3($mun_id);
            $data['interest4'] = $this->irm->count_lgu_graphical_interest4($mun_id);
            $data['interest5'] = $this->irm->count_lgu_graphical_interest5($mun_id);
            $data['interest6'] = $this->irm->count_lgu_graphical_interest6($mun_id);
            $data['interest7'] = $this->irm->count_lgu_graphical_interest7($mun_id);
            $this->load->view('sPartials/header');
            $this->load->view('staff/greports6', $data);
            $this->load->view('sPartials/footer');
        }
    }


}