<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_current_accounts(){
		$query = $this->db->get('accounts'); 
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function get_all_accounts(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('accounts');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function account_search($keyword){
		$this->db->like('name', $keyword);
		$this->db->or_like('role', $keyword);
		$this->db->or_like('municipal', $keyword);
		$this->db->or_like('uname', $keyword);
		$this->db->order_by('id', 'DESC');
		$fetch = $this->db->get('accounts');
		if($fetch->num_rows() > 0){
			return $fetch->result();
		}else{
			return false;
		}
	}

	function account_insert($photo, $name, $position, $role, $municipal, $uname, $email, $phone, $hashed_pword){		
		$query = "INSERT INTO accounts (photo, name, position, role, municipal, uname, email, phone, pword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($photo, $name, $position, $role, $municipal, $uname, $email, $phone, $hashed_pword);
		$inserted = $this->db->query($query, $value);
		if($inserted){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	function fetch_account($uid){
		$query = "SELECT * FROM accounts WHERE id=?";
		$result = $this->db->query( $query, array($uid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_profile_pic($id, $photo){
		$query = "UPDATE accounts SET photo=? WHERE id=?";
		$value = array($photo, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function account_password_update($id, $hashed_pword){
		$query = "UPDATE accounts SET pword=? WHERE id=?";
		$value = array($hashed_pword, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function account_update($id, $photo, $name, $position, $role, $municipal, $uname, $email, $phone){		
		$query = "UPDATE accounts SET photo=?, name=?, position=?, role=?, municipal=?, uname=?, email=?, phone=? WHERE id=?";
		$value = array($photo, $name, $position, $role, $municipal, $uname, $email, $phone, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function account_delete($id){
		$query = "DELETE FROM accounts WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function update_account_info($id, $photo, $name, $position, $email, $phone, $uname){
		$query = "UPDATE accounts SET photo=?, name=?, position=?, email=?, phone=?, uname=? WHERE id=?";
		$value = array($photo, $name, $position, $email, $phone, $uname, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function update_password($id, $hashed_pword){
		$query = "UPDATE accounts SET pword=? WHERE id=?";
		$value = array($hashed_pword, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

}
