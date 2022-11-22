<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activitycontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('activitymodel', 'am');
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

	function add_activity(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['row'] = $this->acm->fetch_account($uid);
			$data['municipal'] = $this->session->userdata('municipal');
			$this->load->view('sPartials/header');
			$this->load->view('staff/add_activity', $data);
			$this->load->view('sPartials/footer');
		}
	}

	function save_activity(){
		$config_image = array();
		$config_image['upload_path'] = './pictures/';
		$config_image['allowed_types'] = 'jpg|png|gif';
		$config_image['encrypt_name'] = TRUE;
		$aname = ucwords($this->input->post('aname'));
		$descr = $this->input->post('descr');
		$afrom = $this->input->post('afrom');
		$ato = $this->input->post('ato');
		$municipal = ucwords($this->input->post('municipal'));
		$budget = $this->input->post('budget');
		$this->load->library('upload',$config_image);
		$this->upload->do_upload();
		$data = array('upload_data' => $this->upload->data());
		$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
		$pic = $data['upload_data']['file_name'];
		if($pic == ''){
			$image = 'default.png';
		}else{
			$image = $data['upload_data']['file_name'];
		}
		$result = $this->am->insert_activity($aname, $descr, $afrom, $ato, $municipal, $budget, $image);
		if($result){
			$arr = array ('success' => 'Activity Added Successfully');
			$this->session->set_flashdata($arr);
			redirect('lgu/activities');
		}else{
			$arr = array ('error' => 'Activity Add Failed');
			$this->session->set_flashdata($arr);
			redirect('lgu/activities');
		}
	}

	function image_resize($path, $file){
		$config_resize = array();
		$config_resize['image_library'] = 'gd2';
		$config_resize['source_image'] = $path;
		$config_resize['maintain_ratio'] = TRUE;
		$config_resize['width'] = '140';
		$config_resize['height'] = '130';
		$config_resize['new_image'] = './pictures/thumbs/'.$file;
		$this->load->library('image_lib', $config_resize);
		$this->image_lib->resize();
	}

	function edit_activity(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(5);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$uid = $this->session->userdata('id');
				$this->load->model('accountmodel', 'acm');
				$data['row'] = $this->acm->fetch_account($uid);
				$data['content'] = $this->am->get_activity_by_id($id);
				$this->load->view('sPartials/header');
				$this->load->view('staff/edit_activity', $data);
				$this->load->view('sPartials/footer');
			}
		}
	}

	function update_activity(){
		$config_image = array();
		$config_image['upload_path'] = './pictures/';
		$config_image['allowed_types'] = 'jpg|png|gif';
		$config_image['encrypt_name'] = TRUE;
		$id = $this->uri->segment(5);
		if(!is_numeric($id)){
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}else{
			$aname = ucwords($this->input->post('aname'));
			$descr = $this->input->post('descr');
			$afrom = $this->input->post('afrom');
			$ato = $this->input->post('ato');
			$municipal = ucwords($this->input->post('municipal'));
			$budget = $this->input->post('budget');
			$this->load->library('upload',$config_image);
			$this->upload->do_upload();
			$data = array('upload_data' => $this->upload->data());
			$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
			$pic = $data['upload_data']['file_name'];
			$result= $this->am->get_activity_by_id($id);
			if($pic == ''){
				$image = $result->pic;
			}else{
				$bigdefaultpic_path = './pictures/default.png';
				$smalldefaultpic_path = './pictures/thumbs/default.png';
				$bigpic_path = './pictures/'.$result->pic;
				$smallpic_path = './pictures/thumbs/'.$result->pic;
				if($bigpic_path != $bigdefaultpic_path){
					if(file_exists($bigpic_path)){
						unlink($bigpic_path);
					}
				}
				if($smallpic_path != $smalldefaultpic_path){
					if(file_exists($smallpic_path)){
						unlink($smallpic_path);
					}
				}
				$image = $data['upload_data']['file_name'];
			}

			$result = $this->am->update_activity($id, $aname, $descr, $afrom, $ato, $municipal, $budget, $image);
			if($result){
				$arr = array ('success' => 'Activity Updated Successfully');
				$this->session->set_flashdata($arr);
				redirect('lgu/activities');
			}else{
				$arr = array ('error' => 'Activity Update Failed !');
				$this->session->set_flashdata($arr);
				redirect('lgu/activities');
			}
		}
	}

	function delete_activity(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
	        $id = $this->uri->segment(5);
	        if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}else{
				$value = $this->am->get_activity_by_id($id);
				if($value->pic != 'default.png'){
					$big_pic_path = './pictures/'.$value->pic;
					$small_pic_path = './pictures/thumbs/'.$value->pic;
					if(file_exists($big_pic_path) && file_exists($small_pic_path)){
						unlink($big_pic_path);
						unlink($small_pic_path);
					}
				}
				$result = $this->am->activity_delete($id);
				if($result){
					$arr = array ('success' => 'Activity Deleted Successfully');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else{
					$arr = array ('error' => 'Activity Delete Failed!');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}

}
