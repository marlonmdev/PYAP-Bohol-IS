<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('reportmodel', 'rm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') {
            return true;
        }
    }

    function municipal_breakdown(){
    	if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$mun_id = $this->uri->segment(5);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['mun'] = $this->rm->get_municipality($mun_id);
			$data['content'] = $this->rm->get_municipal_members_summary($mun_id);
			$data['total_members'] = $this->rm->count_mun_total_members($mun_id);
			$data['total_age_bracket1'] = $this->rm->count_mun_total_age_bracket1($mun_id);
			$data['total_age_bracket2'] = $this->rm->count_mun_total_age_bracket2($mun_id);
			$data['total_age_bracket3'] = $this->rm->count_mun_total_age_bracket3($mun_id);
			$data['total_male_members'] = $this->rm->count_mun_total_male_members($mun_id);
			$data['total_female_members'] = $this->rm->count_mun_total_female_members($mun_id);
			$data['total_male_osy'] = $this->rm->count_mun_total_male_osy($mun_id);
			$data['total_female_osy'] = $this->rm->count_mun_total_female_osy($mun_id);
			$data['total_male_isy'] = $this->rm->count_mun_total_male_isy($mun_id);
			$data['total_female_isy'] = $this->rm->count_mun_total_female_isy($mun_id);
			$data['total_attainment1'] = $this->rm->count_mun_total_attainment1($mun_id);
			$data['total_attainment2'] = $this->rm->count_mun_total_attainment2($mun_id);
			$data['total_attainment3'] = $this->rm->count_mun_total_attainment3($mun_id);
			$data['total_attainment4'] = $this->rm->count_mun_total_attainment4($mun_id);
			$data['total_attainment5'] = $this->rm->count_mun_total_attainment5($mun_id);
			$data['total_attainment6'] = $this->rm->count_mun_total_attainment6($mun_id);
			$data['total_single_members'] = $this->rm->count_mun_total_single_members($mun_id);
			$data['total_married_members'] = $this->rm->count_mun_total_married_members($mun_id);
			$data['total_solo_members'] = $this->rm->count_mun_total_solo_members($mun_id);
			$data['total_income1'] = $this->rm->count_mun_total_monthly_income1($mun_id);
			$data['total_income2'] = $this->rm->count_mun_total_monthly_income2($mun_id);
			$data['total_income3'] = $this->rm->count_mun_total_monthly_income3($mun_id);
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports_breakdown', $data);
			$this->load->view('aPartials/footer');
		}
    }

    function municipal_breakdown_quarter_annual(){
    	if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$mun_id = $this->uri->segment(5);
			$reportType = $this->uri->segment(6);
			$year =  $this->uri->segment(7);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['mun'] = $this->rm->get_municipality($mun_id);
			$data['row'] = $this->acm->fetch_account($id);
			if($reportType == 'annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $year;
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$year;
				$data['content'] = $this->rm->get_municipal_members_summary_annual($mun_id, $startYear, $endYear);
				$data['total_members'] = $this->rm->count_annual_mun_total_members($mun_id, $startYear, $endYear);
				$data['total_age_bracket1'] = $this->rm->count_annual_mun_total_age_bracket1($mun_id, $startYear, $endYear);
				$data['total_age_bracket2'] = $this->rm->count_annual_mun_total_age_bracket2($mun_id, $startYear, $endYear);
				$data['total_age_bracket3'] = $this->rm->count_annual_mun_total_age_bracket3($mun_id, $startYear, $endYear);
				$data['total_male_members'] = $this->rm->count_annual_mun_total_male_members($mun_id, $startYear, $endYear);
				$data['total_female_members'] = $this->rm->count_annual_mun_total_female_members($mun_id, $startYear, $endYear);
				$data['total_male_osy'] = $this->rm->count_annual_mun_total_male_osy($mun_id, $startYear, $endYear);
				$data['total_female_osy'] = $this->rm->count_annual_mun_total_female_osy($mun_id, $startYear, $endYear);
				$data['total_male_isy'] = $this->rm->count_annual_mun_total_male_isy($mun_id, $startYear, $endYear);
				$data['total_female_isy'] = $this->rm->count_annual_mun_total_female_isy($mun_id, $startYear, $endYear);
				$data['total_attainment1'] = $this->rm->count_annual_mun_total_attainment1($mun_id, $startYear, $endYear);
				$data['total_attainment2'] = $this->rm->count_annual_mun_total_attainment2($mun_id, $startYear, $endYear);
				$data['total_attainment3'] = $this->rm->count_annual_mun_total_attainment3($mun_id, $startYear, $endYear);
				$data['total_attainment4'] = $this->rm->count_annual_mun_total_attainment4($mun_id, $startYear, $endYear);
				$data['total_attainment5'] = $this->rm->count_annual_mun_total_attainment5($mun_id, $startYear, $endYear);
				$data['total_attainment6'] = $this->rm->count_annual_mun_total_attainment6($mun_id, $startYear, $endYear);
				$data['total_single_members'] = $this->rm->count_annual_mun_total_single_members($mun_id, $startYear, $endYear);
				$data['total_married_members'] = $this->rm->count_annual_mun_total_married_members($mun_id, $startYear, $endYear);
				$data['total_solo_members'] = $this->rm->count_annual_mun_total_solo_members($mun_id, $startYear, $endYear);
				$data['total_income1'] = $this->rm->count_annual_mun_total_monthly_income1($mun_id, $startYear, $endYear);
				$data['total_income2'] = $this->rm->count_annual_mun_total_monthly_income2($mun_id, $startYear, $endYear);
				$data['total_income3'] = $this->rm->count_annual_mun_total_monthly_income3($mun_id, $startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_breakdown2', $data);
				$this->load->view('aPartials/footer');
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
				$data['content'] = $this->rm->get_municipal_members_summary_quarter($mun_id, $startDate, $endDate);
				$data['total_members'] = $this->rm->count_quarter_mun_total_members($mun_id,$startDate, $endDate);
				$data['total_age_bracket1'] = $this->rm->count_quarter_mun_total_age_bracket1($mun_id,$startDate, $endDate);
				$data['total_age_bracket2'] = $this->rm->count_quarter_mun_total_age_bracket2($mun_id,$startDate, $endDate);
				$data['total_age_bracket3'] = $this->rm->count_quarter_mun_total_age_bracket3($mun_id,$startDate, $endDate);
				$data['total_male_members'] = $this->rm->count_quarter_mun_total_male_members($mun_id,$startDate, $endDate);
				$data['total_female_members'] = $this->rm->count_quarter_mun_total_female_members($mun_id,$startDate, $endDate);
				$data['total_male_osy'] = $this->rm->count_quarter_mun_total_male_osy($mun_id,$startDate, $endDate);
				$data['total_female_osy'] = $this->rm->count_quarter_mun_total_female_osy($mun_id,$startDate, $endDate);
				$data['total_male_isy'] = $this->rm->count_quarter_mun_total_male_isy($mun_id,$startDate, $endDate);
				$data['total_female_isy'] = $this->rm->count_quarter_mun_total_female_isy($mun_id,$startDate, $endDate);
				$data['total_attainment1'] = $this->rm->count_quarter_mun_total_attainment1($mun_id,$startDate, $endDate);
				$data['total_attainment2'] = $this->rm->count_quarter_mun_total_attainment2($mun_id,$startDate, $endDate);
				$data['total_attainment3'] = $this->rm->count_quarter_mun_total_attainment3($mun_id,$startDate, $endDate);
				$data['total_attainment4'] = $this->rm->count_quarter_mun_total_attainment4($mun_id,$startDate, $endDate);
				$data['total_attainment5'] = $this->rm->count_quarter_mun_total_attainment5($mun_id,$startDate, $endDate);
				$data['total_attainment6'] = $this->rm->count_quarter_mun_total_attainment6($mun_id,$startDate, $endDate);
				$data['total_single_members'] = $this->rm->count_quarter_mun_total_single_members($mun_id,$startDate, $endDate);
				$data['total_married_members'] = $this->rm->count_quarter_mun_total_married_members($mun_id,$startDate, $endDate);
				$data['total_solo_members'] = $this->rm->count_quarter_mun_total_solo_members($mun_id,$startDate, $endDate);
				$data['total_income1'] = $this->rm->count_quarter_mun_total_monthly_income1($mun_id,$startDate, $endDate);
				$data['total_income2'] = $this->rm->count_quarter_mun_total_monthly_income2($mun_id,$startDate, $endDate);
				$data['total_income3'] = $this->rm->count_quarter_mun_total_monthly_income3($mun_id,$startDate, $endDate);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_breakdown2', $data);
				$this->load->view('aPartials/footer');
			}
		}
    }

    function barangay_breakdown(){
    	if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$data['municipal'] = $this->uri->segment(4);
			$brgy_id = $this->uri->segment(5);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['brgy'] = $this->rm->get_barangay($brgy_id);
			$data['content'] = $this->rm->get_barangay_members($brgy_id);
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports_members', $data);
			$this->load->view('aPartials/footer');
		}
    }

    function barangay_breakdown_quarter_annual(){
    	if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$data['municipal'] = $this->uri->segment(4);
			$brgy_id = $this->uri->segment(5);
			$reportType = $this->uri->segment(6);
			$year =  $this->uri->segment(7);
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['brgy'] = $this->rm->get_barangay($brgy_id);
			$data['row'] = $this->acm->fetch_account($id);
			if($reportType == 'annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $year;
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$year;
				$data['content'] = $this->rm->get_barangay_members_annual($brgy_id, $startYear, $endYear);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_members2', $data);
				$this->load->view('aPartials/footer');
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
				$data['content'] = $this->rm->get_barangay_members_quarter($brgy_id, $startDate, $endDate);
				$this->load->model('adminmodel', 'adm');
				$data['sign1'] = $this->adm->fetch_signatory1();
				$data['sign2'] = $this->adm->fetch_signatory2();
				$this->load->view('aPartials/header');
				$this->load->view('admin/treports_members2', $data);
				$this->load->view('aPartials/footer');
			}
		}
    }

	function admin_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['content'] = $this->rm->get_skills_summary();
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports2', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function reason_for_dropping_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['content'] = $this->rm->get_reason_for_dropping_summary();
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports3', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function interest_hobbies_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['content'] = $this->rm->get_interest_hobbies_summary();
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports4', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function graphical_highest_educational_attainment_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['elemLevel_m'] = $this->rm->count_male_attainment1();
			$data['elemLevel_f'] = $this->rm->count_female_attainment1();
			$data['elemGrad_m'] = $this->rm->count_male_attainment2();
			$data['elemGrad_f'] = $this->rm->count_female_attainment2();
			$data['hsLevel_m'] = $this->rm->count_male_attainment3();
			$data['hsLevel_f'] = $this->rm->count_female_attainment3();
			$data['hsGrad_m'] = $this->rm->count_male_attainment4();
			$data['hsGrad_f'] = $this->rm->count_female_attainment4();
			$data['colLevel_m'] = $this->rm->count_male_attainment5();
			$data['colLevel_f'] = $this->rm->count_female_attainment5();
			$data['colGrad_m'] = $this->rm->count_male_attainment6();
			$data['colGrad_f'] = $this->rm->count_female_attainment6();
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports2', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function graphical_age_brackets_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['aBracket1_m'] = $this->rm->count_age_bracket1_m();
			$data['aBracket1_f'] = $this->rm->count_age_bracket1_f();
			$data['aBracket2_m'] = $this->rm->count_age_bracket2_m();
			$data['aBracket2_f'] = $this->rm->count_age_bracket2_f();
			$data['aBracket3_m'] = $this->rm->count_age_bracket3_m();
			$data['aBracket3_f'] = $this->rm->count_age_bracket3_f();
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function graphical_skills_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['skill1'] = $this->rm->count_skill1();
			$data['skill2'] = $this->rm->count_skill2();
			$data['skill3'] = $this->rm->count_skill3();
			$data['skill4'] = $this->rm->count_skill4();
			$data['skill5'] = $this->rm->count_skill5();
			$data['skill6'] = $this->rm->count_skill6();
			$data['skill7'] = $this->rm->count_skill7();
			$data['skill8'] = $this->rm->count_skill8();
			$data['skill9'] = $this->rm->count_skill9();
			$data['skill10'] = $this->rm->count_skill10();
			$data['skill11'] = $this->rm->count_skill11();
			$data['skill12'] = $this->rm->count_skill12();
			$data['skill13'] = $this->rm->count_skill13();
			$data['skill14'] = $this->rm->count_skill14();
			$data['skill15'] = $this->rm->count_skill15();
			$data['skill16'] = $this->rm->count_skill16();
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports3', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function graphical_reason_for_dropping_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['reason1'] = $this->rm->count_reason1();
			$data['reason2'] = $this->rm->count_reason2();
			$data['reason3'] = $this->rm->count_reason3();
			$data['reason4'] = $this->rm->count_reason4();
			$data['reason5'] = $this->rm->count_reason5();
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports5', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function graphical_interest_hobbies_report(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['interest1'] = $this->rm->count_interest1();
			$data['interest2'] = $this->rm->count_interest2();
			$data['interest3'] = $this->rm->count_interest3();
			$data['interest4'] = $this->rm->count_interest4();
			$data['interest5'] = $this->rm->count_interest5();
			$data['interest6'] = $this->rm->count_interest6();
			$data['interest7'] = $this->rm->count_interest7();
			$this->load->model('adminmodel', 'adm');
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports6', $data);
			$this->load->view('aPartials/footer');
		}
	}
}