<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('adminmodel', 'adm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') {
            return true;
        }
    }

    private function _verify_hash($plain_text_str, $hashed_string){
		$result = password_verify($plain_text_str, $hashed_string);
		return $result;
	}

    function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            header('location:http://'.$_SERVER['SERVER_NAME']);
        }
        exit();
    }

    function index(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$data['members'] = $this->adm->count_all_members();
			$all = $this->adm->count_all_members();
			$male = $this->adm->count_all_male();
			$female = $this->adm->count_all_female();
			$osy = $this->adm->count_all_OSY();
			$isy = $this->adm->count_all_ISY();
			$data['male'] = $male;
			$data['female'] = $female;
			$data['male_percentage'] = round(($male/$all)*100);
			$data['female_percentage'] = round(($female/$all)*100);
			$data['osy_percentage'] = round(($osy/$all)*100);
			$data['isy_percentage'] = round(($isy/$all)*100);
			$data['announcements'] = $this->adm->count_all_announcements();
			$data['accounts'] = $this->adm->count_all_accounts();
			$this->load->view('aPartials/header');
			$this->load->view('admin/index', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function home(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$data['members'] = $this->adm->count_all_members();
			$all = $this->adm->count_all_members();
			$male = $this->adm->count_all_male();
			$female = $this->adm->count_all_female();
			$osy = $this->adm->count_all_OSY();
			$isy = $this->adm->count_all_ISY();
			$data['male'] = $male;
			$data['female'] = $female;
			$data['male_percentage'] = round(($male/$all)*100);
			$data['female_percentage'] = round(($female/$all)*100);
			$data['osy_percentage'] = round(($osy/$all)*100);
			$data['isy_percentage'] = round(($isy/$all)*100);
			$data['announcements'] = $this->adm->count_all_announcements();
			$data['accounts'] = $this->adm->count_all_accounts();
			$this->load->view('aPartials/header');
			$this->load->view('admin/home', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function members(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->library('pagination');
			$config['base_url'] = base_url().'admin/members';
			$config['uri_segment'] = 3;
			$config['per_page'] = 15;
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
			$data['muns'] = $this->mm->get_all_municipals($config['per_page'], $page);
			$config['total_rows'] = $this->mm->get_municipal_total_rows();
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/members', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function view_municipal_barangays(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$mun_id = $this->uri->segment(5);	
			$this->load->model('membermodel', 'mm');
			$data['mun'] = $this->mm->get_municipal_by_id($mun_id);
			$data['brgys'] = $this->mm->fetch_municipal_barangays($mun_id);
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/members_brgys', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function announcements(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{	
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->model('announcementmodel', 'anm');
			$data['content'] = $this->anm->get_all_announcements();
			$this->load->view('aPartials/header');
			$this->load->view('admin/announcements', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function accounts(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$data['content'] = $this->acm->get_all_accounts();
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/accounts', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function login_history(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$data['content'] = $this->adm->get_all_logs();
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/login_history', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function clear_login_history(){
		$result = $this->adm->clear_login_history();
		if($result){
			$arr = array('success' => 'Successfully clear login history');
			$this->session->set_flashdata($arr);
			$this->redirect_back();
		}else{
			$arr = array ('error' => 'Unable to clear login history');
			$this->session->set_flashdata($arr);
			$this->redirect_back();
		}
	}

	function treports(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->model('reportmodel', 'rm');
			$data['content'] = $this->rm->get_members_summary();
			$data['total_brgys'] = $this->rm->count_total_barangays();
			$data['total_brgys_pyap'] = $this->rm->count_total_barangays_with_pyap();
			$data['total_members'] = $this->rm->count_total_members();
			$data['total_age_bracket1'] = $this->rm->count_total_age_bracket1();
			$data['total_age_bracket2'] = $this->rm->count_total_age_bracket2();
			$data['total_age_bracket3'] = $this->rm->count_total_age_bracket3();
			$data['total_male_members'] = $this->rm->count_total_male_members();
			$data['total_female_members'] = $this->rm->count_total_female_members();
			$data['total_male_osy'] = $this->rm->count_total_male_osy();
			$data['total_female_osy'] = $this->rm->count_total_female_osy();
			$data['total_male_isy'] = $this->rm->count_total_male_isy();
			$data['total_female_isy'] = $this->rm->count_total_female_isy();
			$data['total_attainment1'] = $this->rm->count_total_attainment1();
			$data['total_attainment2'] = $this->rm->count_total_attainment2();
			$data['total_attainment3'] = $this->rm->count_total_attainment3();
			$data['total_attainment4'] = $this->rm->count_total_attainment4();
			$data['total_attainment5'] = $this->rm->count_total_attainment5();
			$data['total_attainment6'] = $this->rm->count_total_attainment6();
			$data['total_single_members'] = $this->rm->count_total_single_members();
			$data['total_married_members'] = $this->rm->count_total_married_members();
			$data['total_solo_members'] = $this->rm->count_total_solo_members();
			$data['total_income1'] = $this->rm->count_total_monthly_income1();
			$data['total_income2'] = $this->rm->count_total_monthly_income2();
			$data['total_income3'] = $this->rm->count_total_monthly_income3();
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/treports', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function greports(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$this->load->model('accountmodel', 'acm');
			$id = $this->session->userdata('id');
			$data['usr'] = $this->acm->fetch_account($id);
			$this->load->model('reportmodel', 'rm');
			$data['content'] = $this->rm->get_municipal_members_count();
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$this->load->view('aPartials/header');
			$this->load->view('admin/greports4', $data);
			$this->load->view('aPartials/footer');
		}
	}


	function settings(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$data['sign1'] = $this->adm->fetch_signatory1();
			$data['sign2'] = $this->adm->fetch_signatory2();
			$data['cont'] = $this->adm->fetch_site_contacts();
			$this->load->view('aPartials/header');
			$this->load->view('admin/settings', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function add_update_signatory1(){
		$id = $this->uri->segment(4);
		if(!is_numeric($id))
		{
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}
		else
		{
			$pass = $this->input->post('password');
			$this->load->model('accountmodel', 'acm');
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{
				$check = $this->adm->check_signatory1();
				$sigNum = 1;
				$name = ucwords($this->input->post('name'));
				$position = ucwords($this->input->post('position'));
				if($check){
					$change = $this->adm->update_signatory1($sigNum, $name, $position);
					if($change)
					{
						$arr = array ('success' => 'Signatory 1 updated successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Signatory 1 update failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}else{	
					$change = $this->adm->add_signatory1($sigNum, $name, $position);
					if($change)
					{
						$arr = array ('success' => 'Signatory 1 added successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Signatory 1 add failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}	
			}
			else
			{
				$arr = array ('error' => 'Password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}

	function add_update_signatory2(){
		$id = $this->uri->segment(4);
		if(!is_numeric($id))
		{
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}
		else
		{
			$pass = $this->input->post('password');
			$this->load->model('accountmodel', 'acm');
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{
				$check = $this->adm->check_signatory2();
				$sigNum = 2;
				$name = ucwords($this->input->post('name'));
				$position = ucwords($this->input->post('position'));
				if($check){
					$change = $this->adm->update_signatory2($sigNum, $name, $position);
					if($change)
					{
						$arr = array ('success' => 'Signatory 2 updated successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Signatory 2 update failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}else{	
					$change = $this->adm->add_signatory2($sigNum, $name, $position);
					if($change)
					{
						$arr = array ('success' => 'Signatory 2 added successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Signatory 2 add failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}	
			}
			else
			{
				$arr = array ('error' => 'Password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}

	function add_update_site_contacts(){
		$id = $this->uri->segment(4);
		if(!is_numeric($id))
		{
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}
		else
		{
			$pass = $this->input->post('password');
			$this->load->model('accountmodel', 'acm');
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{
				$check = $this->adm->check_site_contacts();
				$telNo = $this->input->post('telNo');
				$conEmail = $this->input->post('conEmail');
				if($check){
					$cont = $this->adm->fetch_site_contacts();
					$id = $cont->id;
					$change = $this->adm->update_site_contacts($telNo, $conEmail, $id);
					if($change)
					{
						$arr = array ('success' => 'Site contacts updated successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Site contacts update failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}else{	
					$change = $this->adm->add_site_contacts($telNo, $conEmail);
					if($change)
					{
						$arr = array ('success' => 'Site contacts added successfully');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
					else
					{
						$arr = array ('error' => 'Site contacts add failed');
						$this->session->set_flashdata($arr);
						$this->redirect_back();
					}
				}	
			}
			else
			{
				$arr = array ('error' => 'Password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}

	function help(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/help', $data);
			$this->load->view('aPartials/footer');
		}
	}

}
