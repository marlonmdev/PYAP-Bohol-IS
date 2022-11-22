<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffreportmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_barangay_by_id($brgy_id, $mun_id){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('barangays'); 
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}
	}

	function get_brgy_member_list($brgy_id, $municipal){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('mun', $municipal);
		$this->db->order_by('lName', 'ASC');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_brgy_members_annual($brgy_id, $mun_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->order_by('lName', 'ASC');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_brgy_members_quarter($brgy_id, $mun_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->order_by('lName', 'ASC');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
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

	function get_barangays_members_count($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->b_members = $this->count_barangay_members($brgy->brgy_id);
			$i++;
		}
		return $return;
	}


	function count_barangay_members($brgy_id){
		$this->db->where('brgy_id', $brgy_id);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket1_m($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket1_f($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket2_m($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket2_f($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket3_m($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket3_f($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	//Start of total queries
	function count_total_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_total_age_bracket1($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket2($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket3($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Male');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_osy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_osy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_isy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_isy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_single_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}


	function count_total_married_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_solo_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income1($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income2($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income3($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	//End of total queries

	function get_municipal_members_summary($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->b_youth = $this->count_barangay_youth($brgy->brgy_id);
			$return[$i]->b_male = $this->count_barangay_youth_male($brgy->brgy_id);
			$return[$i]->b_female = $this->count_barangay_youth_female($brgy->brgy_id); 
			$return[$i]->b_ageBr1 = $this->count_barangay_youth_bracket1($brgy->brgy_id);  
			$return[$i]->b_ageBr2 = $this->count_barangay_youth_bracket2($brgy->brgy_id); 
			$return[$i]->b_ageBr3 = $this->count_barangay_youth_bracket3($brgy->brgy_id);
			$return[$i]->b_ageBr4 = $this->count_barangay_youth_bracket4($brgy->brgy_id);  
			$return[$i]->b_osy_m = $this->count_barangay_osy_m($brgy->brgy_id);
			$return[$i]->b_osy_f = $this->count_barangay_osy_f($brgy->brgy_id); 
			$return[$i]->b_isy_m = $this->count_barangay_isy_m($brgy->brgy_id); 
			$return[$i]->b_isy_f = $this->count_barangay_isy_f($brgy->brgy_id); 
			$return[$i]->b_attainment1 = $this->count_barangay_elem_level($brgy->brgy_id); 
			$return[$i]->b_attainment2 = $this->count_barangay_elem_graduate($brgy->brgy_id);
			$return[$i]->b_attainment3 = $this->count_barangay_hs_level($brgy->brgy_id); 
			$return[$i]->b_attainment4 = $this->count_barangay_hs_graduate($brgy->brgy_id);
			$return[$i]->b_attainment5 = $this->count_barangay_col_level($brgy->brgy_id);   
			$return[$i]->b_attainment6 = $this->count_barangay_col_graduate($brgy->brgy_id); 
			$return[$i]->b_single = $this->count_barangay_youth_single($brgy->brgy_id);
			$return[$i]->b_married = $this->count_barangay_youth_married($brgy->brgy_id);
			$return[$i]->b_solo = $this->count_barangay_youth_solo($brgy->brgy_id);
			$return[$i]->b_income1 = $this->count_barangay_monthly_income1($brgy->brgy_id); 
			$return[$i]->b_income2 = $this->count_barangay_monthly_income2($brgy->brgy_id); 
			$return[$i]->b_income3 = $this->count_barangay_monthly_income3($brgy->brgy_id);  
			$i++;
		}
		return $return;
	}

	function count_barangay_youth($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_male($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'sex' => 'Male');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_female($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'sex' => 'Female');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_bracket1($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_barangay_youth_bracket2($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);		
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_barangay_youth_bracket3($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_barangay_youth_bracket4($brgy_id){
		$this->db->where('brgy_id', $brgy_id);	
		$this->db->where('age >', 30);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_barangay_osy_m($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_osy_f($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_isy_m($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_isy_f($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_elem_level($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_elem_graduate($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_hs_level($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_hs_graduate($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_col_level($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_col_graduate($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_single($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'civilStat' => 'Single');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_married($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'civilStat' => 'Married');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_youth_solo($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'civilStat' => 'Solo Parent');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_monthly_income1($brgy_id){
		$array = array('brgy_id' => $brgy_id, '(fathIncome + mothIncome) <' => 3000);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_barangay_monthly_income2($brgy_id){
		$array = array('brgy_id' => $brgy_id, '(fathIncome + mothIncome) >=' => 3000,  '(fathIncome + mothIncome) <=' => 5999);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_barangay_monthly_income3($brgy_id){
		$array = array('brgy_id' => $brgy_id, '(fathIncome + mothIncome) >=' => 6000,  '(fathIncome + mothIncome) <=' => 15000);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	// Graphical Highest Educational Attainment Report
	function count_male_attainment1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

		function count_male_attainment6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Quarter Highest Educational Attainment Graphical Report
	function count_lgu_quarter_male_attainment1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_male_attainment2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_male_attainment3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_male_attainment4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_male_attainment5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_male_attainment6($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_quarter_female_attainment6($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual Highest Educational Attainment Graphical Report
	function count_lgu_annual_male_attainment1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_male_attainment2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_male_attainment3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_male_attainment4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_male_attainment5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_male_attainment6($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_lgu_annual_female_attainment6($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}


}