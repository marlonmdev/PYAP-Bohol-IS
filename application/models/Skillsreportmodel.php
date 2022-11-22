<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillsreportmodel extends CI_Model {
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

	function get_lgu_tabular_skills_report($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->lgu_none = $this->count_lgu_none($brgy->brgy_id);
			$return[$i]->lgu_agri = $this->count_lgu_agri($brgy->brgy_id);
			$return[$i]->lgu_tech = $this->count_lgu_tech($brgy->brgy_id); 
			$return[$i]->lgu_construct = $this->count_lgu_construct($brgy->brgy_id);  
			$return[$i]->lgu_singing = $this->count_lgu_singing($brgy->brgy_id); 
			$return[$i]->lgu_dancing = $this->count_lgu_dancing($brgy->brgy_id); 
			$return[$i]->lgu_carpentry = $this->count_lgu_carpentry($brgy->brgy_id); 
			$return[$i]->lgu_computer = $this->count_lgu_computer($brgy->brgy_id);
			$return[$i]->lgu_drawing = $this->count_lgu_drawing($brgy->brgy_id); 
			$return[$i]->lgu_dress = $this->count_lgu_dress($brgy->brgy_id); 
			$return[$i]->lgu_sports = $this->count_lgu_sports($brgy->brgy_id); 
			$return[$i]->lgu_arts = $this->count_lgu_arts($brgy->brgy_id);
			$return[$i]->lgu_music = $this->count_lgu_music($brgy->brgy_id);
			$return[$i]->lgu_business = $this->count_lgu_business($brgy->brgy_id);
			$return[$i]->lgu_swimming = $this->count_lgu_swimming($brgy->brgy_id); 
			$return[$i]->lgu_writing = $this->count_lgu_writing($brgy->brgy_id); 
			$i++;
		}
		return $return;
	}

	function count_lgu_none($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.none', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_agri($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.agri', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_tech($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.tech', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_construct($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.construct', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_singing($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_dancing($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_carpentry($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.carpentry', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_computer($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.computer', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_drawing($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.drawing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_dress($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.dress', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_sports($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_arts($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_music($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_business($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.business', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_swimming($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.swimming', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_lgu_writing($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('special_skills.writing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	//This queries is for the skills graphical reports
	function count_lgu_skill1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.none', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.agri', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.tech', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.construct', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill7($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.carpentry', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill8($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.computer', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill9($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.drawing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill10($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.dress', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill11($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill12($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill13($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill14($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.business', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill15($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.swimming', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_skill16($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);	
		$this->db->where('special_skills.writing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}


}