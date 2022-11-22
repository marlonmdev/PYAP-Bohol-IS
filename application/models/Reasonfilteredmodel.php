<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reasonfilteredmodel extends CI_Model {
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

	// Quarter Reason for Dropping Report
	function get_lgu_tabular_quarter_reason_report($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_reason1 = $this->count_quarter_lgu_reason1($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_reason2 = $this->count_quarter_lgu_reason2($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_reason3 = $this->count_quarter_lgu_reason3($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_reason4 = $this->count_quarter_lgu_reason4($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_reason5 = $this->count_quarter_lgu_reason5($brgy->brgy_id, $startDate, $endDate);
			$i++;
		}
		return $return;
	}

	function count_quarter_lgu_reason1($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.finProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_reason2($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.nInterest', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_reason3($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.famProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_reason4($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.ePreg', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_reason5($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.hProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 


	// Annual Reason for Dropping Report
	function get_lgu_tabular_annual_reason_report($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_reason1 = $this->count_annual_lgu_reason1($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_reason2 = $this->count_annual_lgu_reason2($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_reason3 = $this->count_annual_lgu_reason3($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_reason4 = $this->count_annual_lgu_reason4($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_reason5 = $this->count_annual_lgu_reason5($brgy->brgy_id, $startYear, $endYear);
			$i++;
		}
		return $return;
	}

	function count_annual_lgu_reason1($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.finProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_reason2($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.nInterest', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_reason3($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.famProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_reason4($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.ePreg', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_reason5($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('reasons.hProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Reason for Dropping Graphical Quarter Report
	function count_quarter_lgu_drop_reason1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('reasons.finProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_drop_reason2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('reasons.nInterest', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_drop_reason3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('reasons.famProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_drop_reason4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('reasons.ePreg', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_drop_reason5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('reasons.hProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Reason for Dropping Graphical Annual Report
	function count_annual_lgu_drop_reason1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('reasons.finProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_drop_reason2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('reasons.nInterest', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_drop_reason3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('reasons.famProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_drop_reason4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('reasons.ePreg', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_drop_reason5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('reasons.hProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 


}