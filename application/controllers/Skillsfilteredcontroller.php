<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillsfilteredcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('skillsfilteredmodel', 'skfm');
	}

	
	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function filter_lgu_tabular_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->skfm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			if($reportType == 'Quarter'){
				if($quarter == '1st'){
					$startDate = '1-January-2017';
					$endDate = '31-March-'.$year;
				}elseif($quarter == '2nd'){
					$startDate = '1-January-2017';
					$endDate = '31-June-'.$year;
				}elseif($quarter == '3rd'){
					$startDate = '1-January-2017';
					$endDate = '31-September-'.$year;
				}else{
					$startDate = '1-January-2017';
					$endDate = '31-December-'.$year;
				}
				$data['content'] = $this->skfm->get_lgu_tabular_quarter_skills_report($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports2_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->skfm->get_lgu_tabular_annual_skills_report($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports2_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}

	function filter_lgu_graphical_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->skfm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			if($reportType == 'Quarter'){
				if($quarter == '1st'){
					$startDate = '1-January-2017';
					$endDate = '31-March-'.$year;
				}elseif($quarter == '2nd'){
					$startDate = '1-January-2017';
					$endDate = '31-June-'.$year;
				}elseif($quarter == '3rd'){
					$startDate = '1-January-2017';
					$endDate = '31-September-'.$year;
				}else{
					$startDate = '1-January-2017';
					$endDate = '31-December-'.$year;
				}
				$data['skill1'] = $this->skfm->count_quarter_lgu_skill1($mun_id, $startDate, $endDate);
				$data['skill2'] = $this->skfm->count_quarter_lgu_skill2($mun_id, $startDate, $endDate);
				$data['skill3'] = $this->skfm->count_quarter_lgu_skill3($mun_id, $startDate, $endDate);
				$data['skill4'] = $this->skfm->count_quarter_lgu_skill4($mun_id, $startDate, $endDate);
				$data['skill5'] = $this->skfm->count_quarter_lgu_skill5($mun_id, $startDate, $endDate);
				$data['skill6'] = $this->skfm->count_quarter_lgu_skill6($mun_id, $startDate, $endDate);
				$data['skill7'] = $this->skfm->count_quarter_lgu_skill7($mun_id, $startDate, $endDate);
				$data['skill8'] = $this->skfm->count_quarter_lgu_skill8($mun_id, $startDate, $endDate);
				$data['skill9'] = $this->skfm->count_quarter_lgu_skill9($mun_id, $startDate, $endDate);
				$data['skill10'] = $this->skfm->count_quarter_lgu_skill10($mun_id, $startDate, $endDate);
				$data['skill11'] = $this->skfm->count_quarter_lgu_skill11($mun_id, $startDate, $endDate);
				$data['skill12'] = $this->skfm->count_quarter_lgu_skill12($mun_id, $startDate, $endDate);
				$data['skill13'] = $this->skfm->count_quarter_lgu_skill13($mun_id, $startDate, $endDate);
				$data['skill14'] = $this->skfm->count_quarter_lgu_skill14($mun_id, $startDate, $endDate);
				$data['skill15'] = $this->skfm->count_quarter_lgu_skill15($mun_id, $startDate, $endDate);
				$data['skill16'] = $this->skfm->count_quarter_lgu_skill16($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports4_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['skill1'] = $this->skfm->count_annual_lgu_skill1($mun_id, $startYear, $endYear);
				$data['skill2'] = $this->skfm->count_annual_lgu_skill2($mun_id, $startYear, $endYear);
				$data['skill3'] = $this->skfm->count_annual_lgu_skill3($mun_id, $startYear, $endYear);
				$data['skill4'] = $this->skfm->count_annual_lgu_skill4($mun_id, $startYear, $endYear);
				$data['skill5'] = $this->skfm->count_annual_lgu_skill5($mun_id, $startYear, $endYear);
				$data['skill6'] = $this->skfm->count_annual_lgu_skill6($mun_id, $startYear, $endYear);
				$data['skill7'] = $this->skfm->count_annual_lgu_skill7($mun_id, $startYear, $endYear);
				$data['skill8'] = $this->skfm->count_annual_lgu_skill8($mun_id, $startYear, $endYear);
				$data['skill9'] = $this->skfm->count_annual_lgu_skill9($mun_id, $startYear, $endYear);
				$data['skill10'] = $this->skfm->count_annual_lgu_skill10($mun_id, $startYear, $endYear);
				$data['skill11'] = $this->skfm->count_annual_lgu_skill11($mun_id, $startYear, $endYear);
				$data['skill12'] = $this->skfm->count_annual_lgu_skill12($mun_id, $startYear, $endYear);
				$data['skill13'] = $this->skfm->count_annual_lgu_skill13($mun_id, $startYear, $endYear);
				$data['skill14'] = $this->skfm->count_annual_lgu_skill14($mun_id, $startYear, $endYear);
				$data['skill15'] = $this->skfm->count_annual_lgu_skill15($mun_id, $startYear, $endYear);
				$data['skill16'] = $this->skfm->count_annual_lgu_skill16($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports4_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}

}