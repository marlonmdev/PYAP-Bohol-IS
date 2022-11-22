<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authcontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('authmodel', 'aum');
	}

	function user_login(){
		$uname = $this->input->post('uname');
		$pass = $this->input->post('pword');
		$result = $this->aum->get_login_info($uname);
		if($result){
			$verify = $this->_verify_hash($pass, $result->pword);
			$this->load->library('user_agent');
			$browse = $this->agent->browser();
			$version = $this->agent->version();
			$browser = $browse.' '.$version; 
			$ip_addr = $this->input->ip_address();
			$os = $this->agent->platform();
			$this->load->model('reportmodel', 'rm');
			$this->rm->update_barangays_with_pyap();
			if($result->uname == $uname && $verify == TRUE && $result->role == 'Administrator'){
				$this->session->unset_userdata('username');
				$name = $result->name;
				$email = $result->email;
				$role = $result->role;
				$municipal = $result->municipal;
				$this->aum->insert_log($name, $email, $role, $municipal, $browser, $ip_addr, $os);
				$info = array('id'=>$result->id, 'name'=> $result->name, 'position'=> $result->position, 'uname'=> $result->uname, 'role'=>'Administrator' ,'logged_in'=> TRUE);
				$this->session->set_userdata($info);
				redirect('admin/index');
			}elseif($result->uname == $uname && $verify == TRUE && $result->role == 'LGU User'){
				$this->session->unset_userdata('username');
				$name = $result->name;
				$email = $result->email;
				$role = $result->role;
				$municipal = $result->municipal;
				$this->aum->insert_log($name, $email, $role, $municipal, $browser, $ip_addr, $os);
				$info = array('id'=>$result->id, 'name'=> $result->name, 'position'=> $result->position, 'uname'=> $result->uname, 'role'=>'LGU User', 'municipal'=> $result->municipal, 'logged_in'=> TRUE);
				$this->session->set_userdata($info);	
				redirect('lgu/index');
			}else{
				$this->session->set_tempdata('username', $uname);
				$arr = array('error' => 'Incorrect password');
				$this->session->set_flashdata($arr);
				redirect('login');
			}
		}else{
			$this->session->unset_userdata('username');
			$arr = array('error' => 'Incorrect username and password');
			$this->session->set_flashdata($arr);
			redirect('login');
		}
	}

	private function _verify_hash($plain_text_str, $hashed_string){
		$result = password_verify($plain_text_str, $hashed_string);
		return $result;
	}

	function generate_random_string(){
		$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		$randomString = '';
		for($i=0;$i < 10;$i++){
			$randomString .= $characters[rand(0, strlen($characters) -1 )];
		}
		return $randomString;
	}

	function admin_logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function staff_logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}	
	