<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interestfilteredcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('interestfilteredmodel', 'ifm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

    function filter_lgu_tabular_interest_hobbies_report(){
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
			$mun = $this->ifm->get_municipal_id($municipal);
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
				$data['content'] = $this->ifm->get_lgu_tabular_quarter_interest_hobbies_report($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports4_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->ifm->get_lgu_tabular_annual_interest_hobbies_report($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports4_filtered', $data);
				$this->load->view('sPartials/footer');
			}
        }
    }

    function filter_lgu_graphical_interest_hobbies_report(){
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
			$mun = $this->ifm->get_municipal_id($municipal);
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
				$data['interest1'] = $this->ifm->count_quarter_lgu_graphical_interest1($mun_id, $startDate, $endDate);
	            $data['interest2'] = $this->ifm->count_quarter_lgu_graphical_interest2($mun_id, $startDate, $endDate);
	            $data['interest3'] = $this->ifm->count_quarter_lgu_graphical_interest3($mun_id, $startDate, $endDate);
	            $data['interest4'] = $this->ifm->count_quarter_lgu_graphical_interest4($mun_id, $startDate, $endDate);
	            $data['interest5'] = $this->ifm->count_quarter_lgu_graphical_interest5($mun_id, $startDate, $endDate);
	            $data['interest6'] = $this->ifm->count_quarter_lgu_graphical_interest6($mun_id, $startDate, $endDate);
	            $data['interest7'] = $this->ifm->count_quarter_lgu_graphical_interest7($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports6_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['interest1'] = $this->ifm->count_annual_lgu_graphical_interest1($mun_id, $startYear, $endYear);
	            $data['interest2'] = $this->ifm->count_annual_lgu_graphical_interest2($mun_id, $startYear, $endYear);
	            $data['interest3'] = $this->ifm->count_annual_lgu_graphical_interest3($mun_id, $startYear, $endYear);
	            $data['interest4'] = $this->ifm->count_annual_lgu_graphical_interest4($mun_id, $startYear, $endYear);
	            $data['interest5'] = $this->ifm->count_annual_lgu_graphical_interest5($mun_id, $startYear, $endYear);
	            $data['interest6'] = $this->ifm->count_annual_lgu_graphical_interest6($mun_id, $startYear, $endYear);
	            $data['interest7'] = $this->ifm->count_annual_lgu_graphical_interest7($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports6_filtered', $data);
				$this->load->view('sPartials/footer');
			}
        }
    }


}