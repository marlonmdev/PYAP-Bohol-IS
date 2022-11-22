<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcementmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_all_announcements(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('announcements');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_announcements_to_home(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(4);
		$query = $this->db->get('announcements');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_announcements_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	function view_all_announcements($limit, $start){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('announcements'); 
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


	function insert_announcement($title, $descr, $posted_by){
		$query = "INSERT INTO announcements (title, descr, posted_by, posted_on) VALUES (?, ?, ?, NOW())";
		$value = array($title, $descr, $posted_by);
		$insert = $this->db->query($query, $value);
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	function get_announcement_by_id($id){
		$query = "SELECT * FROM announcements WHERE id=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_announcement($id, $title, $descr){
		$query = "UPDATE announcements SET title=?, descr=? WHERE id=?";
		$value = array($title, $descr, $id);
		$update = $this->db->query($query, $value);
		if($update){
			return true;
		}else{
			return false;
		}
	}

	function announcement_delete($id){
		$query = "DELETE FROM announcements WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

}