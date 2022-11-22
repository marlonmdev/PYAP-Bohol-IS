<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquirycontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('inquirymodel', 'im');
	}

	function permission(){
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Admin') 
        {
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

	function send_inquiry(){
		$name = ucwords($this->input->post('name'));
		$email = $this->input->post('email');
		$msg = $this->input->post('msg');
		$send_at = date('F j, Y').' at '.date(' g:i a');
		$status = 'Pending';
		$result = $this->im->inquiry_insert($name, $email, $msg, $send_at, $status);
		if($result){
			$arr = array ('success' => 'Message sent successfully !');
			$this->session->set_flashdata($arr);
			redirect('/#contact');
		}else{
			$arr = array ('error' => 'Message send failed !');
			$this->session->set_flashdata($arr);
			redirect('/#contact');
		}
	}

	function delete_inquiry(){
		$id = $this->uri->segment(4);
		if(!is_numeric($id)){
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}else{
			$result = $this->im->inquiry_delete($id);
			if($result){
				$arr = array ('success' => 'Message Deleted Successfully!');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}
			else{
				$arr = array ('error' => 'Message Delete Failed!');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}
		}
	}

	function inquiry_reply(){
		$id = $this->uri->segment(4);
		if(!is_numeric($id)){
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}else{
			$uid = $this->session->userdata('id');
			$this->load->model('accountmodel', 'acm');
			$data['val'] = $this->acm->fetch_account($uid);
			$data['row'] = $this->im->get_inquiry_by_id($id);
			$data['pending'] = $this->im->get_pending_inquiries();
			$this->load->view('aPartials/header');
			$this->load->view('admin/inquiry_reply', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function send_reply(){
		if(!$this->permission()){
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(4);
			$to = $this->input->post('email');
			$message = $this->input->post('reply');
			// $msg.= '<p> Dear '.$name.' this is from the OPSWD here is the reply to your inquiry on our site <br></p>';
			$msg = '<p>'.$message.'</p>';
			$this->load->library('email');
			$this->email->from('m2igniter32@gmail.com', 'Admin');
			$this->email->to($to);
			$this->email->subject('Reply to your inquiry');
			$this->email->message($msg);
			$send = $this->email->send();
			if($send){
				$status = 'Replied';
				$this->im->update_inquiry_status($id, $status);
				$arr = array ('success' => 'Message send successfully');
				$this->session->set_flashdata($arr);
				redirect('admin/inquiries');
			}else{
				$error = show_error($this->email->print_debugger());
				$arr = array ('error' => $error);
				$this->session->set_flashdata($arr);
				redirect('admin/inquiries');
				// $arr = array ('error' => 'Message send failed');
				// $this->session->set_flashdata($arr);
				// redirect('admin/inquiries');
			}
		}
	}

}	
	