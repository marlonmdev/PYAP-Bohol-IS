<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reasonfilteredcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('reasonfilteredmodel', 'rfm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

    function filter_lgu_tabular_reason_for_dropping_report(){
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
			$mun = $this->rfm->get_municipal_id($municipal);
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
				$data['content'] = $this->rfm->get_lgu_tabular_quarter_reason_report($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports3_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['content'] = $this->rfm->get_lgu_tabular_annual_reason_report($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/treports3_filtered', $data);
				$this->load->view('sPartials/footer');
			}
        }
    }

    function filter_lgu_graphical_reason_for_dropping_report(){
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
			$mun = $this->rfm->get_municipal_id($municipal);
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
				$data['reason1'] = $this->rfm->count_quarter_lgu_drop_reason1($mun_id, $startDate, $endDate);
	            $data['reason2'] = $this->rfm->count_quarter_lgu_drop_reason2($mun_id, $startDate, $endDate);
	            $data['reason3'] = $this->rfm->count_quarter_lgu_drop_reason3($mun_id, $startDate, $endDate);
	            $data['reason4'] = $this->rfm->count_quarter_lgu_drop_reason4($mun_id, $startDate, $endDate);
	            $data['reason5'] = $this->rfm->count_quarter_lgu_drop_reason5($mun_id, $startDate, $endDate);
				$data['repType'] = $reportType;
				$data['fQuarter'] = $quarter;
				$data['fYear'] = $year;
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports5_filtered', $data);
				$this->load->view('sPartials/footer');
			}elseif($reportType == 'Annual'){
				$data['repType'] = $reportType;
				$data['fYear'] = $this->input->post('repYear');
				$startYear = '1-January-2017';
				$endYear = '31-December-'.$this->input->post('repYear');
				$data['reason1'] = $this->rfm->count_annual_lgu_drop_reason1($mun_id, $startYear, $endYear);
	            $data['reason2'] = $this->rfm->count_annual_lgu_drop_reason2($mun_id, $startYear, $endYear);
	            $data['reason3'] = $this->rfm->count_annual_lgu_drop_reason3($mun_id, $startYear, $endYear);
	            $data['reason4'] = $this->rfm->count_annual_lgu_drop_reason4($mun_id, $startYear, $endYear);
	            $data['reason5'] = $this->rfm->count_annual_lgu_drop_reason5($mun_id, $startYear, $endYear);
				$this->load->view('sPartials/header');
				$this->load->view('staff/greports5_filtered', $data);
				$this->load->view('sPartials/footer');
			}
        }
    }


}