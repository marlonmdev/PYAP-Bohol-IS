<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('staffmodel', 'stm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function index(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($id);
			$municipal = $this->session->userdata('municipal');
			$data['members'] = $this->stm->count_all_members($municipal);
			$all = $this->stm->count_all_members($municipal);
			$male = $this->stm->count_all_male($municipal);
			$female = $this->stm->count_all_female($municipal);
			$osy = $this->stm->count_all_OSY($municipal);
			$isy = $this->stm->count_all_ISY($municipal);
			$data['male'] = $male;
			$data['female'] = $female;
			$data['male_percentage'] = round(($male/$all)*100);
			$data['female_percentage'] = round(($female/$all)*100);
			$data['osy_percentage'] = round(($osy/$all)*100);
			$data['isy_percentage'] = round(($isy/$all)*100);
			$data['activities'] = $this->stm->count_all_activities($municipal);
			$this->load->view('sPartials/header');
			$this->load->view('staff/index', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function home(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($id);
			$municipal = $this->session->userdata('municipal');
			$data['members'] = $this->stm->count_all_members($municipal);
			$all = $this->stm->count_all_members($municipal);
			$male = $this->stm->count_all_male($municipal);
			$female = $this->stm->count_all_female($municipal);
			$osy = $this->stm->count_all_OSY($municipal);
			$isy = $this->stm->count_all_ISY($municipal);
			$data['male'] = $male;
			$data['female'] = $female;
			$data['male_percentage'] = round(($male/$all)*100);
			$data['female_percentage'] = round(($female/$all)*100);
			$data['osy_percentage'] = round(($osy/$all)*100);
			$data['isy_percentage'] = round(($isy/$all)*100);
			$data['activities'] = $this->stm->count_all_activities($municipal);
			$this->load->view('sPartials/header');
			$this->load->view('staff/home', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function members(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->library('pagination');
			$config['base_url'] = base_url().'lgu/members';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			//pagination style
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['prev_link'] = '<span class="ti-angle-left"></span>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span class="ti-angle-right"></span>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$page = $this->uri->segment(3, 0);	
			$this->load->model('membermodel', 'mm');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->mm->get_municipal($municipal);
			$mun_id = $mun->mun_id;
			$data['brgys'] = $this->mm->get_barangays($mun_id, $config['per_page'], $page);
			$config['total_rows'] = $this->mm->get_barangays_total_rows();	
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->model('accountmodel', 'acm');
			$uid = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($uid);
			$this->load->view('sPartials/header');
			$this->load->view('staff/members', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function activities(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('activitymodel', 'am');
			$municipal = $this->session->userdata('municipal');
			$data['content'] = $this->am->get_activities_by_municipal($municipal);
			$this->load->model('accountmodel', 'acm');
			$uid = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($uid);
			$this->load->view('sPartials/header');
			$this->load->view('staff/activities', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function treports(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$municipal = $this->session->userdata('municipal');
			$this->load->model('staffreportmodel', 'srm');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['content'] = $this->srm->get_municipal_members_summary($mun_id);
			$data['total_members'] = $this->srm->count_total_members($mun_id);
			$data['total_age_bracket1'] = $this->srm->count_total_age_bracket1($mun_id);
			$data['total_age_bracket2'] = $this->srm->count_total_age_bracket2($mun_id);
			$data['total_age_bracket3'] = $this->srm->count_total_age_bracket3($mun_id);
			$data['total_male_members'] = $this->srm->count_total_male_members($mun_id);
			$data['total_female_members'] = $this->srm->count_total_female_members($mun_id);
			$data['total_male_osy'] = $this->srm->count_total_male_osy($mun_id);
			$data['total_female_osy'] = $this->srm->count_total_female_osy($mun_id);
			$data['total_male_isy'] = $this->srm->count_total_male_isy($mun_id);
			$data['total_female_isy'] = $this->srm->count_total_female_isy($mun_id);
			$data['total_attainment1'] = $this->srm->count_total_attainment1($mun_id);
			$data['total_attainment2'] = $this->srm->count_total_attainment2($mun_id);
			$data['total_attainment3'] = $this->srm->count_total_attainment3($mun_id);
			$data['total_attainment4'] = $this->srm->count_total_attainment4($mun_id);
			$data['total_attainment5'] = $this->srm->count_total_attainment5($mun_id);
			$data['total_attainment6'] = $this->srm->count_total_attainment6($mun_id);
			$data['total_single_members'] = $this->srm->count_total_single_members($mun_id);
			$data['total_married_members'] = $this->srm->count_total_married_members($mun_id);
			$data['total_solo_members'] = $this->srm->count_total_solo_members($mun_id);
			$data['total_income1'] = $this->srm->count_total_monthly_income1($mun_id);
			$data['total_income2'] = $this->srm->count_total_monthly_income2($mun_id);
			$data['total_income3'] = $this->srm->count_total_monthly_income3($mun_id);
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/treports1', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function greports(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['val'] = $this->acm->fetch_account($id);
			$this->load->model('staffreportmodel', 'srm');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['content'] = $this->srm->get_barangays_members_count($mun_id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/greports', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function settings(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/settings', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function help(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/help', $data);
			$this->load->view('sPartials/footer');
		}
	}

}
