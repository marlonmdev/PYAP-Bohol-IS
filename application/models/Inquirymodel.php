<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquirymodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_all_inquiries($limit, $start){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('inquiries');
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}		
	}

	private $lastQuery = '';

	function get_inquiries_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	function get_pending_inquiries(){
		$query = "SELECT * FROM inquiries WHERE status=?";
		$status = "Pending";
		$result = $this->db->query($query, array($status));
		$pending = $result->result();
		return count($pending);
	}

	function count_replied_inquiries(){
		$query = "SELECT * FROM inquiries WHERE status=?";
		$status = "Replied";
		$result = $this->db->query($query, array($status));
		$replied = $result->result();
		return count($replied);
	}

	function count_all_inquiries(){
		$query = $this->db->get('inquiries'); 
		$inquiries = $query->result();
		return count($inquiries);
	}

	function inquiry_insert($name, $email, $msg, $send_at, $status){
		$query = "INSERT INTO inquiries (name, email, msg, send_at, status) VALUES (?, ?, ?, ?, ?)";
		$value = array($name, $email, $msg, $send_at, $status);
		$insert = $this->db->query($query, $value);
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	function update_inquiry_status($id, $status){
		$query = "UPDATE inquiries SET status=? WHERE id=?";
		$value = array($status, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function inquiry_delete($id){
		$query = "DELETE FROM inquiries WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function get_inquiry_by_id($id){
		$query = "SELECT * FROM inquiries WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}


}