<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interestfilteredmodel extends CI_Model {
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

	// Quarter Interest/Hobbies Report
	function get_lgu_tabular_quarter_interest_hobbies_report($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_interest1 = $this->count_quarter_lgu_interest1($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest2 = $this->count_quarter_lgu_interest2($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest3 = $this->count_quarter_lgu_interest3($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest4 = $this->count_quarter_lgu_interest4($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest5 = $this->count_quarter_lgu_interest5($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest6 = $this->count_quarter_lgu_interest6($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_interest7 = $this->count_quarter_lgu_interest7($brgy->brgy_id, $startDate, $endDate);
			$i++;
		}
		return $return;
	}

	function count_quarter_lgu_interest1($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.internet', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_interest2($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.watch', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_interest3($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_interest4($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_interest5($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.arts', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_interest6($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_interest7($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.dancing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual Interest/Hobbies Report
	function get_lgu_tabular_annual_interest_hobbies_report($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_interest1 = $this->count_annual_lgu_interest1($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest2 = $this->count_annual_lgu_interest2($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest3 = $this->count_annual_lgu_interest3($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest4 = $this->count_annual_lgu_interest4($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest5 = $this->count_annual_lgu_interest5($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest6 = $this->count_annual_lgu_interest6($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_interest7 = $this->count_annual_lgu_interest7($brgy->brgy_id, $startYear, $endYear);
			$i++;
		}
		return $return;
	}

	function count_annual_lgu_interest1($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.internet', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_interest2($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.watch', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_interest3($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_interest4($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_interest5($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.arts', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_interest6($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_interest7($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.dancing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Quarter Graphical Interest/Hobbies Report
	function count_quarter_lgu_graphical_interest1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.internet', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_graphical_interest2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.watch', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_graphical_interest3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_graphical_interest4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_graphical_interest5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_graphical_interest6($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_graphical_interest7($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('interest_hobbies.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Annual Graphical Interest/Hobbies Report
	function count_annual_lgu_graphical_interest1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.internet', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_graphical_interest2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.watch', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_graphical_interest3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_graphical_interest4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_graphical_interest5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_graphical_interest6($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_graphical_interest7($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('interest_hobbies.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

}