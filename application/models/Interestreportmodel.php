<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interestreportmodel extends CI_Model {
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


	function get_lgu_interest_hobbies_report($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_interest1 = $this->count_lgu_interest1($brgy->brgy_id);
			$return[$i]->lgu_interest2 = $this->count_lgu_interest2($brgy->brgy_id);
			$return[$i]->lgu_interest3 = $this->count_lgu_interest3($brgy->brgy_id);
			$return[$i]->lgu_interest4 = $this->count_lgu_interest4($brgy->brgy_id);
			$return[$i]->lgu_interest5 = $this->count_lgu_interest5($brgy->brgy_id);
			$return[$i]->lgu_interest6 = $this->count_lgu_interest6($brgy->brgy_id);
			$return[$i]->lgu_interest7 = $this->count_lgu_interest7($brgy->brgy_id);
			$i++;
		}
		return $return;
	}

	function count_lgu_interest1($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.internet', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_interest2($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.watch', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_interest3($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_interest4($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_interest5($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_interest6($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_interest7($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('interest_hobbies.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Graphical Interest/Hobbies Report
	function count_lgu_graphical_interest1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.internet', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_graphical_interest2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.watch', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_graphical_interest3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_graphical_interest4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_graphical_interest5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_graphical_interest6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_graphical_interest7($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

}