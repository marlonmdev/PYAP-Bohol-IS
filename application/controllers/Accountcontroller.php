<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountcontroller extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('accountmodel', 'acm');
	}

	function permission(){
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'Administrator') 
        {
            return true;
        }
    }

    private function _hash_string($str){
		$hashed_string = password_hash($str, PASSWORD_BCRYPT, array('cost' => 12));
		return $hashed_string;
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

	function index()
	{
		if (!$this->permission()) 
		{
			redirect(base_url().'login');
		}
		else
		{
			$data['rand'] = $this->generate_random_string();
			$uid = $this->session->userdata('id');
			$data['row'] = $this->acm->fetch_account($uid);
			$this->load->view('aPartials/header');
			$this->load->view('admin/add_account', $data);
			$this->load->view('aPartials/footer');
		}
	}

	function search_account()
	{
		$keyword = $this->input->post('searchbox');
		$data['content']= $this->acm->account_search($keyword);
		$data['keyword'] = $keyword;
		$this->load->view('aPartials/header');
		$this->load->view('admin/accounts', $data);
		$this->load->view('aPartials/footer');
	}

	function generate_password(){
		$rand = $this->generate_random_string();
		echo $rand;
	}

	function generate_random_string(){
		$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		$randomString = '';
		for($i=0;$i < 10;$i++){
			$randomString .= $characters[rand(0, strlen($characters) -1 )];
		}
		return $randomString;
	}

	function save_account()
	{
		if (!$this->permission()) 
		{
			redirect(base_url().'login');
		}
		else
		{
			$config_image = array();
			$config_image['upload_path'] = './users/';
			$config_image['allowed_types'] = 'jpg|png|gif';
			$config_image['encrypt_name'] = TRUE;
			$name = ucwords($this->input->post('name'));
			$position = ucwords($this->input->post('position'));
			$role = $this->input->post('role');
			$municipal = $this->input->post('municipal');
			$uname = $this->input->post('uname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$pword1 = $this->input->post('pword1');
			$pword2 = $this->input->post('pword2');
			$hashed_pword = $this->_hash_string($pword2);
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
			$check = $this->acm->account_insert($photo, $name, $position,$role, $municipal, $uname, $email, $phone, $hashed_pword);
			if($check)
			{
				$uid = $this->db->insert_id();
				$acc = $this->acm->fetch_account($uid);
				$pic_path = './users/'.$acc->photo;
				$defaultpic_path = './users/default.png';
				if($pic_path != $defaultpic_path){
					if(file_exists($pic_path)){
						unlink($pic_path);
					}
				}
				$arr = array ('success' => 'Account Registered Successfully!');
				$this->session->set_flashdata($arr);
				redirect('admin/accounts');
			}
			else
			{
				$arr = array ('error' => 'Account Register Failed!');
				$this->session->set_flashdata($arr);
				redirect('admin/accounts');
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
		$config_resize['new_image'] = './users/thumbs/'.$file;
		$this->load->library('image_lib', $config_resize);
		$this->image_lib->resize();
	}

	function edit_account()
	{
		if (!$this->permission()) 
		{
			redirect(base_url().'login');
		}
		else
		{
			$id = $this->uri->segment(4);
			if(!is_numeric($id))
			{
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}
			else
			{
				$uid = $this->session->userdata('id');
				$data['usr'] = $this->acm->fetch_account($uid);
				$data['row'] = $this->acm->fetch_account($id);
				$this->load->view('aPartials/header');
				$this->load->view('admin/edit_account', $data);
				$this->load->view('aPartials/footer');
			}
		}
	}

	function update_account()
	{
		$id = $this->uri->segment(5);
		if(!is_numeric($id))
		{
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}
		else
		{
			$pass = $this->input->post('pword1');
			$uid = $this->session->userdata('id');
			$result = $this->acm->fetch_account($uid);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{
				$config_image = array();
				$config_image['upload_path'] = './users/';
				$config_image['allowed_types'] = 'jpg|png|gif';
				$config_image['encrypt_name'] = TRUE;
				$this->load->library('upload', $config_image);
				$this->upload->do_upload();
				$data = array('upload_data' => $this->upload->data());
				$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				$pic = $data['upload_data']['file_name'];
				$result= $this->acm->fetch_account($id);
				if(empty($pic))
				{
					$photo = $result->photo;
				}
				else
				{
					$defaultpic_path = './users/thumbs/default.png';
					$pic_path = './users/thumbs/'.$result->photo;
					if($pic_path != $defaultpic_path)
					{
						if(file_exists($pic_path))
						{
							unlink($pic_path);
						}
					}
					$photo = $data['upload_data']['file_name'];
				}
				$name = ucwords($this->input->post('name'));
				$position = ucwords($this->input->post('position'));
				$role = $this->input->post('role');
				$municipal = $this->input->post('municipal');
				$uname = $this->input->post('uname');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$change = $this->acm->account_update($id, $photo, $name, $position, $role, $municipal, $uname, $email, $phone);
				if($change)
				{
					$acc = $this->acm->fetch_account($id);
					$pic_path = './users/'.$acc->photo;
					$defaultpic_path = './users/default.png';
					if($pic_path != $defaultpic_path){
						if(file_exists($pic_path)){
							unlink($pic_path);
						}
					}
					$arr = array ('success' => 'Account Updated successfully');
					$this->session->set_flashdata($arr);
					redirect('admin/accounts');
				}
				else
				{
					$arr = array ('error' => 'Account update failed');
					$this->session->set_flashdata($arr);
					redirect('admin/accounts');
				}
			}
			else
			{
				$arr = array ('error' => 'Your password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}


	function change_password_page(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(4);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}
			else{
				$uid = $this->session->userdata('id');
				$data['usr'] = $this->acm->fetch_account($uid);
				$data['row'] = $this->acm->fetch_account($id);
				$this->load->view('aPartials/header');
				$this->load->view('admin/change_password', $data);
				$this->load->view('aPartials/footer');
			}	
		}		
	}

	function change_account_password(){
		if (!$this->permission()) {
			redirect(base_url().'login');
		}else{
			$id = $this->uri->segment(5);
			if(!is_numeric($id)){
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}
			else{
				$pword1 = $this->input->post('pword1');
				$pword2 = $this->input->post('pword2');
				$hashed_pword = $this->_hash_string($pword1);
				$uid = $this->session->userdata('id');
				$credential = $this->acm->fetch_account($uid);
				$verified = $this->_verify_hash($pword2, $credential->pword);
				if($verified){
					$check = $this->acm->account_password_update($id, $hashed_pword);
					if($check){
						$arr = array ('success' => 'Account Password Changed Successfully');
						$this->session->set_flashdata($arr);
						redirect('admin/accounts');
					}
					else{
						$arr = array ('error' => 'Account Password Change Failed');
						$this->session->set_flashdata($arr);
						redirect('admin/accounts');
					}
				}
				else{
					$arr = array ('error' => 'Your password is incorrect');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}	
		}		
	}

	function delete_account()
	{
		if (!$this->permission()) 
		{
			redirect(base_url().'login');
		}
		else
		{
			$id = $this->uri->segment(4);
			if(!is_numeric($id))
			{
				$this->load->view('partials/header');
				$this->load->view('pages/error');
				$this->load->view('partials/footer');
			}
			else
			{
				$result = $this->acm->account_delete($id);
				if($result)
				{
					$arr = array ('success' => 'Account deleted successfully');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else
				{
					$arr = array ('error' => 'Account delete failed');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
		}
	}	

	

	function change_profile_pic()
	{
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
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{		
				$config_image = array();
				$config_image['upload_path'] = './users/';
				$config_image['allowed_types'] = 'jpg|png|gif|jpeg|bmp';
				$config_image['encrypt_name'] = TRUE;
				$this->load->library('upload',$config_image);
				$this->upload->do_upload();
				$data = array('upload_data' => $this->upload->data());
				$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				$pic = $data['upload_data']['file_name'];
				$result = $this->acm->fetch_account($id);
				if($pic == '')
				{
					if(empty($result->photo))
					{
						$photo = 'default.png';
					}
					else
					{
						$photo = $result->photo;
					}	
				}
				else
				{
					$bigdefaultpic_path = './users/default.png';
					$smalldefaultpic_path = './users/thumbs/default.png';
					$bigpic_path = './users/'.$result->photo;
					$smallpic_path = './users/thumbs/'.$result->photo;
					if($bigpic_path != $bigdefaultpic_path)
					{
						if(file_exists($bigpic_path))
						{
							unlink($bigpic_path);
						}
					}
					if($smallpic_path != $smalldefaultpic_path)
					{
						if(file_exists($smallpic_path))
						{
							unlink($smallpic_path);
						}
					}		
					$photo = $data['upload_data']['file_name'];
				}
				$change = $this->acm->update_profile_pic($id, $photo);
				if($change)
				{
					$arr = array ('success' => 'Profile picture change successfully');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else
				{
					$arr = array ('error' => 'Profile picture change failed');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
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

	function change_account_info()
	{
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
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($pass, $result->pword);
			if($verify)
			{
				$config_image = array();
				$config_image['upload_path'] = './users/';
				$config_image['allowed_types'] = 'jpg|png|gif';
				$config_image['encrypt_name'] = TRUE;
				$this->load->library('upload', $config_image);
				$this->upload->do_upload();
				$data = array('upload_data' => $this->upload->data());
				$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				$pic = $data['upload_data']['file_name'];
				$result= $this->acm->fetch_account($id);
				if(empty($pic))
				{
					$photo = $result->photo;
				}
				else
				{
					$defaultpic_path = './users/thumbs/default.png';
					$pic_path = './users/thumbs/'.$result->photo;
					if($pic_path != $defaultpic_path)
					{
						if(file_exists($pic_path))
						{
							unlink($pic_path);
						}
					}
					$photo = $data['upload_data']['file_name'];
				}
				$name = ucwords($this->input->post('n_name'));
				$position =  ucwords($this->input->post('n_position'));
				$email = $this->input->post('n_email');
				$phone = $this->input->post('n_phone');
				$uname = $this->input->post('n_uname');
				$change = $this->acm->update_account_info($id, $photo, $name, $position, $email, $phone, $uname);
				if($change)
				{
					$acc = $this->acm->fetch_account($id);
					$pic_path = './users/'.$acc->photo;
					$defaultpic_path = './users/default.png';
					if($pic_path != $defaultpic_path){
						if(file_exists($pic_path)){
							unlink($pic_path);
						}
					}
					$arr = array ('success' => 'Account Info change successfully');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else
				{
					$arr = array ('error' => 'Account Info change failed');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
			else
			{
				$arr = array ('error' => 'Your password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}


	function change_password()
	{
		$id = $this->uri->segment(4);
		if(!is_numeric($id))
		{
			$this->load->view('partials/header');
			$this->load->view('pages/error');
			$this->load->view('partials/footer');
		}
		else
		{
			$cpass = $this->input->post('cpass');
			$result = $this->acm->fetch_account($id);
			$verify = $this->_verify_hash($cpass, $result->pword);
			if($verify)
			{
				$pass2 = $this->input->post('pass2');
				$hashed_pword = $this->_hash_string($pass2);
				$change = $this->acm->update_password($id, $hashed_pword);
				if($change)
				{
					$arr = array ('success' => 'Password change successfully');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
				else
				{
					$arr = array ('error' => 'Password change failed');
					$this->session->set_flashdata($arr);
					$this->redirect_back();
				}
			}
			else
			{
				$arr = array ('error' => 'Current password is incorrect');
				$this->session->set_flashdata($arr);
				$this->redirect_back();
			}		
		}
	}


}	