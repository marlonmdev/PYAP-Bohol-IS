<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function count_all_members(){
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_all_male(){
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$male = $query->result();
		return count($male);
	}

	function count_all_female(){
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$female = $query->result();
		return count($female);
	}

	function count_all_OSY(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_all_ISY(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_all_announcements(){
		$query = $this->db->get('announcements'); 
		$announcements = $query->result();
		return count($announcements);
	}

	function count_all_accounts(){
		$query = $this->db->get('accounts'); 
		$accounts = $query->result();
		return count($accounts);
	}

	function count_all_admin(){
		$this->db->where('role', 'Administrator');
		$query = $this->db->get('accounts'); 
		$accounts = $query->result();
		return count($accounts);
	}

	function count_all_lgu(){
		$this->db->where('role', 'LGU User');
		$query = $this->db->get('accounts'); 
		$accounts = $query->result();
		return count($accounts);
	}
	
	function get_all_logs(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('logs');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function clear_login_history(){
		$query = "TRUNCATE logs";
		$result = $this->db->query( $query);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function check_signatory1(){
		$query = "SELECT * FROM signatories WHERE sigNum=?";
		$sigNum = 1;
		$result = $this->db->query($query, array($sigNum));
		if($result->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	function add_signatory1($sigNum, $name, $position){
		$query = "INSERT INTO signatories (sigNum, name, position) VALUES (?, ?, ?)";
		$value = array($sigNum, $name, $position);
		$added = $this->db->query($query, $value);
		if($added){
			return true;
		}else{
			return false;
		}
	}

	function update_signatory1($sigNum, $name, $position){
		$query = "UPDATE signatories SET name=?, position=? WHERE sigNum=?";
		$value = array($name, $position, $sigNum);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function fetch_signatory1(){
		$query = "SELECT * FROM signatories WHERE sigNum=?";
		$sigNum = 1;
		$result = $this->db->query($query, array($sigNum));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function check_signatory2(){
		$query = "SELECT * FROM signatories WHERE sigNum=?";
		$sigNum = 2;
		$result = $this->db->query($query, array($sigNum));
		if($result->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	function add_signatory2($sigNum, $name, $position){
		$query = "INSERT INTO signatories (sigNum, name, position) VALUES (?, ?, ?)";
		$value = array($sigNum, $name, $position);
		$added = $this->db->query($query, $value);
		if($added){
			return true;
		}else{
			return false;
		}
	}

	function update_signatory2($sigNum, $name, $position){
		$query = "UPDATE signatories SET name=?, position=? WHERE sigNum=?";
		$value = array($name, $position, $sigNum);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function fetch_signatory2(){
		$query = "SELECT * FROM signatories WHERE sigNum=?";
		$sigNum = 2;
		$result = $this->db->query($query, array($sigNum));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function check_site_contacts(){
		$result = $this->db->get('contacts');
		if($result->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	function add_site_contacts($telNo, $conEmail){
		$query = "INSERT INTO contacts (telNo, email) VALUES (?, ?)";
		$value = array($telNo, $conEmail);
		$added = $this->db->query($query, $value);
		if($added){
			return true;
		}else{
			return false;
		}
	}

	function update_site_contacts($telNo, $conEmail, $id){
		$query = "UPDATE contacts SET telNo=?, email=? WHERE id=?";
		$value = array($telNo, $conEmail, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function fetch_site_contacts(){
		$result = $this->db->get('contacts');
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}


}