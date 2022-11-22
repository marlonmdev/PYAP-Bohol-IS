<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sreportfiltercontroller extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('sreportfiltermodel', 'srfm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function filter_treports1(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($id);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srfm->get_municipal_id($municipal);
			$mun_id = $mun->mun_id;
			if($reportType == 'Quarter'){
				if($quarter == '1st'){
					$startDate = '1-January-2017';
					$endDate = '31-March-'.$year;
					$quart = '1st_quarter';
				}elseif($quarter == '2nd'){
					$startDate = '1-January-2017';
					$endDate = '31-June-'.$year;
					$quart = '2nd_quarter';
				}elseif($quarter == '3rd'){
					$startDate = '1-January-2017';
					$endDate = '31-September-'.$year;
					$quart = '3rd_quarter';
				}else{
					$startDate = '1-January-2017';
					$endDate = '31-December-'.$year;
					$quart = '4th_quarter';
				}
				$data['content'] = $this->srfm->get_quarter_municipal_members_summary($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$data['quart'] = $quart;
				$data['total_members'] = $this->srfm->count_total_members($mun_id, $startDate, $endDate);
				$data['total_age_bracket1'] = $this->srfm->count_total_age_bracket1($mun_id, $startDate, $endDate);
				$data['total_age_bracket2'] = $this->srfm->count_total_age_bracket2($mun_id, $startDate, $endDate);
				$data['total_age_bracket3'] = $this->srfm->count_total_age_bracket3($mun_id, $startDate, $endDate);
				$data['total_male_members'] = $this->srfm->count_total_male_members($mun_id, $startDate, $endDate);
				$data['total_female_members'] = $this->srfm->count_total_female_members($mun_id, $startDate, $endDate);
				$data['total_male_osy'] = $this->srfm->count_total_male_osy($mun_id, $startDate, $endDate);
				$data['total_female_osy'] = $this->srfm->count_total_female_osy($mun_id, $startDate, $endDate);
				$data['total_male_isy'] = $this->srfm->count_total_male_isy($mun_id, $startDate, $endDate);
				$data['total_female_isy'] = $this->srfm->count_total_female_isy($mun_id, $startDate, $endDate);
				$data['total_attainment1'] = $this->srfm->count_total_attainment1($mun_id, $startDate, $endDate);
				$data['total_attainment2'] = $this->srfm->count_total_attainment2($mun_id, $startDate, $endDate);
				$data['total_attainment3'] = $this->srfm->count_total_attainment3($mun_id, $startDate, $endDate);
				$data['total_attainment4'] = $this->srfm->count_total_attainment4($mun_id, $startDate, $endDate);
				$data['total_attainment5'] = $this->srfm->count_total_attainment5($mun_id, $startDate, $endDate);
				$data['total_attainment6'] = $this->srfm->count_total_attainment6($mun_id, $startDate, $endDate);
				$data['total_single_members'] = $this->srfm->count_total_single_members($mun_id, $startDate, $endDate);
				$data['total_married_members'] = $this->srfm->count_total_married_members($mun_id, $startDate, $endDate);
				$data['total_solo_members'] = $this->srfm->count_total_solo_members($mun_id, $startDate, $endDate);
				$data['total_income1'] = $this->srfm->count_total_monthly_income1($mun_id, $startDate, $endDate);
				$data['total_income2'] = $this->srfm->count_total_monthly_income2($mun_id, $startDate, $endDate);
				$data['total_income3'] = $this->srfm->count_total_monthly_income3($mun_id, $startDate, $endDate);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports1_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$quart = 'Annual';
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['quart'] = $quart;
				$data['content'] = $this->srfm->get_annual_municipal_members_summary($mun_id, $startYear, $endYear);
				$data['total_members'] = $this->srfm->count_annual_total_members($mun_id, $startYear, $endYear);
				$data['total_age_bracket1'] = $this->srfm->count_annual_total_age_bracket1($mun_id, $startYear, $endYear);
				$data['total_age_bracket2'] = $this->srfm->count_annual_total_age_bracket2($mun_id, $startYear, $endYear);
				$data['total_age_bracket3'] = $this->srfm->count_annual_total_age_bracket3($mun_id, $startYear, $endYear);
				$data['total_male_members'] = $this->srfm->count_annual_total_male_members($mun_id, $startYear, $endYear);
				$data['total_female_members'] = $this->srfm->count_annual_total_female_members($mun_id, $startYear, $endYear);
				$data['total_male_osy'] = $this->srfm->count_annual_total_male_osy($mun_id, $startYear, $endYear);
				$data['total_female_osy'] = $this->srfm->count_annual_total_female_osy($mun_id, $startYear, $endYear);
				$data['total_male_isy'] = $this->srfm->count_annual_total_male_isy($mun_id, $startYear, $endYear);
				$data['total_female_isy'] = $this->srfm->count_annual_total_female_isy($mun_id, $startYear, $endYear);
				$data['total_attainment1'] = $this->srfm->count_annual_total_attainment1($mun_id, $startYear, $endYear);
				$data['total_attainment2'] = $this->srfm->count_annual_total_attainment2($mun_id, $startYear, $endYear);
				$data['total_attainment3'] = $this->srfm->count_annual_total_attainment3($mun_id, $startYear, $endYear);
				$data['total_attainment4'] = $this->srfm->count_annual_total_attainment4($mun_id, $startYear, $endYear);
				$data['total_attainment5'] = $this->srfm->count_annual_total_attainment5($mun_id, $startYear, $endYear);
				$data['total_attainment6'] = $this->srfm->count_annual_total_attainment6($mun_id, $startYear, $endYear);
				$data['total_single_members'] = $this->srfm->count_annual_total_single_members($mun_id, $startYear, $endYear);
				$data['total_married_members'] = $this->srfm->count_annual_total_married_members($mun_id, $startYear, $endYear);
				$data['total_solo_members'] = $this->srfm->count_annual_total_solo_members($mun_id, $startYear, $endYear);
				$data['total_income1'] = $this->srfm->count_annual_total_monthly_income1($mun_id, $startYear, $endYear);
				$data['total_income2'] = $this->srfm->count_annual_total_monthly_income2($mun_id, $startYear, $endYear);
				$data['total_income3'] = $this->srfm->count_annual_total_monthly_income3($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports1_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}

	function filter_greports1(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['val'] = $this->acm->fetch_account($id);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srfm->get_municipal_id($municipal);
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
				$data['content'] = $this->srfm->get_quarter_barangays_members_count($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->srfm->get_annual_barangays_members_count($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}

	function filter_greports2(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($id);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
			$municipal = $this->session->userdata('municipal');
			$mun = $this->srfm->get_municipal_id($municipal);
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
				$data['aBracket1_m'] = $this->srfm->count_quarter_age_bracket1_m($mun_id, $startDate, $endDate);
				$data['aBracket1_f'] = $this->srfm->count_quarter_age_bracket1_f($mun_id, $startDate, $endDate);
				$data['aBracket2_m'] = $this->srfm->count_quarter_age_bracket2_m($mun_id, $startDate, $endDate);
				$data['aBracket2_f'] = $this->srfm->count_quarter_age_bracket2_f($mun_id, $startDate, $endDate);
				$data['aBracket3_m'] = $this->srfm->count_quarter_age_bracket3_m($mun_id, $startDate, $endDate);
				$data['aBracket3_f'] = $this->srfm->count_quarter_age_bracket3_f($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports2_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['aBracket1_m'] = $this->srfm->count_annual_age_bracket1_m($mun_id, $startYear, $endYear);
				$data['aBracket1_f'] = $this->srfm->count_annual_age_bracket1_f($mun_id, $startYear, $endYear);
				$data['aBracket2_m'] = $this->srfm->count_annual_age_bracket2_m($mun_id, $startYear, $endYear);
				$data['aBracket2_f'] = $this->srfm->count_annual_age_bracket2_f($mun_id, $startYear, $endYear);
				$data['aBracket3_m'] = $this->srfm->count_annual_age_bracket3_m($mun_id, $startYear, $endYear);
				$data['aBracket3_f'] = $this->srfm->count_annual_age_bracket3_f($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports2_filtered', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}



}