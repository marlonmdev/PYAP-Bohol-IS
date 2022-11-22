<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	// private $lastQuery = '';

	// function admin_fetch_members($adm_keyword, $limit, $start){
	// 	$this->db->like('fName', $adm_keyword);
	// 	$this->db->or_like('mName', $adm_keyword);
	// 	$this->db->or_like('lName', $adm_keyword);
	// 	$this->db->or_like('ext', $adm_keyword);
	// 	$this->db->or_like('sex', $adm_keyword);
	// 	$this->db->or_like('civilStat', $adm_keyword);
	// 	$this->db->or_like('age', $adm_keyword);
	// 	$this->db->or_like('brgy', $adm_keyword);
	// 	$this->db->or_like('mun', $adm_keyword);
	// 	$this->db->order_by('mid', 'DESC');
	// 	$this->db->limit($limit, $start);
	// 	$query = $this->db->get('members'); 
	// 	$this->lastQuery = $this->db->last_query();
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }

	// function get_members_total_rows(){
	// 	$sql = explode('LIMIT', $this->lastQuery);
	// 	$query = $this->db->query($sql[0]);
	// 	$result = $query->result();
	// 	return count($result);
	// }

	// function lgu_fetch_members($lgu_keyword, $municipal, $limit, $start){
	// 	$this->db->like('fName', $lgu_keyword);
	// 	$this->db->or_like('mName', $lgu_keyword);
	// 	$this->db->or_like('lName', $lgu_keyword);
	// 	$this->db->or_like('ext', $lgu_keyword);
	// 	$this->db->or_like('sex', $lgu_keyword);
	// 	$this->db->or_like('civilStat', $lgu_keyword);
	// 	$this->db->or_like('age', $lgu_keyword);
	// 	$this->db->or_like('brgy', $lgu_keyword);
	// 	$this->db->or_like('mun', $lgu_keyword);
	// 	$this->db->having('mun', $municipal);
	// 	$this->db->order_by('mid', 'DESC');
	// 	$this->db->limit($limit, $start);
	// 	$query = $this->db->get('members');
	// 	$this->lastQuery = $this->db->last_query();
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }

	function get_municipal_id($municipal){
		$query = "SELECT * FROM municipals WHERE municipal=?";
		$result = $this->db->query( $query, array($municipal));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function admin_get_data($rowno, $rowperpage, $search=""){
		$this->db->select('*');
		$this->db->from('members');
		if($search != ''){
			$this->db->like('fName', $search);
			$this->db->or_like('mName', $search);
			$this->db->or_like('lName', $search);
			$this->db->or_like('ext', $search);
			$this->db->or_like('sex', $search);
			$this->db->or_like('civilStat', $search);
			$this->db->or_like('age', $search);
			$this->db->or_like('brgy', $search);
			$this->db->or_like('mun', $search);
			$this->db->order_by('mid', 'DESC');
		}
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function admin_get_records_count($search = ''){
		$this->db->select('count(*) as allcount');
		$this->db->from('members');
		if($search != ''){
			$this->db->like('fName', $search);
			$this->db->or_like('mName', $search);
			$this->db->or_like('lName', $search);
			$this->db->or_like('ext', $search);
			$this->db->or_like('sex', $search);
			$this->db->or_like('civilStat', $search);
			$this->db->or_like('age', $search);
			$this->db->or_like('brgy', $search);
			$this->db->or_like('mun', $search);
		}
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function lgu_get_data($rowno, $rowperpage, $search="", $municipal){
		$this->db->select('*');
		$this->db->from('members');
		if($search != ''){
			$this->db->like('fName', $search);
			$this->db->or_like('mName', $search);
			$this->db->or_like('lName', $search);
			$this->db->or_like('ext', $search);
			$this->db->or_like('sex', $search);
			$this->db->or_like('civilStat', $search);
			$this->db->or_like('age', $search);
			$this->db->or_like('brgy', $search);
			$this->db->or_like('mun', $search);
			$this->db->having('mun', $municipal);
			$this->db->order_by('mid', 'DESC');
		}
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

	function lgu_get_records_count($search = '', $municipal){
		$this->db->select('count(*) as allcount');
		$this->db->from('members');
		if($search != ''){
			$this->db->like('fName', $search);
			$this->db->or_like('mName', $search);
			$this->db->or_like('lName', $search);
			$this->db->or_like('ext', $search);
			$this->db->or_like('sex', $search);
			$this->db->or_like('civilStat', $search);
			$this->db->or_like('age', $search);
			$this->db->or_like('brgy', $search);
			$this->db->or_like('mun', $search);
		}
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

}