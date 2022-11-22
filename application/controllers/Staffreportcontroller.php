<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffreportcontroller extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('staffreportmodel', 'srm');
	}


    function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function barangay_members_graphical_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['content'] = $this->srm->get_barangays_members_count($mun_id);
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/greports', $data);
			$this->load->view('sPartials/footer');
		}
	}


	function view_brgy_members(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$brgy_id = $this->uri->segment(3);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$this->load->model('staffreportmodel', 'srm');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['content'] = $this->srm->get_brgy_member_list($brgy_id, $municipal);
			$data['row'] = $this->acm->fetch_account($id);
			$barangay = $this->srm->get_barangay_by_id($brgy_id, $mun_id);
			$data['brgy'] = $barangay->brgy;
			$this->load->view('sPartials/header');
			$this->load->view('staff/treports_members', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function view_brgy_members_quarter_annual(){
    	if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$brgy_id = $this->uri->segment(3);
			$municipal = $this->session->userdata('municipal');
			$reportType = $this->uri->segment(5);
			$year =  $this->uri->segment(6);
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$barangay = $this->srm->get_barangay_by_id($brgy_id, $mun_id);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			if($reportType == 'annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $year;
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$year;
				$data['brgy'] = $barangay->brgy;
				$data['fQuarter'] = $quart;
				$data['content'] = $this->srm->get_brgy_members_annual($brgy_id, $mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports_members2', $data);
				$this->load->view('sPartials/footer');
			}else{
				if($reportType == '1st_quarter'){
					$startDate = '1-January-2017';
					$endDate = '31-March-'.$year;
					$quart = '1st';
				}elseif($reportType == '2nd_quarter'){
					$startDate = '1-January-2017';
					$endDate = '31-June-'.$year;
					$quart = '2nd';
				}elseif($reportType == '3rd_quarter'){
					$startDate = '1-January-2017';
					$endDate = '31-September-'.$year;
					$quart = '3rd';
				}else{
					$startDate = '1-January-2017';
					$endDate = '31-December-'.$year;
					$quart = '4th';
				}
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quart;
				$data['fYear'] = $year;
				$data['brgy'] = $barangay->brgy;
				$data['content'] = $this->srm->get_brgy_members_quarter($brgy_id, $mun_id, $startDate, $endDate);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports_members2', $data);
				$this->load->view('sPartials/footer');
			}
		}
    }

	function graphical_age_brackets_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['aBracket1_m'] = $this->srm->count_age_bracket1_m($mun_id);
			$data['aBracket1_f'] = $this->srm->count_age_bracket1_f($mun_id);
			$data['aBracket2_m'] = $this->srm->count_age_bracket2_m($mun_id);
			$data['aBracket2_f'] = $this->srm->count_age_bracket2_f($mun_id);
			$data['aBracket3_m'] = $this->srm->count_age_bracket3_m($mun_id);
			$data['aBracket3_f'] = $this->srm->count_age_bracket3_f($mun_id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/greports2', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function graphical_highest_educational_attainment_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			$data['elemLevel_m'] = $this->srm->count_male_attainment1($mun_id);
			$data['elemLevel_f'] = $this->srm->count_female_attainment1($mun_id);
			$data['elemGrad_m'] = $this->srm->count_male_attainment2($mun_id);
			$data['elemGrad_f'] = $this->srm->count_female_attainment2($mun_id);
			$data['hsLevel_m'] = $this->srm->count_male_attainment3($mun_id);
			$data['hsLevel_f'] = $this->srm->count_female_attainment3($mun_id);
			$data['hsGrad_m'] = $this->srm->count_male_attainment4($mun_id);
			$data['hsGrad_f'] = $this->srm->count_female_attainment4($mun_id);
			$data['colLevel_m'] = $this->srm->count_male_attainment5($mun_id);
			$data['colLevel_f'] = $this->srm->count_female_attainment5($mun_id);
			$data['colGrad_m'] = $this->srm->count_male_attainment6($mun_id);
			$data['colGrad_f'] = $this->srm->count_female_attainment6($mun_id);
			$this->load->view('sPartials/header');
			$this->load->view('staff/greports3', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function filter_graphical_highest_educational_attainment_report(){
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
			$mun = $this->srm->get_municipal_id($municipal);
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
				$data['elemLevel_m'] = $this->srm->count_lgu_quarter_male_attainment1($mun_id, $startDate, $endDate);
				$data['elemLevel_f'] = $this->srm->count_lgu_quarter_female_attainment1($mun_id, $startDate, $endDate);
				$data['elemGrad_m'] = $this->srm->count_lgu_quarter_male_attainment2($mun_id, $startDate, $endDate);
				$data['elemGrad_f'] = $this->srm->count_lgu_quarter_female_attainment2($mun_id, $startDate, $endDate);
				$data['hsLevel_m'] = $this->srm->count_lgu_quarter_male_attainment3($mun_id, $startDate, $endDate);
				$data['hsLevel_f'] = $this->srm->count_lgu_quarter_female_attainment3($mun_id, $startDate, $endDate);
				$data['hsGrad_m'] = $this->srm->count_lgu_quarter_male_attainment4($mun_id, $startDate, $endDate);
				$data['hsGrad_f'] = $this->srm->count_lgu_quarter_female_attainment4($mun_id, $startDate, $endDate);
				$data['colLevel_m'] = $this->srm->count_lgu_quarter_male_attainment5($mun_id, $startDate, $endDate);
				$data['colLevel_f'] = $this->srm->count_lgu_quarter_female_attainment5($mun_id, $startDate, $endDate);
				$data['colGrad_m'] = $this->srm->count_lgu_quarter_male_attainment6($mun_id, $startDate, $endDate);
				$data['colGrad_f'] = $this->srm->count_lgu_quarter_female_attainment6($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports3_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['elemLevel_m'] = $this->srm->count_lgu_annual_male_attainment1($mun_id, $startYear, $endYear);
				$data['elemLevel_f'] = $this->srm->count_lgu_annual_female_attainment1($mun_id, $startYear, $endYear);
				$data['elemGrad_m'] = $this->srm->count_lgu_annual_male_attainment2($mun_id, $startYear, $endYear);
				$data['elemGrad_f'] = $this->srm->count_lgu_annual_female_attainment2($mun_id, $startYear, $endYear);
				$data['hsLevel_m'] = $this->srm->count_lgu_annual_male_attainment3($mun_id, $startYear, $endYear);
				$data['hsLevel_f'] = $this->srm->count_lgu_annual_female_attainment3($mun_id, $startYear, $endYear);
				$data['hsGrad_m'] = $this->srm->count_lgu_annual_male_attainment4($mun_id, $startYear, $endYear);
				$data['hsGrad_f'] = $this->srm->count_lgu_annual_female_attainment4($mun_id, $startYear, $endYear);
				$data['colLevel_m'] = $this->srm->count_lgu_annual_male_attainment5($mun_id, $startYear, $endYear);
				$data['colLevel_f'] = $this->srm->count_lgu_annual_female_attainment5($mun_id, $startYear, $endYear);
				$data['colGrad_m'] = $this->srm->count_lgu_annual_male_attainment6($mun_id, $startYear, $endYear);
				$data['colGrad_f'] = $this->srm->count_lgu_annual_female_attainment6($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports3_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}


}