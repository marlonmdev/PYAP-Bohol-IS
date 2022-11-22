<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagecontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('pagemodel', 'pm');
	}

	function index(){
		$this->load->model('activitymodel', 'am');
		$data['content'] = $this->am->get_activities_to_home();
		$this->load->model('announcementmodel', 'anm');
		$data['results'] = $this->anm->get_announcements_to_home();
		$data['cont'] = $this->pm->fetch_site_contacts();
		$this->session->unset_userdata('username');
		$this->load->view('partials/header');
		$this->load->view('pages/navigation');
		$this->load->view('pages/home', $data);
		$this->load->view('partials/footer');
	}

	function create_account(){
		$name = $this->config->item('default_name');
		$role = $this->config->item('default_role');
		$municipal = $this->config->item('default_municipality');
		$position = $this->config->item('default_position');
		$uname = $this->config->item('default_username');
		$email = $this->config->item('default_email');
		$phone = $this->config->item('default_phone');
		$pword = $this->config->item('default_password');
		$photo = $this->config->item('default_photo');
		$hashed_pword = $this->_hash_string($pword);
		$this->load->model('accountmodel', 'acm');
		$this->acm->account_insert($photo, $name, $position, $role, $municipal, $uname, $email, $phone, $hashed_pword);
	}

	private function _hash_string($str){
		$hashed_string = password_hash($str, PASSWORD_BCRYPT, array('cost' => 12));
		return $hashed_string;
	}

	function login(){
		$this->load->model('accountmodel', 'acm');
		$result = $this->acm->get_current_accounts();
		if(!$result){
			$this->create_account();
			$this->load->view('partials/header');
			$this->load->view('pages/login');
			$this->load->view('partials/footer');
		}else{
			$this->pm->automatic_age_update();
			$this->load->view('partials/header');
			$this->load->view('pages/login');
			$this->load->view('partials/footer');
		}
	}

	function forgot_password(){
		$this->load->view('partials/header');
		$this->load->view('pages/forgot_password');
		$this->load->view('partials/footer');
	}

	function table(){
		$this->load->view('pages/datatables');
	}

	function activities_by_municipality(){
		$this->load->library('pagination');
		$filter = $this->uri->segment(4);
		$config['base_url'] = base_url().'view/activities/municipality/'.$filter;
		$config['uri_segment'] = 3;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<span class="ti-angle-double-left"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<span class="ti-angle-double-right"></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(5, 0);	

		$this->load->model('activitymodel', 'am');
		$data['content'] = $this->am->get_activities_by_municipal_to_home($filter, $config['per_page'], $page);
		$config['total_rows'] = $this->am->get_activities_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('partials/header');
		$this->load->view('pages/navigation');
		$this->load->view('pages/activities', $data);
		$this->load->view('partials/footer');
	}

	function activities(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'view/activities';
		$config['uri_segment'] = 3;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<span class="ti-angle-double-left"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<span class="ti-angle-double-right"></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(3, 0);	

		$this->load->model('activitymodel', 'am');
		$data['content'] = $this->am->get_all_activities($config['per_page'], $page);
		$config['total_rows'] = $this->am->get_activities_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('partials/header');
		$this->load->view('pages/navigation');
		$this->load->view('pages/activities', $data);
		$this->load->view('partials/footer');
	}

	function view_activity_by_id(){
	  	$id = $this->uri->segment(3);
        if(!is_numeric($id)){
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}else{
			$this->load->model('activitymodel', 'am');
			$result = $this->am->get_activity_by_id($id);
			$data['row'] = $this->am->get_activity_by_id($id);
			if(!$result){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$this->load->view('partials/header');
				$this->load->view('pages/navigation');
				$this->load->view('pages/activity', $data);
				$this->load->view('partials/footer');
			}
		}	
	}

	function announcements(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'view/announcements';
		$config['uri_segment'] = 3;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<span class="ti-angle-double-left"></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<span class="ti-angle-double-right"></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(3, 0);	

		$this->load->model('announcementmodel', 'anm');
		$data['content'] = $this->anm->view_all_announcements($config['per_page'], $page);
		$config['total_rows'] = $this->anm->get_announcements_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('partials/header');
		$this->load->view('pages/navigation');
		$this->load->view('pages/announcements', $data);
		$this->load->view('partials/footer');
	}

	function view_announcement_by_id(){
	  	$id = $this->uri->segment(3);
        if(!is_numeric($id)){
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}else{
			$this->load->model('announcementmodel', 'anm');
			$result = $this->anm->get_announcement_by_id($id);
			$data['row'] = $this->anm->get_announcement_by_id($id);
			if(!$result){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$this->load->view('partials/header');
				$this->load->view('pages/navigation');
				$this->load->view('pages/announcement', $data);
				$this->load->view('partials/footer');
			}
		}	
	}

}
