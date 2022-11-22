<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activitymodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_all_activities($limit, $start){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('activities'); 
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	private $lastQuery = '';

	function get_activities_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}


	function get_activities(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('activities');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_activities_to_home(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get('activities'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_activities_by_municipal_to_home($filter, $limit, $start){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit, $start);
		$this->db->where('municipal', $filter);
		$query = $this->db->get('activities'); 
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_activities_by_municipal($municipal){
		$this->db->where('municipal', $municipal);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('activities'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function insert_activity($aname, $descr, $afrom, $ato, $municipal, $budget, $image){
		$query = "INSERT INTO activities (aname, descr, afrom, ato, municipal, budget, pic) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$value = array($aname, $descr, $afrom, $ato, $municipal, $budget, $image);
		$insert = $this->db->query($query, $value);
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	function get_activity_by_id($id){
		$query = "SELECT * FROM activities WHERE id = ?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_activity($id, $aname, $descr, $afrom, $ato, $municipal, $budget, $image){
		$query = "UPDATE activities SET aname=?, descr=?, afrom=?, ato=?, municipal=?, budget=?, pic=? WHERE id=?";
		$value = array($aname, $descr, $afrom, $ato, $municipal, $budget, $image, $id);
		$update = $this->db->query($query, $value);
		if($update){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function activity_delete($id){
		$query = "DELETE FROM activities WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

}