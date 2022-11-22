<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcementcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('announcementmodel', 'anm');
	}


	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') {
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

	function index(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/add_announcement', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function post_announcement(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$title = ucwords($this->input->post('title'));
			$descr = $this->input->post('descr');
			$posted_by = $this->session->userdata('role');
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$user = $this->acm->fetch_account($uid);
			$posted_by = $user->name;
			$check = $this->anm->insert_announcement($title, $descr, $posted_by);
			if($check){
				$arr = array ('success' => 'Announcement Posted Successfully!');
				$this->session->set_flashdata($arr);
				redirect('admin/announcements/add','refresh');
			}else{
				$arr = array ('error' => 'Announcement Post Failed!');
				$this->session->set_flashdata($arr);
				redirect('admin/announcements/add','refresh');
			}
		}
	}


	function edit_announcement(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(4);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$data['row'] = $this->anm->get_announcement_by_id($id);
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['usr'] = $this->acm->fetch_account($uid);
				$this->load->view('aPartials/header');
				$this->load->view('admin/edit_announcement', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function update_announcement(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(5);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$title = ucwords($this->input->post('title'));
				$descr = $this->input->post('descr');
				
				$check = $this->anm->update_announcement($id, $title, $descr);
				if($check){
					$arr = array ('success' => 'Announcement Updated Successfully!');
					$this->session->set_flashdata($arr);
					redirect('admin/announcements', 'refresh');
				}else{
					$arr = array ('error' => 'Announcement Update Failed!');
					$this->session->set_flashdata($arr);
					redirect('admin/announcements', 'refresh');
				}
			}
		}
	}

	function delete_announcement(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(4);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$result = $this->anm->announcement_delete($id);
				if($result){
					$arr = array ('success' => 'Announcement Deleted Successfully!');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else{
					$arr = array ('error' => 'Account Delete Failed!');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

}
