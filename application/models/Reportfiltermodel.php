<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportfiltermodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	//Start of quarter total queries
	function count_total_barangays(){
		$query = $this->db->get('barangays');
		if($query->num_rows() > 0){
			$brgys = $query->result();
			return count($brgys);
		}else{
			return false;
		}
	}

	function count_total_members($startDate, $endDate){
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_quarter_total_barangays_with_pyap($startDate, $endDate){
		$this->db->where('wPyap', 1);
		$this->db->where('started BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('barangays'); 
		if($query->num_rows() > 0){
			$brgys = $query->result();
			return count($brgys);
		}else{
			return false;
		}
	}

	function count_total_age_bracket1($startDate, $endDate){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket2($startDate, $endDate){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket3($startDate, $endDate){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_members($startDate, $endDate){
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_members($startDate, $endDate){
		$this->db->where('sex', 'Female');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_osy($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_osy($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_isy($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_isy($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment6($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_single_members($startDate, $endDate){
		$this->db->where('civilStat', 'Single');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_married_members($startDate, $endDate){
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_solo_members($startDate, $endDate){
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income1($startDate, $endDate){
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income2($startDate, $endDate){
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income3($startDate, $endDate){
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	//End of quarter total queries


	//Start of annual total queries
	function count_annual_total_members($startYear, $endYear){
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}
	function count_annual_total_barangays_with_pyap($startYear, $endYear){
		$this->db->where('wPyap', 1);
		$this->db->where('started BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('barangays'); 
		if($query->num_rows() > 0){
			$brgys = $query->result();
			return count($brgys);
		}else{
			return false;
		}
	}

	function count_annual_total_age_bracket1($startYear, $endYear){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_age_bracket2($startYear, $endYear){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_age_bracket3($startYear, $endYear){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_male_members($startYear, $endYear){
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_female_members($startYear, $endYear){
		$this->db->where('sex', 'Female');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}



	function count_annual_total_male_osy($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_female_osy($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_male_isy($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_female_isy($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_attainment6($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_single_members($startYear, $endYear){
		$this->db->where('civilStat', 'Single');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_married_members($startYear, $endYear){
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_solo_members($startYear, $endYear){
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_monthly_income1($startYear, $endYear){
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_monthly_income2($startYear, $endYear){
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_total_monthly_income3($startYear, $endYear){
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}
	//End of annual reports queries

	// Tabular members summary filters
	function get_quarter_treports1($startDate, $endDate){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_brgys = $this->count_municipal_barangays($mun->mun_id);
			$return[$i]->m_pyap = $this->count_municipal_barangays_with_pyap($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_youth = $this->count_municipal_youth($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_male = $this->count_municipal_youth_male($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_female = $this->count_municipal_youth_female($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_ageBr1 = $this->count_municipal_youth_bracket1($mun->mun_id, $startDate, $endDate);  
			$return[$i]->m_ageBr2 = $this->count_municipal_youth_bracket2($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_ageBr3 = $this->count_municipal_youth_bracket3($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_osy_m = $this->count_municipal_osy_m($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_osy_f = $this->count_municipal_osy_f($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_isy_m = $this->count_municipal_isy_m($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_isy_f = $this->count_municipal_isy_f($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_attainment1 = $this->count_municipal_elem_level($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_attainment2 = $this->count_municipal_elem_graduate($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_attainment3 = $this->count_municipal_hs_level($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_attainment4 = $this->count_municipal_hs_graduate($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_attainment5 = $this->count_municipal_col_level($mun->mun_id, $startDate, $endDate);   
			$return[$i]->m_attainment6 = $this->count_municipal_col_graduate($mun->mun_id, $startDate, $endDate);  
			$return[$i]->m_single = $this->count_municipal_youth_single($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_married = $this->count_municipal_youth_married($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_solo = $this->count_municipal_youth_solo($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_income1 = $this->count_municipal_monthly_income1($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_income2 = $this->count_municipal_monthly_income2($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_income3 = $this->count_municipal_monthly_income3($mun->mun_id, $startDate, $endDate); 
			$i++;
		}
		return $return;
	}

	function count_municipal_barangays($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('barangays'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_municipal_barangays_with_pyap($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('wPyap', 1);
		$this->db->where('started BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('barangays'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_municipal_youth($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_male($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('barangays');
		$this->db->join('members', 'members.brgy_id = barangays.brgy_id');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_female($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_bracket1($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_youth_bracket2($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_youth_bracket3($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_osy_m($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_osy_f($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_isy_m($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_isy_f($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_elem_level($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_elem_graduate($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_hs_level($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_hs_graduate($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_col_level($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_col_graduate($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_single($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_married($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_solo($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income1($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income2($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);	
		$this->db->where('(fathIncome + mothIncome) <=', 5999);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income3($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);	
		$this->db->where('(fathIncome + mothIncome) <=', 15000);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function get_annual_treports1($startYear, $endYear){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_brgys = $this->count_annual_municipal_barangays($mun->mun_id);
			$return[$i]->m_pyap = $this->count_annual_municipal_barangays_with_pyap($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_youth = $this->count_annual_municipal_youth($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_male = $this->count_annual_municipal_youth_male($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_female = $this->count_annual_municipal_youth_female($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_ageBr1 = $this->count_annual_municipal_youth_bracket1($mun->mun_id, $startYear, $endYear);  
			$return[$i]->m_ageBr2 = $this->count_annual_municipal_youth_bracket2($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_ageBr3 = $this->count_annual_municipal_youth_bracket3($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_osy_m = $this->count_annual_municipal_osy_m($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_osy_f = $this->count_annual_municipal_osy_f($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_isy_m = $this->count_annual_municipal_isy_m($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_isy_f = $this->count_annual_municipal_isy_f($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_attainment1 = $this->count_annual_municipal_elem_level($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_attainment2 = $this->count_annual_municipal_elem_graduate($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_attainment3 = $this->count_annual_municipal_hs_level($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_attainment4 = $this->count_annual_municipal_hs_graduate($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_attainment5 = $this->count_annual_municipal_col_level($mun->mun_id, $startYear, $endYear);   
			$return[$i]->m_attainment6 = $this->count_annual_municipal_col_graduate($mun->mun_id, $startYear, $endYear);   
			$return[$i]->m_single = $this->count_annual_municipal_youth_single($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_married = $this->count_annual_municipal_youth_married($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_solo = $this->count_annual_municipal_youth_solo($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_income1 = $this->count_annual_municipal_monthly_income1($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_income2 = $this->count_annual_municipal_monthly_income2($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_income3 = $this->count_annual_municipal_monthly_income3($mun->mun_id, $startYear, $endYear); 
			$i++;
		}
		return $return;
	}

	function count_annual_municipal_barangays($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('barangays'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_annual_municipal_barangays_with_pyap($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('wPyap', 1);
		$this->db->where('started BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('barangays'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_annual_municipal_youth($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_annual_municipal_youth_male($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_youth_female($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_youth_bracket1($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_youth_bracket2($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_youth_bracket3($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_osy_m($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_osy_f($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_isy_m($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_isy_f($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_elem_level($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_elem_graduate($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_hs_level($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_hs_graduate($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_col_level($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_col_graduate($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_youth_single($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_youth_married($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_youth_solo($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_monthly_income1($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_monthly_income2($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);	
		$this->db->where('(fathIncome + mothIncome) <=', 5999);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_monthly_income3($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);	
		$this->db->where('(fathIncome + mothIncome) <=', 15000);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function get_quarter_treports2($startDate, $endDate){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_none = $this->count_municipal_none($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_agri = $this->count_municipal_agri($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_tech = $this->count_municipal_tech($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_construct = $this->count_municipal_construct($mun->mun_id, $startDate, $endDate);  
			$return[$i]->m_singing = $this->count_municipal_singing($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_dancing = $this->count_municipal_dancing($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_carpentry = $this->count_municipal_carpentry($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_computer = $this->count_municipal_computer($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_drawing = $this->count_municipal_drawing($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_dress = $this->count_municipal_dress($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_sports = $this->count_municipal_sports($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_arts = $this->count_municipal_arts($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_music = $this->count_municipal_music($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_business = $this->count_municipal_business($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_swimming = $this->count_municipal_swimming($mun->mun_id, $startDate, $endDate); 
			$return[$i]->m_writing = $this->count_municipal_writing($mun->mun_id, $startDate, $endDate); 
			$i++;
		}
		return $return;
	}

	function count_municipal_none($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_agri($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_tech($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_construct($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.construct', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_singing($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_dancing($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_carpentry($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_computer($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_drawing($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_dress($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_sports($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_arts($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_music($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_business($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_swimming($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.swimming', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_writing($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.writing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Tabular Skills Report Filters
	function get_annual_treports2($startYear, $endYear){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_none = $this->count_annual_municipal_none($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_agri = $this->count_annual_municipal_agri($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_tech = $this->count_annual_municipal_tech($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_construct = $this->count_annual_municipal_construct($mun->mun_id, $startYear, $endYear);  
			$return[$i]->m_singing = $this->count_annual_municipal_singing($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_dancing = $this->count_annual_municipal_dancing($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_carpentry = $this->count_annual_municipal_carpentry($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_computer = $this->count_annual_municipal_computer($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_drawing = $this->count_annual_municipal_drawing($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_dress = $this->count_annual_municipal_dress($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_sports = $this->count_annual_municipal_sports($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_arts = $this->count_annual_municipal_arts($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_music = $this->count_annual_municipal_music($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_business = $this->count_annual_municipal_business($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_swimming = $this->count_annual_municipal_swimming($mun->mun_id, $startYear, $endYear); 
			$return[$i]->m_writing = $this->count_annual_municipal_writing($mun->mun_id, $startYear, $endYear); 
			$i++;
		}
		return $return;
	}

		function count_annual_municipal_none($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_agri($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_tech($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_construct($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.construct', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_singing($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_dancing($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_carpentry($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_computer($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_drawing($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_dress($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_municipal_sports($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_arts($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_music($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_business($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_swimming($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.swimming', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_writing($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.writing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	// Tabular Reason for Dropping Filters
	function get_quarter_treports3($startDate, $endDate){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_reason1 = $this->count_municipal_reason1($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_reason2 = $this->count_municipal_reason2($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_reason3 = $this->count_municipal_reason3($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_reason4 = $this->count_municipal_reason4($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_reason5 = $this->count_municipal_reason5($mun->mun_id, $startDate, $endDate);
			$i++;
		}
		return $return;
	}

	function count_municipal_reason1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.finProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.nInterest', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.famProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.ePreg', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.hProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function get_annual_treports3($startYear, $endYear){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_reason1 = $this->count_annual_municipal_reason1($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_reason2 = $this->count_annual_municipal_reason2($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_reason3 = $this->count_annual_municipal_reason3($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_reason4 = $this->count_annual_municipal_reason4($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_reason5 = $this->count_annual_municipal_reason5($mun->mun_id, $startYear, $endYear);
			$i++;
		}
		return $return;
	}

	function count_annual_municipal_reason1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.finProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_reason2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.nInterest', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_reason3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.famProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_reason4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.ePreg', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_reason5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.hProb', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 


	// Tabular Interest/Hobbies Filters
	function get_quarter_treports4($startDate, $endDate){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_interest1 = $this->count_municipal_interest1($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest2 = $this->count_municipal_interest2($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest3 = $this->count_municipal_interest3($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest4 = $this->count_municipal_interest4($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest5 = $this->count_municipal_interest5($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest6 = $this->count_municipal_interest6($mun->mun_id, $startDate, $endDate);
			$return[$i]->m_interest7 = $this->count_municipal_interest7($mun->mun_id, $startDate, $endDate);
			$i++;
		}
		return $return;
	}

	function count_municipal_interest1($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.internet', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest2($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.watch', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest3($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.sports', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest4($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.music', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest5($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.arts', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest6($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest7($mun_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.dancing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function get_annual_treports4($startYear, $endYear){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_interest1 = $this->count_annual_municipal_interest1($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest2 = $this->count_annual_municipal_interest2($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest3 = $this->count_annual_municipal_interest3($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest4 = $this->count_annual_municipal_interest4($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest5 = $this->count_annual_municipal_interest5($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest6 = $this->count_annual_municipal_interest6($mun->mun_id, $startYear, $endYear);
			$return[$i]->m_interest7 = $this->count_annual_municipal_interest7($mun->mun_id, $startYear, $endYear);
			$i++;
		}
		return $return;
	}

	function count_annual_municipal_interest1($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.internet', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest2($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.watch', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest3($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.sports', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest4($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.music', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest5($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.arts', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest6($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.singing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_municipal_interest7($mun_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.dancing', 1);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 


	// Graphical Age Bracket Count Filter
	function count_quarter_age_bracket1_m($startDate, $endDate){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_age_bracket1_f($startDate, $endDate){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_age_bracket2_m($startDate, $endDate){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_age_bracket2_f($startDate, $endDate){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_age_bracket3_m($startDate, $endDate){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_age_bracket3_f($startDate, $endDate){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	// Annual
	function count_annual_age_bracket1_m($startYear, $endYear){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_age_bracket1_f($startYear, $endYear){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_age_bracket2_m($startYear, $endYear){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_age_bracket2_f($startYear, $endYear){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_age_bracket3_m($startYear, $endYear){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_age_bracket3_f($startYear, $endYear){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	// Graphical Highest Educational Attainment Filters
	function count_quarter_male_attainment1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_male_attainment2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_male_attainment3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_male_attainment4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_male_attainment5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_male_attainment6($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_female_attainment6($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual Graphical Highest Educational Attainment 
	function count_annual_male_attainment1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_male_attainment2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_male_attainment3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_male_attainment4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_male_attainment5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_male_attainment6($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_female_attainment6($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Graphical Skills Report Filters
	function count_quarter_skill1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.construct', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill6($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill7($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill8($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill9($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill10($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill11($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill12($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill13($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill14($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill15($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.swimming', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_skill16($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.writing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual
	function count_annual_skill1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.none', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.agri', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.tech', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.construct', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill6($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill7($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.carpentry', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill8($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.computer', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill9($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.drawing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill10($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.dress', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill11($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill12($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill13($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill14($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.business', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill15($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.swimming', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_skill16($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('special_skills.writing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}


	// Municipality members filters
	function get_quarter_municipal_members_count($startDate, $endDate){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_members = $this->count_quarter_municipal_members($mun->mun_id, $startDate, $endDate);
			$i++;
		}
		return $return;
	}

	function count_quarter_municipal_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function get_annual_municipal_members_count($startYear, $endYear){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_members = $this->count_annual_municipal_members($mun->mun_id, $startYear, $endYear);
			$i++;
		}
		return $return;
	}

	function count_annual_municipal_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	// Graphical Reason for Dropping Filters
	function count_quarter_reason1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.finProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_reason2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.nInterest', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_reason3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.famProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_reason4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.ePreg', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_reason5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.hProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	// Annual
	function count_annual_reason1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.finProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_reason2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.nInterest', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_reason3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.famProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_reason4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.ePreg', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_reason5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('reasons.hProb', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest1($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.internet', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest2($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.watch', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest3($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest4($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest5($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest6($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_interest7($startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest1($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.internet', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest2($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.watch', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest3($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.sports', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest4($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.music', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest5($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.arts', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest6($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.singing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_interest7($startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('interest_hobbies.dancing', 1);	
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}


}