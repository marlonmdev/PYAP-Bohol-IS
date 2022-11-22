<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportfiltercontroller extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('reportfiltermodel', 'rfm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') {
            return true;
        }
    }

	function filter_treports1(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['content'] = $this->rfm->get_quarter_treports1($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$data['quart'] = $quart;
				$data['total_brgys'] = $this->rfm->count_total_barangays();
				// $data['total_brgys_pyap'] = $this->rfm->count_total_barangays_with_pyap();
				$data['total_brgys_pyap'] = $this->rfm->count_quarter_total_barangays_with_pyap($startDate, $endDate);
				$data['total_members'] = $this->rfm->count_total_members($startDate, $endDate);
				$data['total_age_bracket1'] = $this->rfm->count_total_age_bracket1($startDate, $endDate);
				$data['total_age_bracket2'] = $this->rfm->count_total_age_bracket2($startDate, $endDate);
				$data['total_age_bracket3'] = $this->rfm->count_total_age_bracket3($startDate, $endDate);
				$data['total_male_members'] = $this->rfm->count_total_male_members($startDate, $endDate);
				$data['total_female_members'] = $this->rfm->count_total_female_members($startDate, $endDate);
				$data['total_male_osy'] = $this->rfm->count_total_male_osy($startDate, $endDate);
				$data['total_female_osy'] = $this->rfm->count_total_female_osy($startDate, $endDate);
				$data['total_male_isy'] = $this->rfm->count_total_male_isy($startDate, $endDate);
				$data['total_female_isy'] = $this->rfm->count_total_female_isy($startDate, $endDate);
				$data['total_attainment1'] = $this->rfm->count_total_attainment1($startDate, $endDate);
				$data['total_attainment2'] = $this->rfm->count_total_attainment2($startDate, $endDate);
				$data['total_attainment3'] = $this->rfm->count_total_attainment3($startDate, $endDate);
				$data['total_attainment4'] = $this->rfm->count_total_attainment4($startDate, $endDate);
				$data['total_attainment5'] = $this->rfm->count_total_attainment5($startDate, $endDate);
				$data['total_attainment6'] = $this->rfm->count_total_attainment6($startDate, $endDate);
				$data['total_single_members'] = $this->rfm->count_total_single_members($startDate, $endDate);
				$data['total_married_members'] = $this->rfm->count_total_married_members($startDate, $endDate);
				$data['total_solo_members'] = $this->rfm->count_total_solo_members($startDate, $endDate);
				$data['total_income1'] = $this->rfm->count_total_monthly_income1($startDate, $endDate);
				$data['total_income2'] = $this->rfm->count_total_monthly_income2($startDate, $endDate);
				$data['total_income3'] = $this->rfm->count_total_monthly_income3($startDate, $endDate);	
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['quart'] = 'annual';
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_annual_treports1($startYear, $endYear);
				$data['total_brgys'] = $this->rfm->count_total_barangays();
				// $data['total_brgys_pyap'] = $this->rfm->count_annual_total_barangays_with_pyap();
				$data['total_brgys_pyap'] = $this->rfm->count_annual_total_barangays_with_pyap($startYear, $endYear);
				$data['total_members'] = $this->rfm->count_annual_total_members($startYear, $endYear);
				$data['total_age_bracket1'] = $this->rfm->count_annual_total_age_bracket1($startYear, $endYear);
				$data['total_age_bracket2'] = $this->rfm->count_annual_total_age_bracket2($startYear, $endYear);
				$data['total_age_bracket3'] = $this->rfm->count_annual_total_age_bracket3($startYear, $endYear);
				$data['total_male_members'] = $this->rfm->count_annual_total_male_members($startYear, $endYear);
				$data['total_female_members'] = $this->rfm->count_annual_total_female_members($startYear, $endYear);
				$data['total_male_osy'] = $this->rfm->count_annual_total_male_osy($startYear, $endYear);
				$data['total_female_osy'] = $this->rfm->count_annual_total_female_osy($startYear, $endYear);
				$data['total_male_isy'] = $this->rfm->count_annual_total_male_isy($startYear, $endYear);
				$data['total_female_isy'] = $this->rfm->count_annual_total_female_isy($startYear, $endYear);
				$data['total_attainment1'] = $this->rfm->count_annual_total_attainment1($startYear, $endYear);
				$data['total_attainment2'] = $this->rfm->count_annual_total_attainment2($startYear, $endYear);
				$data['total_attainment3'] = $this->rfm->count_annual_total_attainment3($startYear, $endYear);
				$data['total_attainment4'] = $this->rfm->count_annual_total_attainment4($startYear, $endYear);
				$data['total_attainment5'] = $this->rfm->count_annual_total_attainment5($startYear, $endYear);
				$data['total_attainment6'] = $this->rfm->count_annual_total_attainment6($startYear, $endYear);
				$data['total_single_members'] = $this->rfm->count_annual_total_single_members($startYear, $endYear);
				$data['total_married_members'] = $this->rfm->count_annual_total_married_members($startYear, $endYear);
				$data['total_solo_members'] = $this->rfm->count_annual_total_solo_members($startYear, $endYear);
				$data['total_income1'] = $this->rfm->count_annual_total_monthly_income1($startYear, $endYear);
				$data['total_income2'] = $this->rfm->count_annual_total_monthly_income2($startYear, $endYear);
				$data['total_income3'] = $this->rfm->count_annual_total_monthly_income3($startYear, $endYear);	
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_treports2(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['content'] = $this->rfm->get_quarter_treports2($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports2_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_annual_treports2($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports2_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_treports3(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['content'] = $this->rfm->get_quarter_treports3($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports3_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_annual_treports3($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports3_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_treports4(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['content'] = $this->rfm->get_quarter_treports4($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports4_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_annual_treports4($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports4_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports1(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['aBracket1_m'] = $this->rfm->count_quarter_age_bracket1_m($startDate, $endDate);
				$data['aBracket1_f'] = $this->rfm->count_quarter_age_bracket1_f($startDate, $endDate);
				$data['aBracket2_m'] = $this->rfm->count_quarter_age_bracket2_m($startDate, $endDate);
				$data['aBracket2_f'] = $this->rfm->count_quarter_age_bracket2_f($startDate, $endDate);
				$data['aBracket3_m'] = $this->rfm->count_quarter_age_bracket3_m($startDate, $endDate);
				$data['aBracket3_f'] = $this->rfm->count_quarter_age_bracket3_f($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['aBracket1_m'] = $this->rfm->count_annual_age_bracket1_m($startYear, $endYear);
				$data['aBracket1_f'] = $this->rfm->count_annual_age_bracket1_f($startYear, $endYear);
				$data['aBracket2_m'] = $this->rfm->count_annual_age_bracket2_m($startYear, $endYear);
				$data['aBracket2_f'] = $this->rfm->count_annual_age_bracket2_f($startYear, $endYear);
				$data['aBracket3_m'] = $this->rfm->count_annual_age_bracket3_m($startYear, $endYear);
				$data['aBracket3_f'] = $this->rfm->count_annual_age_bracket3_f($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports2(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['elemLevel_m'] = $this->rfm->count_quarter_male_attainment1($startDate, $endDate);
				$data['elemLevel_f'] = $this->rfm->count_quarter_female_attainment1($startDate, $endDate);
				$data['elemGrad_m'] = $this->rfm->count_quarter_male_attainment2($startDate, $endDate);
				$data['elemGrad_f'] = $this->rfm->count_quarter_female_attainment2($startDate, $endDate);
				$data['hsLevel_m'] = $this->rfm->count_quarter_male_attainment3($startDate, $endDate);
				$data['hsLevel_f'] = $this->rfm->count_quarter_female_attainment3($startDate, $endDate);
				$data['hsGrad_m'] = $this->rfm->count_quarter_male_attainment4($startDate, $endDate);
				$data['hsGrad_f'] = $this->rfm->count_quarter_female_attainment4($startDate, $endDate);
				$data['colLevel_m'] = $this->rfm->count_quarter_male_attainment5($startDate, $endDate);
				$data['colLevel_f'] = $this->rfm->count_quarter_female_attainment5($startDate, $endDate);
				$data['colGrad_m'] = $this->rfm->count_quarter_male_attainment6($startDate, $endDate);
				$data['colGrad_f'] = $this->rfm->count_quarter_female_attainment6($startDate, $endDate);

				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports2_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['elemLevel_m'] = $this->rfm->count_annual_male_attainment1($startYear, $endYear);
				$data['elemLevel_f'] = $this->rfm->count_annual_female_attainment1($startYear, $endYear);
				$data['elemGrad_m'] = $this->rfm->count_annual_male_attainment2($startYear, $endYear);
				$data['elemGrad_f'] = $this->rfm->count_annual_female_attainment2($startYear, $endYear);
				$data['hsLevel_m'] = $this->rfm->count_annual_male_attainment3($startYear, $endYear);
				$data['hsLevel_f'] = $this->rfm->count_annual_female_attainment3($startYear, $endYear);
				$data['hsGrad_m'] = $this->rfm->count_annual_male_attainment4($startYear, $endYear);
				$data['hsGrad_f'] = $this->rfm->count_annual_female_attainment4($startYear, $endYear);
				$data['colLevel_m'] = $this->rfm->count_annual_male_attainment5($startYear, $endYear);
				$data['colLevel_f'] = $this->rfm->count_annual_female_attainment5($startYear, $endYear);
				$data['colGrad_m'] = $this->rfm->count_annual_male_attainment6($startYear, $endYear);
				$data['colGrad_f'] = $this->rfm->count_annual_female_attainment6($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports2_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports3(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['skill1'] = $this->rfm->count_quarter_skill1($startDate, $endDate);
				$data['skill2'] = $this->rfm->count_quarter_skill2($startDate, $endDate);
				$data['skill3'] = $this->rfm->count_quarter_skill3($startDate, $endDate);
				$data['skill4'] = $this->rfm->count_quarter_skill4($startDate, $endDate);
				$data['skill5'] = $this->rfm->count_quarter_skill5($startDate, $endDate);
				$data['skill6'] = $this->rfm->count_quarter_skill6($startDate, $endDate);
				$data['skill7'] = $this->rfm->count_quarter_skill7($startDate, $endDate);
				$data['skill8'] = $this->rfm->count_quarter_skill8($startDate, $endDate);
				$data['skill9'] = $this->rfm->count_quarter_skill9($startDate, $endDate);
				$data['skill10'] = $this->rfm->count_quarter_skill10($startDate, $endDate);
				$data['skill11'] = $this->rfm->count_quarter_skill11($startDate, $endDate);
				$data['skill12'] = $this->rfm->count_quarter_skill12($startDate, $endDate);
				$data['skill13'] = $this->rfm->count_quarter_skill13($startDate, $endDate);
				$data['skill14'] = $this->rfm->count_quarter_skill14($startDate, $endDate);
				$data['skill15'] = $this->rfm->count_quarter_skill15($startDate, $endDate);
				$data['skill16'] = $this->rfm->count_quarter_skill16($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports3_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['skill1'] = $this->rfm->count_annual_skill1($startYear, $endYear);
				$data['skill2'] = $this->rfm->count_annual_skill2($startYear, $endYear);
				$data['skill3'] = $this->rfm->count_annual_skill3($startYear, $endYear);
				$data['skill4'] = $this->rfm->count_annual_skill4($startYear, $endYear);
				$data['skill5'] = $this->rfm->count_annual_skill5($startYear, $endYear);
				$data['skill6'] = $this->rfm->count_annual_skill6($startYear, $endYear);
				$data['skill7'] = $this->rfm->count_annual_skill7($startYear, $endYear);
				$data['skill8'] = $this->rfm->count_annual_skill8($startYear, $endYear);
				$data['skill9'] = $this->rfm->count_annual_skill9($startYear, $endYear);
				$data['skill10'] = $this->rfm->count_annual_skill10($startYear, $endYear);
				$data['skill11'] = $this->rfm->count_annual_skill11($startYear, $endYear);
				$data['skill12'] = $this->rfm->count_annual_skill12($startYear, $endYear);
				$data['skill13'] = $this->rfm->count_annual_skill13($startYear, $endYear);
				$data['skill14'] = $this->rfm->count_annual_skill14($startYear, $endYear);
				$data['skill15'] = $this->rfm->count_annual_skill15($startYear, $endYear);
				$data['skill16'] = $this->rfm->count_annual_skill16($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports3_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports4(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['content'] = $this->rfm->get_quarter_municipal_members_count($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['usr'] = $this->acm->fetch_account($uid);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports4_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['usr'] = $this->acm->fetch_account($uid);
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_annual_municipal_members_count($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports4_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports5(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['reason1'] = $this->rfm->count_quarter_reason1($startDate, $endDate);
				$data['reason2'] = $this->rfm->count_quarter_reason2($startDate, $endDate);
				$data['reason3'] = $this->rfm->count_quarter_reason3($startDate, $endDate);
				$data['reason4'] = $this->rfm->count_quarter_reason4($startDate, $endDate);
				$data['reason5'] = $this->rfm->count_quarter_reason5($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports5_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['reason1'] = $this->rfm->count_annual_reason1($startYear, $endYear);
				$data['reason2'] = $this->rfm->count_annual_reason2($startYear, $endYear);
				$data['reason3'] = $this->rfm->count_annual_reason3($startYear, $endYear);
				$data['reason4'] = $this->rfm->count_annual_reason4($startYear, $endYear);
				$data['reason5'] = $this->rfm->count_annual_reason5($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports5_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function filter_greports6(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$reportType = $this->input->post('repType');
			$quarter = $this->input->post('repQuarter');
			$year = $this->input->post('repQYear');
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
				$data['interest1'] = $this->rfm->count_quarter_interest1($startDate, $endDate);
				$data['interest2'] = $this->rfm->count_quarter_interest2($startDate, $endDate);
				$data['interest3'] = $this->rfm->count_quarter_interest3($startDate, $endDate);
				$data['interest4'] = $this->rfm->count_quarter_interest4($startDate, $endDate);
				$data['interest5'] = $this->rfm->count_quarter_interest5($startDate, $endDate);
				$data['interest6'] = $this->rfm->count_quarter_interest6($startDate, $endDate);
				$data['interest7'] = $this->rfm->count_quarter_interest7($startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports6_filtered', $data);
				$this->load->view('aPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['interest1'] = $this->rfm->count_annual_interest1($startYear, $endYear);
				$data['interest2'] = $this->rfm->count_annual_interest2($startYear, $endYear);
				$data['interest3'] = $this->rfm->count_annual_interest3($startYear, $endYear);
				$data['interest4'] = $this->rfm->count_annual_interest4($startYear, $endYear);
				$data['interest5'] = $this->rfm->count_annual_interest5($startYear, $endYear);
				$data['interest6'] = $this->rfm->count_quarter_interest6($startYear, $endYear);
				$data['interest7'] = $this->rfm->count_quarter_interest7($startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/greports6_filtered', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}


}