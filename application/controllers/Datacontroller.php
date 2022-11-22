<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('datamodel', 'dm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            header('location:http://'.$_SERVER['SERVER_NAME']);
        }
        exit();
    }

	function save_identifying_data(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$postData = $this->input->post();
			$verified = $this->dm->verify_member($postData);
			if($verified){
				$arr = array ('error' => 'Oops, this youth is already a member');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}else{
				$config_image = array();
				$config_image['upload_path'] = './members/';
				$config_image['allowed_types'] = 'jpg|png|gif';
				$config_image['encrypt_name'] = TRUE;
				$civilStat = $this->input->post('civilStat');
				$municipal = $this->session->userdata('municipal');
				$mun = $this->dm->get_municipal($municipal);
				$mun_id = $mun->mun_id;
				$brgy = $this->input->post('brgy');
				$barangay = $this->dm->get_barangay_id($brgy, $mun_id);
				$brgy_id = $barangay->brgy_id;
				$staff = $this->session->userdata('name');
				$this->load->library('upload', $config_image);
				$this->upload->do_upload();
				$data = array('upload_data' => $this->upload->data());
				$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				$pic = $data['upload_data']['file_name'];
				if($pic == '')
				{
					$photo = 'default.png';
				}
				else
				{
					$photo = $data['upload_data']['file_name'];
				}
				$result = $this->dm->insert_identifying_data($brgy_id, $mun_id, $postData, $staff, $photo);
				if($result){ 
					$mid = $this->db->insert_id();
					$count = $this->dm->count_members($brgy_id);
					if($count == 1){
						$this->dm->update_barangay_pyap($brgy_id);
					}
					redirect('lgu/members/add/siblings/'.$mid);
				}else{
					$arr = array ('error' => 'Unable to save data');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

	function image_resize($path, $file){
		$config_resize = array();
		$config_resize['image_library'] = 'gd2';
		$config_resize['source_image'] = $path;
		$config_resize['maintain_ratio'] = TRUE;
		$config_resize['width'] = '225';
		$config_resize['height'] = '215';
		$config_resize['new_image'] = './members/thumbs/'.$file;
		$this->load->library('image_lib', $config_resize);
		$this->image_lib->resize();
	}

	function add_siblings(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$mem = $this->dm->get_member_ids($mid);
				$pic_path = './members/'.$mem->photo;
				$defaultpic_path = './members/default.png';
				if($pic_path != $defaultpic_path){
					if(file_exists($pic_path)){
						unlink($pic_path);
					}
				}
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_siblings', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_siblings(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$postData = $this->input->post();
				$result = $this->dm->insert_siblings($mid, $postData);
				if($result){
				redirect('lgu/members/add/educational_background/'.$mid);
				}else{
					$arr = array ('error' => 'Unable to save data');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

	function add_educational_background(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_educational_background', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_educational_background(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$postData = $this->input->post();
				$eStat = $this->input->post('eStat');
				$sStat = $this->input->post('sStat');
				$cStat = $this->input->post('cStat');
				$result = $this->dm->insert_educational_background($mid, $postData);
				if($result){
					if($cStat == 'Graduated' || $cStat == 'Graduated' && $sStat == 'Graduated' && $eStat == 'Graduated'){
						$educStat = 'Graduated';
						$this->save_col_attainment2($mid, $educStat);
						$this->save_reasons_for_dropping3($mid);
					}elseif($cStat == 'Out of School' || $cStat == 'Out of School' && $sStat == 'Out of School' && $eStat == 'Out of School'){
						$educStat = 'OSY';
						$this->save_col_attainment1($mid, $educStat);
						$this->save_reasons_for_dropping3($mid);
					}elseif($cStat == 'In School'){
						$educStat = 'ISY';
						$this->save_col_attainment1($mid, $educStat);
					}elseif($sStat == 'Graduated' || $sStat == 'Graduated' && $eStat == 'Graduated'){
						$educStat = 'OSY';
						$this->save_hs_attainment2($mid, $educStat);
					}elseif($sStat == 'Out of School' || $sStat == 'Out of School' && $eStat == 'Out of School'){
						$educStat = 'OSY';
						$this->save_hs_attainment1($mid, $educStat);
						$this->save_reasons_for_dropping2($mid);
					}elseif($sStat == 'In School'){
						$educStat = 'ISY';
						$this->save_hs_attainment1($mid, $educStat);
					}elseif($eStat == 'Graduated'){
						$educStat = 'OSY';
						$this->save_elem_attainment2($mid, $educStat);
					}elseif($eStat == 'Out of School'){
						$educStat = 'OSY';
						$this->save_elem_attainment1($mid, $educStat);
						$this->save_reasons_for_dropping1($mid);
					}elseif($eStat == 'In School'){
						$educStat = 'ISY';
						$this->save_elem_attainment1($mid, $educStat);
					}
					redirect('lgu/members/add/special_skills/'.$mid);
				}else{
					$arr = array ('error' => 'Unable to save data');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

	function save_elem_attainment1($mid, $educStat){
		$elemLevel = 1;
		$elemGrad = 0;
		$hsLevel = 0;
		$hsGrad = 0;
		$colLevel = 0;
		$colGrad = 0;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_elem_attainment2($mid, $educStat){
		$elemLevel = 0;
		$elemGrad = 1;
		$hsLevel = 0;
		$hsGrad = 0;
		$colLevel = 0;
		$colGrad = 0;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_hs_attainment1($mid, $educStat){
		$elemLevel = 0;
		$elemGrad = 0;
		$hsLevel = 1;
		$hsGrad = 0;
		$colLevel = 0;
		$colGrad = 0;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_hs_attainment2($mid, $educStat){
		$elemLevel = 0;
		$elemGrad = 0;
		$hsLevel = 0;
		$hsGrad = 1;
		$colLevel = 0;
		$colGrad = 0;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_col_attainment1($mid, $educStat){
		$elemLevel = 0;
		$elemGrad = 0;
		$hsLevel = 0;
		$hsGrad = 0;
		$colLevel = 1;
		$colGrad = 0;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_col_attainment2($mid, $educStat){
		$elemLevel = 0;
		$elemGrad = 0;
		$hsLevel = 0;
		$hsGrad = 0;
		$colLevel = 0;
		$colGrad = 1;
		$this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
	}

	function save_reasons_for_dropping1($mid){
		$eFinProb = $this->input->post('eFinProb');
		if(empty($eFinProb)){ $eFinProb = 0; }
		$eNInterest = $this->input->post('eNInterest');
		if(empty($eNInterest)){ $eNInterest = 0; }
		$eFamProb = $this->input->post('eFamProb');
		if(empty($eFamProb)){ $eFamProb = 0; }
		$eEPreg = $this->input->post('eEPreg');
		if(empty($eEPreg)){ $eEPreg = 0; }
		$eHProb = $this->input->post('eHProb');
		if(empty($eHProb)){ $eHProb = 0; }
		$level = 'Elementary';
		$this->dm->insert_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb);
	}

	function save_reasons_for_dropping2($mid){
		$sFinProb = $this->input->post('sFinProb');
		if(empty($sFinProb)){ $sFinProb = 0; }
		$sNInterest = $this->input->post('sNInterest');
		if(empty($sNInterest)){ $sNInterest = 0; }
		$sFamProb = $this->input->post('sFamProb');
		if(empty($sFamProb)){ $sFamProb = 0; }
		$sEPreg = $this->input->post('sEPreg');
		if(empty($sEPreg)){ $sEPreg = 0; }
		$sHProb = $this->input->post('sHProb');
		if(empty($sHProb)){ $sHProb = 0; }
		$cFinProb = $this->input->post('cFinProb');
		$level = 'Secondary';
		$this->dm->insert_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb);
	}

	function save_reasons_for_dropping3($mid){
		$cFinProb = $this->input->post('cFinProb');
		if(empty($cFinProb)){ $cFinProb = 0; }
		$cNInterest = $this->input->post('cNInterest');
		if(empty($cNInterest)){ $cNInterest = 0; }
		$cFamProb = $this->input->post('cFamProb');
		if(empty($cFamProb)){ $cFamProb = 0; }
		$cEPreg = $this->input->post('cEPreg');
		if(empty($cEPreg)){ $cEPreg = 0; }
		$cHProb = $this->input->post('cHProb');
		if(empty($cHProb)){ $cHProb = 0; }
		$level = 'College';
		$this->dm->insert_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb);
	}

	function add_special_skills(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_special_skills', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_special_skills(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$none = $this->input->post('none');
				if(empty($none)){ $none = 0; }
				$agri = $this->input->post('agri');
				if(empty($agri)){ $agri = 0; }
				$tech = $this->input->post('tech');
				if(empty($tech)){ $tech = 0; }
				$construct = $this->input->post('construct');
				if(empty($construct)){ $construct = 0; }
				$singing = $this->input->post('singing');
				if(empty($singing)){ $singing = 0; }
				$dancing = $this->input->post('dancing');
				if(empty($dancing)){ $dancing = 0; }
				$dancing = $this->input->post('dancing');
				if(empty($dancing)){ $dancing = 0; }
				$carpentry = $this->input->post('carpentry');
				if(empty($carpentry)){ $carpentry = 0; }
				$computer = $this->input->post('computer');
				if(empty($computer)){ $computer = 0; }
				$drawing = $this->input->post('drawing');
				if(empty($drawing)){ $drawing = 0; }
				$dress = $this->input->post('dress');
				if(empty($dress)){ $dress = 0; }
				$sports = $this->input->post('sports');
				if(empty($sports)){ $sports = 0; }
				$arts = $this->input->post('arts');
				if(empty($arts)){ $arts = 0; }
				$music = $this->input->post('music');
				if(empty($music)){ $music = 0; }
				$business = $this->input->post('business');
				if(empty($business)){ $business = 0; }
				$swimming = $this->input->post('swimming');
				if(empty($swimming)){ $swimming = 0; }
				$writing = $this->input->post('writing');
				if(empty($writing)){ $writing = 0; }
				$result = $this->dm->insert_special_skills($mid, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing);
				if($result){
					redirect('lgu/members/add/interest_hobbies/'.$mid);
				}else{
					$arr = array ('error' => 'Unable to save data');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

	function add_interest_hobbies(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_interest_hobbies', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_interest_hobbies(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$internet = $this->input->post('internet');
				if(empty($internet)){ $internet = 0; }
				$watch = $this->input->post('watch');
				if(empty($watch)){ $watch = 0; }
				$sports = $this->input->post('sports');
				if(empty($sports)){ $sports = 0; }
				$music = $this->input->post('music');
				if(empty($music)){ $music = 0; }
				$arts = $this->input->post('arts');
				if(empty($arts)){ $arts = 0; }
				$singing = $this->input->post('singing');
				if(empty($singing)){ $singing = 0; }
				$dancing = $this->input->post('dancing');
				if(empty($dancing)){ $dancing = 0; }
				$result = $this->dm->insert_interest_hobbies($mid, $internet, $watch, $sports, $music, $arts, $singing, $dancing);
				if($result){
					redirect('lgu/members/add/work_labor_experience/'.$mid);
				}else{
					$arr = array ('error' => 'Unable to save data');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

	function add_work_labor_experience(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_work_labor_experience', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_work_labor_experience(){
		if (!$this->permission()) {
			redirect(basroute_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$postData = $this->input->post();
				if($postData != null){
					$result = $this->dm->insert_work_labor_experience($mid, $postData);
					if($result){
						redirect('lgu/members/add/membership_on_organizations/'.$mid);
					}else{
						$arr = array ('error' => 'Unable to save data');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}else{
					redirect('lgu/members/add/membership_on_organizations/'.$mid);
				}
			}
		}
	}

	function add_membership_on_organizations(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(5);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['id'] = $mid;
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$this->load->view('uPartials/header');
				$this->load->view('users/add_membership_on_organizations', $data);
				$this->load->view('uPartials/footer');
			}
		}
	}

	function save_membership_on_organizations(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$mid = $this->uri->segment(6);
			if(!is_numeric($mid)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$postData = $this->input->post();
				if(!empty($postData)){
					$result = $this->dm->insert_membership_on_organizations($mid, $postData);
					if($result){
						$arr = array ('success' => 'Successfully saved datas');
						$this->session->set_flashdata($arr);
						redirect('lgu/members');
					}else{
						$arr = array ('error' => 'Unable to save data');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}else{
					$arr = array ('success' => 'Successfully saved datas');
					$this->session->set_flashdata($arr);
					redirect('lgu/members');
				}
			}
		}
	}


}