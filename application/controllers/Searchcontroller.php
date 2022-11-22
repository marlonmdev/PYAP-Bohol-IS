<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchcontroller extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('searchmodel', 'sm');
		$this->load->library('pagination');
	}

	function permission1(){
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') 
        {
            return true;
        }
    }

    function permission2(){
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') 
        {
            return true;
        }
    }

    function admin_load_records($rowno=0){
    	if (!$this->permission1()) {
			redirect(base_url().'login');
		}else{
	    	$search_text = "";
	    	if($this->input->post('searchbox') != NULL){
	    		$search_text = $this->input->post('searchbox');
	    		$this->session->set_userdata(array("search"=>$search_text));
	    	}else{
	    		if($this->session->userdata('search') != NULL){
	    			$search_text = $this->session->userdata('search');
	    		}
	    	}
	    	$rowperpage = 10;
	    	if($rowno != 0){
	    		$rowno = ($rowno-1) * $rowperpage;
	    	}
	    	$allcount = $this->sm->admin_get_records_count($search_text);
	    	$users_record = $this->sm->admin_get_data($rowno, $rowperpage, $search_text);
	    	$config['base_url'] = base_url().'admin/members/search/data';
			$config['user_page_number'] = TRUE;
			$config['total_rows'] = $allcount;
			$config['per_page'] = $rowperpage;
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
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['search'] = $search_text;
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/member_search', $data);
			$this->load->view('aPartials/footer');
		}
    }

    function lgu_load_records($rowno=0){
    	if (!$this->permission2()) {
			redirect(base_url().'login');
		}else{
	    	$search_text = "";
	    	if($this->input->post('searchbox') != NULL){
	    		$search_text = $this->input->post('searchbox');
	    		$this->session->set_userdata(array("search"=>$search_text));
	    	}else{
	    		if($this->session->userdata('search') != NULL){
	    			$search_text = $this->session->userdata('search');
	    		}
	    	}
	    	$rowperpage = 10;
	    	if($rowno != 0){
	    		$rowno = ($rowno-1) * $rowperpage;
	    	}
	    	$municipal = $this->session->userdata('municipal');
	    	$allcount = $this->sm->lgu_get_records_count($search_text, $municipal);
	    	$users_record = $this->sm->lgu_get_data($rowno, $rowperpage, $search_text, $municipal);
	    	$config['base_url'] = base_url().'lgu/members/search/data';
			$config['user_page_number'] = TRUE;
			$config['total_rows'] = $allcount;
			$config['per_page'] = $rowperpage;
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
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['search'] = $search_text;
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['usr'] = $this->acm->fetch_account($uid);
			$this->load->view('sPartials/header');
			$this->load->view('staff/member_search', $data);
			$this->load->view('sPartials/footer');
		}
    }


	// function admin_search_member(){
	// 	if (!$this->permission1()) {
	// 		redirect(base_url().'login');
	// 	}else{
	// 		$keyword = $this->input->post('searchbox');
	// 		$this->session->set_userdata('adm_keyword', $keyword);
	// 		$adm_keyword = $this->session->userdata('adm_keyword');
	// 		$this->admin_members_view($adm_keyword);
	// 	}
	// }

	// function admin_members_view($adm_keyword){
	// 	if (!$this->permission1()) {
	// 		redirect(base_url().'login');
	// 	}else{
	// 		$this->load->library('pagination');
	// 		$config['base_url'] = base_url().'admin/members/search/data';
	// 		$config['uri_segment'] = 5;
	// 		$config['per_page'] = 15;
	// 		//pagination style
	// 		$config['first_link'] = 'First';
	// 		$config['first_tag_open'] = '<li>';
	// 		$config['first_tag_close'] = '</li>';
	// 		$config['last_link'] = 'Last';
	// 		$config['last_tag_open'] = '<li>';
	// 		$config['last_tag_close'] = '</li>';
	// 		$config['prev_link'] = '<span class="ti-angle-double-left"></span>';
	// 		$config['prev_tag_open'] = '<li>';
	// 		$config['prev_tag_close'] = '</li>';
	// 		$config['next_link'] = '<span class="ti-angle-double-right"></span>';
	// 		$config['next_tag_open'] = '<li>';
	// 		$config['next_tag_close'] = '</li>';
	// 		$config['num_tag_open'] = '<li>';
	// 		$config['num_tag_close'] = '</li>';
	// 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	// 		$config['cur_tag_close'] = '</a></li>';
	// 		$page = $this->uri->segment(5, 0);	
	// 		$data['members']= $this->sm->admin_fetch_members($adm_keyword, $config['per_page'], $page);
	// 		$config['total_rows'] = $this->sm->get_members_total_rows();	
	// 		$this->pagination->initialize($config);
	// 		$data['pagination'] = $this->pagination->create_links();
	// 		$uid = $this->session->userdata('id');
	// 		$this->load->model('accountmodel', 'acm');
	// 		$data['usr'] = $this->acm->fetch_account($uid);
	// 		$this->load->view('aPartials/header');
	// 		$this->load->view('admin/member_search', $data);
	// 		$this->load->view('aPartials/footer');
	// 	}
	// }


	// function lgu_search_member(){
	// 	if (!$this->permission2()) {
	// 		redirect(base_url().'login');
	// 	}else{
	// 		$keyword = $this->input->post('searchbox');
	// 		$this->session->set_userdata('lgu_keyword', $keyword);
	// 		$lgu_keyword = $this->session->userdata('lgu_keyword');
	// 		$this->lgu_members_view($lgu_keyword);
	// 	}
	// }

	// function lgu_members_view($lgu_keyword){
	// 	if (!$this->permission2()) {
	// 		redirect(base_url().'login');
	// 	}else{
	// 		$this->load->library('pagination');
	// 		$config['base_url'] = base_url().'lgu/members/search/data';
	// 		$config['uri_segment'] = 5;
	// 		$config['per_page'] = 15;
	// 		//pagination style
	// 		$config['first_link'] = 'First';
	// 		$config['first_tag_open'] = '<li>';
	// 		$config['first_tag_close'] = '</li>';
	// 		$config['last_link'] = 'Last';
	// 		$config['last_tag_open'] = '<li>';
	// 		$config['last_tag_close'] = '</li>';
	// 		$config['prev_link'] = '<span class="ti-angle-double-left"></span>';
	// 		$config['prev_tag_open'] = '<li>';
	// 		$config['prev_tag_close'] = '</li>';
	// 		$config['next_link'] = '<span class="ti-angle-double-right"></span>';
	// 		$config['next_tag_open'] = '<li>';
	// 		$config['next_tag_close'] = '</li>';
	// 		$config['num_tag_open'] = '<li>';
	// 		$config['num_tag_close'] = '</li>';
	// 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	// 		$config['cur_tag_close'] = '</a></li>';
	// 		$page = $this->uri->segment(5, 0);	
	// 		$municipal = $this->session->userdata('municipal');
	// 		$data['members'] = $this->sm->lgu_fetch_members($lgu_keyword, $municipal, $config['per_page'], $page);
	// 		$config['total_rows'] = $this->sm->get_members_total_rows();	
	// 		$this->pagination->initialize($config);
	// 		$data['pagination'] = $this->pagination->create_links();
	// 		$uid = $this->session->userdata('id');
	// 		$this->load->model('accountmodel', 'acm');
	// 		$data['row'] = $this->acm->fetch_account($uid);
	// 		$this->load->view('sPartials/header');
	// 		$this->load->view('staff/member_search', $data);
	// 		$this->load->view('sPartials/footer');
	// 	}
	// }

}