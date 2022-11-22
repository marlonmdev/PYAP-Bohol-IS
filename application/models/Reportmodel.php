<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function update_barangays_with_pyap(){
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		foreach($barangays as $brgy){
			$this->count_each_barangay_members($brgy->brgy_id);
		}
	}

	function count_each_barangay_members($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$this->set_barangays_with_pyap($brgy_id);
		}
	}

	function set_barangays_with_pyap($brgy_id){
		$query = "UPDATE barangays SET wPyap=? WHERE brgy_id=?";
		$value = array(1, $brgy_id);
		$this->db->query($query, $value);
	}

	//Start of total queries

	function count_total_barangays(){
		$query = $this->db->get('barangays'); 
		if($query->num_rows() > 0){
			$brgys = $query->result();
			return count($brgys);
		}else{
			return false;
		}
	}

	function count_total_members(){
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_total_barangays_with_pyap(){
		$this->db->where('wPyap', 1);
		$query = $this->db->get('barangays'); 
		if($query->num_rows() > 0){
			$brgys = $query->result();
			return count($brgys);
		}else{
			return false;
		}
	}

	function count_total_age_bracket1(){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket2(){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_age_bracket3(){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_members(){
		$this->db->where('sex', 'Male');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_members(){
		$this->db->where('sex', 'Female');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_osy(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_osy(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_male_isy(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_female_isy(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment1(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment2(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment3(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment4(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment5(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_attainment6(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_total_single_members(){
		$this->db->where('civilStat', 'Single');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_married_members(){
		$this->db->where('civilStat', 'Married');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_solo_members(){
		$this->db->where('civilStat', 'Solo Parent');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income1(){
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income2(){
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_total_monthly_income3(){
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	//End of total queries
	function count_age_bracket1_m(){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket1_f(){
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket2_m(){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket2_f(){
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket3_m(){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Male');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_age_bracket3_f(){
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('sex', 'Female');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	//Graphical Highest Educational Attainment Report
	function count_male_attainment1(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment1(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment2(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment2(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment3(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment3(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment4(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment4(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_male_attainment5(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment5(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

		function count_male_attainment6(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Male');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_female_attainment6(){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.sex', 'Female');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	//This queries is for the skills graphical reports
	function count_skill1(){
		$this->db->where('none', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill2(){
		$this->db->where('agri', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill3(){
		$this->db->where('tech', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill4(){
		$this->db->where('construct', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill5(){
		$this->db->where('singing', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill6(){
		$this->db->where('dancing', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill7(){
		$this->db->where('carpentry', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill8(){
		$this->db->where('computer', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill9(){
		$this->db->where('drawing', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill10(){
		$this->db->where('dress', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill11(){
		$this->db->where('sports', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill12(){
		$this->db->where('arts', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill13(){
		$this->db->where('music', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill14(){
		$this->db->where('business', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill15(){
		$this->db->where('swimming', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}

	function count_skill16(){
		$this->db->where('writing', 1);
		$query = $this->db->get('special_skills');
		$skill = $query->result();
		return count($skill);
	}
	//End of the skills graphical reports

	function get_member_list(){
		$this->db->order_by('lName', 'ASC');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_municipal_member_list($municipal){
		$this->db->where('mun', $municipal);
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
		if($query->num_rows() === 1){
			return $query->row();
		}else{
			return false;
		}
	}

	function get_municipal_members_count(){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_members = $this->count_municipal_members($mun->mun_id);
			$i++;
		}
		return $return;
	}

	function count_municipal_members($mun_id){
		$this->db->where('mun_id', $mun_id);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 
	
	// Admin Summary Report Queries

	function get_members_summary(){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_brgys = $this->count_municipal_barangays($mun->mun_id);
			$return[$i]->m_pyap = $this->count_municipal_barangays_with_pyap($mun->mun_id);
			$return[$i]->m_youth = $this->count_municipal_youth($mun->mun_id);
			$return[$i]->m_male = $this->count_municipal_youth_male($mun->mun_id);
			$return[$i]->m_female = $this->count_municipal_youth_female($mun->mun_id); 
			$return[$i]->m_ageBr1 = $this->count_municipal_youth_bracket1($mun->mun_id);  
			$return[$i]->m_ageBr2 = $this->count_municipal_youth_bracket2($mun->mun_id); 
			$return[$i]->m_ageBr3 = $this->count_municipal_youth_bracket3($mun->mun_id); 
			$return[$i]->m_osy_m = $this->count_municipal_osy_m($mun->mun_id);
			$return[$i]->m_osy_f = $this->count_municipal_osy_f($mun->mun_id); 
			$return[$i]->m_isy_m = $this->count_municipal_isy_m($mun->mun_id); 
			$return[$i]->m_isy_f = $this->count_municipal_isy_f($mun->mun_id); 
			$return[$i]->m_attainment1 = $this->count_municipal_elem_level($mun->mun_id); 
			$return[$i]->m_attainment2 = $this->count_municipal_elem_graduate($mun->mun_id);
			$return[$i]->m_attainment3 = $this->count_municipal_hs_level($mun->mun_id); 
			$return[$i]->m_attainment4 = $this->count_municipal_hs_graduate($mun->mun_id);
			$return[$i]->m_attainment5 = $this->count_municipal_col_level($mun->mun_id);   
			$return[$i]->m_attainment6 = $this->count_municipal_col_graduate($mun->mun_id);
			$return[$i]->m_single = $this->count_municipal_youth_single($mun->mun_id);
			$return[$i]->m_married = $this->count_municipal_youth_married($mun->mun_id);
			$return[$i]->m_solo = $this->count_municipal_youth_solo($mun->mun_id);
			$return[$i]->m_income1 = $this->count_municipal_monthly_income1($mun->mun_id); 
			$return[$i]->m_income2 = $this->count_municipal_monthly_income2($mun->mun_id); 
			$return[$i]->m_income3 = $this->count_municipal_monthly_income3($mun->mun_id); 
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

	function count_municipal_barangays_with_pyap($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('wPyap', 1);
		$query = $this->db->get('barangays'); 
		$brgys = $query->result();
		return count($brgys);
	}

	function count_municipal_youth($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_male($mun_id){
		$array = array('mun_id' => $mun_id, 'sex' => 'Male');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_female($mun_id){
		$array = array('mun_id' => $mun_id, 'sex' => 'Female');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_bracket1($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_youth_bracket2($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);		
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_youth_bracket3($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_osy_m($mun_id){
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

	function count_municipal_osy_f($mun_id){
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

	function count_municipal_isy_m($mun_id){
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

	function count_municipal_isy_f($mun_id){
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

	function count_municipal_elem_level($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_elem_graduate($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_hs_level($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_hs_graduate($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_col_level($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_col_graduate($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_single($mun_id){
		$array = array('mun_id' => $mun_id, 'civilStat' => 'Single');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_married($mun_id){
		$array = array('mun_id' => $mun_id, 'civilStat' => 'Married');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_youth_solo($mun_id){
		$array = array('mun_id' => $mun_id, 'civilStat' => 'Solo Parent');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income1($mun_id){
		$array = array('mun_id' => $mun_id, '(fathIncome + mothIncome) <' => 3000);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income2($mun_id){
		$array = array('mun_id' => $mun_id, '(fathIncome + mothIncome) >=' => 3000,  '(fathIncome + mothIncome) <=' => 5999);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_monthly_income3($mun_id){
		$array = array('mun_id' => $mun_id, '(fathIncome + mothIncome) >=' => 6000,  '(fathIncome + mothIncome) <=' => 15000);
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_last_attended1($mun_id){
		$array = array('mun_id' => $mun_id, 'DATEDIFF(NOW(),sMYear) <=1');
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_last_attended2($mun_id){
		$array = array('mun_id' => $mun_id, 'DATEDIFF(date("F Y"), sMYear) >= 2', 'DATEDIFF(NOW(),sMYear) <= 3');
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_last_attended3($mun_id){
		$array = array('mun_id' => $mun_id, 'DATEDIFF(date("F Y"), sMYear) >= 4', 'DATEDIFF(NOW(),sMYear) <=5');
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_municipal_last_attended4($mun_id){
		$array = array('mun_id' => $mun_id, 'DATEDIFF("date("F Y")",  sMYear) >= 6');
		$this->db->where($array);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

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

	function get_municipality($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('municipals'); 
		return $query->row();
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

	function get_barangay($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('barangays'); 
		return $query->row();
	}

	function get_barangay_members($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_barangay_members_annual($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_barangay_members_quarter($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	// End of Admin Summary Report Queries

	function get_municipal_members_summary_annual($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->b_youth = $this->count_annual_barangay_youth($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_male = $this->count_annual_barangay_youth_male($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_female = $this->count_annual_barangay_youth_female($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_ageBr1 = $this->count_annual_barangay_youth_bracket1($brgy->brgy_id, $startYear, $endYear);  
			$return[$i]->b_ageBr2 = $this->count_annual_barangay_youth_bracket2($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_ageBr3 = $this->count_annual_barangay_youth_bracket3($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_ageBr4 = $this->count_annual_barangay_youth_bracket4($brgy->brgy_id, $startYear, $endYear);  
			$return[$i]->b_osy_m = $this->count_annual_barangay_osy_m($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_osy_f = $this->count_annual_barangay_osy_f($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_isy_m = $this->count_annual_barangay_isy_m($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_isy_f = $this->count_annual_barangay_isy_f($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_attainment1 = $this->count_annual_barangay_elem_level($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_attainment2 = $this->count_annual_barangay_elem_graduate($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_attainment3 = $this->count_annual_barangay_hs_level($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_attainment4 = $this->count_annual_barangay_hs_graduate($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_attainment5 = $this->count_annual_barangay_col_level($brgy->brgy_id, $startYear, $endYear);   
			$return[$i]->b_attainment6 = $this->count_annual_barangay_col_graduate($brgy->brgy_id, $startYear, $endYear);  
			$return[$i]->b_single = $this->count_annual_barangay_youth_single($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_married = $this->count_annual_barangay_youth_married($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_solo = $this->count_annual_barangay_youth_solo($brgy->brgy_id, $startYear, $endYear);
			$return[$i]->b_income1 = $this->count_annual_barangay_monthly_income1($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_income2 = $this->count_annual_barangay_monthly_income2($brgy->brgy_id, $startYear, $endYear); 
			$return[$i]->b_income3 = $this->count_annual_barangay_monthly_income3($brgy->brgy_id, $startYear, $endYear); 
			$i++;
		}
		return $return;
	}

	function count_annual_barangay_youth($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_male($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_female($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_bracket1($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_barangay_youth_bracket2($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');		
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_barangay_youth_bracket3($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_barangay_youth_bracket4($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);	
		$this->db->where('age >', 30);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_annual_barangay_osy_m($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_osy_f($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_isy_m($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_isy_f($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_elem_level($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_elem_graduate($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_hs_level($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_hs_graduate($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_col_level($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_col_graduate($brgy_id, $startYear, $endYear){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_single($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Single');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_married($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_youth_solo($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Solo Parent');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_monthly_income1($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_monthly_income2($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_barangay_monthly_income3($brgy_id, $startYear, $endYear){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}


	function get_municipal_members_summary_quarter($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$query = $this->db->get('barangays'); 
		$barangays = $query->result();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->b_youth = $this->count_quarter_barangay_youth($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_male = $this->count_quarter_barangay_youth_male($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_female = $this->count_quarter_barangay_youth_female($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_ageBr1 = $this->count_quarter_barangay_youth_bracket1($brgy->brgy_id, $startDate, $endDate);  
			$return[$i]->b_ageBr2 = $this->count_quarter_barangay_youth_bracket2($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_ageBr3 = $this->count_quarter_barangay_youth_bracket3($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_ageBr4 = $this->count_quarter_barangay_youth_bracket4($brgy->brgy_id, $startDate, $endDate);  
			$return[$i]->b_osy_m = $this->count_quarter_barangay_osy_m($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_osy_f = $this->count_quarter_barangay_osy_f($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_isy_m = $this->count_quarter_barangay_isy_m($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_isy_f = $this->count_quarter_barangay_isy_f($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_attainment1 = $this->count_quarter_barangay_elem_level($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_attainment2 = $this->count_quarter_barangay_elem_graduate($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_attainment3 = $this->count_quarter_barangay_hs_level($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_attainment4 = $this->count_quarter_barangay_hs_graduate($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_attainment5 = $this->count_quarter_barangay_col_level($brgy->brgy_id, $startDate, $endDate);   
			$return[$i]->b_attainment6 = $this->count_quarter_barangay_col_graduate($brgy->brgy_id, $startDate, $endDate);  
			$return[$i]->b_single = $this->count_quarter_barangay_youth_single($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_married = $this->count_quarter_barangay_youth_married($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_solo = $this->count_quarter_barangay_youth_solo($brgy->brgy_id, $startDate, $endDate);
			$return[$i]->b_income1 = $this->count_quarter_barangay_monthly_income1($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_income2 = $this->count_quarter_barangay_monthly_income2($brgy->brgy_id, $startDate, $endDate); 
			$return[$i]->b_income3 = $this->count_quarter_barangay_monthly_income3($brgy->brgy_id, $startDate, $endDate); 
			$i++;
		}
		return $return;
	}

	function count_quarter_barangay_youth($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_male($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_female($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_bracket1($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_barangay_youth_bracket2($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');		
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_barangay_youth_bracket3($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_barangay_youth_bracket4($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);	
		$this->db->where('age >', 30);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	} 

	function count_quarter_barangay_osy_m($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_osy_f($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_isy_m($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Male');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_isy_f($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.sex', 'Female');
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_elem_level($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_elem_graduate($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_hs_level($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_hs_graduate($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_col_level($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_col_graduate($brgy_id, $startDate, $endDate){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('members.added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_single($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Single');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_married($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_youth_solo($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('civilStat', 'Solo Parent');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_monthly_income1($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_monthly_income2($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_quarter_barangay_monthly_income3($brgy_id, $startDate, $endDate){
		$this->db->where('brgy_id', $brgy_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	// Start of Admin skills report queries
	function get_skills_summary(){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_none = $this->count_municipal_none($mun->mun_id);
			$return[$i]->m_agri = $this->count_municipal_agri($mun->mun_id);
			$return[$i]->m_tech = $this->count_municipal_tech($mun->mun_id); 
			$return[$i]->m_construct = $this->count_municipal_construct($mun->mun_id);  
			$return[$i]->m_singing = $this->count_municipal_singing($mun->mun_id); 
			$return[$i]->m_dancing = $this->count_municipal_dancing($mun->mun_id); 
			$return[$i]->m_carpentry = $this->count_municipal_carpentry($mun->mun_id); 
			$return[$i]->m_computer = $this->count_municipal_computer($mun->mun_id);
			$return[$i]->m_drawing = $this->count_municipal_drawing($mun->mun_id); 
			$return[$i]->m_dress = $this->count_municipal_dress($mun->mun_id); 
			$return[$i]->m_sports = $this->count_municipal_sports($mun->mun_id); 
			$return[$i]->m_arts = $this->count_municipal_arts($mun->mun_id);
			$return[$i]->m_music = $this->count_municipal_music($mun->mun_id);
			$return[$i]->m_business = $this->count_municipal_business($mun->mun_id);
			$return[$i]->m_swimming = $this->count_municipal_swimming($mun->mun_id); 
			$return[$i]->m_writing = $this->count_municipal_writing($mun->mun_id); 
			$i++;
		}
		return $return;
	}

	function count_municipal_none($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.none', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_agri($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.agri', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_tech($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.tech', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_construct($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.construct', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_singing($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_dancing($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_carpentry($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.carpentry', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_computer($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.computer', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_drawing($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.drawing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_dress($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.dress', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_sports($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_arts($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_music($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_business($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.business', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_swimming($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.swimming', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_writing($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('special_skills', 'special_skills.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('special_skills.writing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 


	function get_reason_for_dropping_summary(){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_reason1 = $this->count_municipal_reason1($mun->mun_id);
			$return[$i]->m_reason2 = $this->count_municipal_reason2($mun->mun_id);
			$return[$i]->m_reason3 = $this->count_municipal_reason3($mun->mun_id);
			$return[$i]->m_reason4 = $this->count_municipal_reason4($mun->mun_id);
			$return[$i]->m_reason5 = $this->count_municipal_reason5($mun->mun_id);
			$i++;
		}
		return $return;
	}

	function count_municipal_reason1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.finProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.nInterest', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.famProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.ePreg', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_reason5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('reasons', 'reasons.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('reasons.hProb', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_reason1(){
		$this->db->where('finProb', 1);
		$query = $this->db->get('reasons'); 
		$reasons = $query->result();
		return count($reasons);
	}

	function count_reason2(){
		$this->db->where('nInterest', 1);
		$query = $this->db->get('reasons'); 
		$reasons = $query->result();
		return count($reasons);
	}

	function count_reason3(){
		$this->db->where('famProb', 1);
		$query = $this->db->get('reasons'); 
		$reasons = $query->result();
		return count($reasons);
	} 

	function count_reason4(){
		$this->db->where('ePreg', 1);
		$query = $this->db->get('reasons'); 
		$reasons = $query->result();
		return count($reasons);
	} 

	function count_reason5(){
		$this->db->where('hProb', 1);
		$query = $this->db->get('reasons'); 
		$reasons = $query->result();
		return count($reasons);
	} 

	function get_interest_hobbies_summary(){
		$this->db->order_by('municipal', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_interest1 = $this->count_municipal_interest1($mun->mun_id);
			$return[$i]->m_interest2 = $this->count_municipal_interest2($mun->mun_id);
			$return[$i]->m_interest3 = $this->count_municipal_interest3($mun->mun_id);
			$return[$i]->m_interest4 = $this->count_municipal_interest4($mun->mun_id);
			$return[$i]->m_interest5 = $this->count_municipal_interest5($mun->mun_id);
			$return[$i]->m_interest6 = $this->count_municipal_interest6($mun->mun_id);
			$return[$i]->m_interest7 = $this->count_municipal_interest7($mun->mun_id);
			$i++;
		}
		return $return;
	}

	function count_municipal_interest1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.internet', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_interest2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.watch', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	} 

	function count_municipal_interest3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.sports', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_interest4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.music', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_interest5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.arts', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_interest6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.singing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_interest7($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('interest_hobbies', 'interest_hobbies.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('interest_hobbies.dancing', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_interest1(){
		$this->db->where('internet', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	}

	function count_interest2(){
		$this->db->where('watch', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	}

	function count_interest3(){
		$this->db->where('sports', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	} 

	function count_interest4(){
		$this->db->where('music', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	} 

	function count_interest5(){
		$this->db->where('arts', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	} 

	function count_interest6(){
		$this->db->where('singing', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	} 

	function count_interest7(){
		$this->db->where('dancing', 1);
		$query = $this->db->get('interest_hobbies'); 
		$interest_hobbies = $query->result();
		return count($interest_hobbies);
	} 


	//Start of municipal breakdown total queries
	function count_mun_total_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_mun_total_age_bracket1($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_age_bracket2($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_age_bracket3($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_male_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Male');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_female_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_male_osy($mun_id){
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

	function count_mun_total_female_osy($mun_id){
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

	function count_mun_total_male_isy($mun_id){
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

	function count_mun_total_female_isy($mun_id){
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

	function count_mun_total_attainment1($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_attainment2($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.elemGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_attainment3($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_attainment4($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.hsGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_attainment5($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colLevel', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_attainment6($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.colGrad', 1);	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_single_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}


	function count_mun_total_married_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_solo_members($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_monthly_income1($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_monthly_income2($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_mun_total_monthly_income3($mun_id){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}
	//End of municipal breakdown total queries


	//Start of annual municipal breakdown total queries
	function count_annual_mun_total_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_annual_mun_total_age_bracket1($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_age_bracket2($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_age_bracket3($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_male_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_female_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_male_osy($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_female_osy($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_male_isy($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_female_isy($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment1($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment2($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment3($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment4($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment5($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_attainment6($mun_id, $startYear, $endYear){
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

	function count_annual_mun_total_single_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}


	function count_annual_mun_total_married_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_solo_members($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_monthly_income1($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_monthly_income2($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_annual_mun_total_monthly_income3($mun_id, $startYear, $endYear){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startYear)).'" AND "'.date('Y-m-d', strtotime($endYear)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}
	//End of annual municipal breakdown total queries

	//Start of quarter municipal breakdown total queries
	function count_quarter_mun_total_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		if($query->num_rows() > 0){
			$members = $query->result();
			return count($members);
		}else{
			return false;
		}
	}

	function count_quarter_mun_total_age_bracket1($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 14);	
		$this->db->where('age <=', 20);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_age_bracket2($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 20);
		$this->db->where('age <=', 25);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_age_bracket3($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('age >', 25);	
		$this->db->where('age <=', 30);	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_male_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Male');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_female_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('sex', 'Female');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_male_osy($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_female_osy($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_male_isy($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_female_isy($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment1($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment2($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment3($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment4($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment5($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_attainment6($mun_id, $startDate, $endDate){
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

	function count_quarter_mun_total_single_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Single');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}


	function count_quarter_mun_total_married_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Married');
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');	
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_solo_members($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('civilStat', 'Solo Parent');	
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_monthly_income1($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) <', 3000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_monthly_income2($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 3000);
		$this->db->where('(fathIncome + mothIncome) <=', 5999);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}

	function count_quarter_mun_total_monthly_income3($mun_id, $startDate, $endDate){
		$this->db->where('mun_id', $mun_id);
		$this->db->where('(fathIncome + mothIncome) >=', 6000);
		$this->db->where('(fathIncome + mothIncome) <=', 15000);
		$this->db->where('added_on BETWEEN "'.date('Y-m-d', strtotime($startDate)).'" AND "'.date('Y-m-d', strtotime($endDate)).'"');
		$query = $this->db->get('members');
		$members = $query->result();
		return count($members);
	}
	//End of annual municipal breakdown total queries

}