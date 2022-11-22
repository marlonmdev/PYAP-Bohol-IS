<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillsfilteredmodel extends CI_Model {
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

	//Quarter Skills Report
	function get_lgu_tabular_quarter_skills_report($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_none = $this->count_quarter_lgu_none($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_agri = $this->count_quarter_lgu_agri($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_tech = $this->count_quarter_lgu_tech($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_construct = $this->count_quarter_lgu_construct($brgy->brgy_id, $startDate, $endDate);  
			$return[$i]->lgu_singing = $this->count_quarter_lgu_singing($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_dancing = $this->count_quarter_lgu_dancing($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_carpentry = $this->count_quarter_lgu_carpentry($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_computer = $this->count_quarter_lgu_computer($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_drawing = $this->count_quarter_lgu_drawing($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_dress = $this->count_quarter_lgu_dress($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_sports = $this->count_quarter_lgu_sports($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_arts = $this->count_quarter_lgu_arts($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_music = $this->count_quarter_lgu_music($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_business = $this->count_quarter_lgu_business($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->lgu_swimming = $this->count_quarter_lgu_swimming($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->lgu_writing = $this->count_quarter_lgu_writing($brgy->brgy_id, $startDate, $endDate); 
			$i++;
		}
		return $return;
	}

	function count_quarter_lgu_none($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_agri($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_tech($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_construct($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.construct', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_singing($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_dancing($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_carpentry($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_computer($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_drawing($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_dress($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_sports($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_arts($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_music($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_business($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_swimming($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.swimming', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_lgu_writing($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.writing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	//Annual Skills Report
	function get_lgu_tabular_annual_skills_report($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_none = $this->count_annual_lgu_none($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_agri = $this->count_annual_lgu_agri($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_tech = $this->count_annual_lgu_tech($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_construct = $this->count_annual_lgu_construct($brgy->brgy_id, $startYear, $endYear);  
			$return[$i]->lgu_singing = $this->count_annual_lgu_singing($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_dancing = $this->count_annual_lgu_dancing($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_carpentry = $this->count_annual_lgu_carpentry($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_computer = $this->count_annual_lgu_computer($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_drawing = $this->count_annual_lgu_drawing($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_dress = $this->count_annual_lgu_dress($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_sports = $this->count_annual_lgu_sports($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_arts = $this->count_annual_lgu_arts($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_music = $this->count_annual_lgu_music($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_business = $this->count_annual_lgu_business($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->lgu_swimming = $this->count_annual_lgu_swimming($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->lgu_writing = $this->count_annual_lgu_writing($brgy->brgy_id, $startYear, $endYear); 
			$i++;
		}
		return $return;
	}

	function count_annual_lgu_none($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_agri($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_tech($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_construct($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.construct', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_singing($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_dancing($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_carpentry($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_computer($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_drawing($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_dress($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_sports($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_arts($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_music($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_business($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_swimming($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.swimming', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_lgu_writing($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.writing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Quarter Graphical Skills Report
	function count_quarter_lgu_skill1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.none', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.agri', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.tech', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.construct', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill6($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill7($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.carpentry', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill8($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.computer', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill9($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.drawing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill10($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.dress', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill11($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill12($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill13($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill14($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('special_skills.business', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill15($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.swimming', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_lgu_skill16($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('special_skills.writing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual Graphical Skills Report
	function count_annual_lgu_skill1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.none', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.agri', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.tech', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.construct', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill6($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill7($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.carpentry', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill8($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.computer', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill9($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.drawing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill10($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.dress', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill11($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill12($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill13($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill14($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('special_skills.business', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill15($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.swimming', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_lgu_skill16($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('special_skills.writing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}


}