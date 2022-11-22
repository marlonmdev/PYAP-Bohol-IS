<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reasonreportcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('reasonreportmodel', 'rrm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

    function lgu_tabular_reason_for_dropping_report(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $this->load->model('accountmodel', 'acm');
            $id = $this->session->userdata('id');
            $municipal = $this->session->userdata('municipal');
            $mun = $this->rrm->get_municipal_id($municipal);
            $mun_id = $mun->mun_id;
            $data['content'] = $this->rrm->get_lgu_reason_for_dropping_report($mun_id);
            $data['row'] = $this->acm->fetch_account($id);
            $this->load->view('sPartials/header');
            $this->load->view('staff/treports3', $data);
            $this->load->view('sPartials/footer');
        }
    }

    function lgu_graphical_reason_for_dropping_report(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $this->load->model('accountmodel', 'acm');
            $id = $this->session->userdata('id');
            $data['row'] = $this->acm->fetch_account($id);
            $municipal = $this->session->userdata('municipal');
            $mun = $this->rrm->get_municipal_id($municipal);
            $mun_id = $mun->mun_id;
            $data['reason1'] = $this->rrm->count_lgu_drop_reason1($mun_id);
            $data['reason2'] = $this->rrm->count_lgu_drop_reason2($mun_id);
            $data['reason3'] = $this->rrm->count_lgu_drop_reason3($mun_id);
            $data['reason4'] = $this->rrm->count_lgu_drop_reason4($mun_id);
            $data['reason5'] = $this->rrm->count_lgu_drop_reason5($mun_id);
            $this->load->view('sPartials/header');
            $this->load->view('staff/greports5', $data);
            $this->load->view('sPartials/footer');
        }
    }


}