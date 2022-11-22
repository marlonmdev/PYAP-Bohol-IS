<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reasonreportmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}
	
	function get_municipal_id($municipal){
		$this->db->where('municipal', $municipal);
		$query = $this->db->get('municipals');
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}
	}

	function get_lgu_reason_for_dropping_report($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_reason1 = $this->count_lgu_reason1($brgy->brgy_id);
			$return[$i]->lgu_reason2 = $this->count_lgu_reason2($brgy->brgy_id);
			$return[$i]->lgu_reason3 = $this->count_lgu_reason3($brgy->brgy_id);
			$return[$i]->lgu_reason4 = $this->count_lgu_reason4($brgy->brgy_id);
			$return[$i]->lgu_reason5 = $this->count_lgu_reason5($brgy->brgy_id);
			$i++;
		}
		return $return;
	}

	function count_lgu_reason1($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.finProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_reason2($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.nInterest', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_reason3($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.famProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_reason4($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.ePreg', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_reason5($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.hProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Reason for Dropping Graphical Report
	function count_lgu_drop_reason1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.finProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_drop_reason2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.nInterest', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_drop_reason3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.famProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_drop_reason4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.ePreg', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_drop_reason5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.hProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

}