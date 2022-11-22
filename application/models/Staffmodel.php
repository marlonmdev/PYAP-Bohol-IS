<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function count_all_members($municipal){
		$this->db->where('mun', $municipal);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_all_male($municipal){
		$this->db->where('sex', 'Male');
		$this->db->where('mun', $municipal);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_all_female($municipal){
		$this->db->where('sex', 'Female');
		$this->db->where('mun', $municipal);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_all_OSY($municipal){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun', $municipal);	
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_all_ISY($municipal){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun', $municipal);	
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_all_activities($municipal){
		$this->db->where('municipal', $municipal);
		$query = $this->db->get('activities'); 
		$activities = $query->result();
		return count($activities);
	}

	function count_all_barangays($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		return count($barangays);
	}

	function get_barangays_by_municipal($mun_id){
		$query = "SELECT * FROM barangays WHERE mun_id=?";
		$result = $this->db->query($query, array($mun_id));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_municipal_id($municipal){
		$query = "SELECT * FROM municipals WHERE municipal=?";
		$result = $this->db->query( $query, array($municipal));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function fetch_signatory1(){
		$query = "SELECT * FROM signatories WHERE position=?";
		$position = 'PSWDO';
		$result = $this->db->query($query, array($position));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function fetch_signatory2(){
		$query = "SELECT * FROM signatories WHERE position=?";
		$position = 'Mayor';
		$result = $this->db->query($query, array($position));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

}