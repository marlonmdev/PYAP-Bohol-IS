<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membermodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	private $lastQuery = '';

	function get_members($limit, $start){
		$this->db->order_by('mid', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('members'); 
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_all_municipals($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->order_by('mun_id', 'ASC');
		$query = $this->db->get('municipals'); 
		$municipals = $query->result();
		$this->lastQuery = $this->db->last_query();
		$i = 0;
		foreach($municipals as $mun){
			$return[$i] = $mun;
			$return[$i]->m_youth = $this->count_municipal_youth($mun->mun_id); 
			$return[$i]->m_osy = $this->count_municipal_osy($mun->mun_id); 
			$return[$i]->m_osy_m= $this->count_municipal_osy_male($mun->mun_id);
			$return[$i]->m_osy_f = $this->count_municipal_osy_female($mun->mun_id);
			$return[$i]->m_isy = $this->count_municipal_isy($mun->mun_id);  
			$return[$i]->m_isy_m= $this->count_municipal_isy_male($mun->mun_id);
			$return[$i]->m_isy_f = $this->count_municipal_isy_female($mun->mun_id);
			$return[$i]->m_solo = $this->count_municipal_soloparent($mun->mun_id); 
			$i++;
		}
		return $return;
	}

	function get_municipal_by_id($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('municipals');
		return $query->row();
	}

	function fetch_municipal_barangays($mun_id){
		$array = array('mun_id' => $mun_id);
		$this->db->where($array);
		$query = $this->db->get('barangays'); 
		$barangay = $query->result();
		$i = 0;
		foreach($query->result() as $brgy){
			$return[$i] = $brgy;
			$return[$i]->youth = $this->count_barangay_youth($brgy->brgy_id); 
			$return[$i]->osy = $this->count_barangay_osy($brgy->brgy_id); 
			$return[$i]->osy_m= $this->count_barangay_osy_male($brgy->brgy_id);
			$return[$i]->osy_f = $this->count_barangay_osy_female($brgy->brgy_id);
			$return[$i]->isy = $this->count_barangay_isy($brgy->brgy_id);  
			$return[$i]->isy_m= $this->count_barangay_isy_male($brgy->brgy_id);
			$return[$i]->isy_f = $this->count_barangay_isy_female($brgy->brgy_id);
			$return[$i]->solo = $this->count_barangay_soloparent($brgy->brgy_id); 
			$return[$i]->subs = $this->get_barangay_members($brgy->brgy_id); 
			$i++;
		}
		return $return;
	}

	function get_municipal_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	function count_municipal_youth($mun_id){
		$this->db->where('mun_id', $mun_id);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_osy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_osy_male($mun_id){
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

	function count_municipal_osy_female($mun_id){
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

	function count_municipal_isy($mun_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.mun_id', $mun_id);
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_municipal_isy_male($mun_id){
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

	function count_municipal_isy_female($mun_id){
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

	function count_municipal_soloparent($mun_id){
		$array = array('mun_id' => $mun_id, 'civilStat' => 'Solo Parent');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function get_municipal_barangay_members($brgy_id){
		$array = array('brgy_id' => $brgy_id);
		$this->db->where($array);
		$query = $this->db->get('members'); 
		return $query->result();
	}
	//end of admin members multilevel table functions

	function get_municipal($municipal){
		$query = "SELECT * FROM municipals WHERE municipal=?";
		$result = $this->db->query( $query, array($municipal));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_members_by_municipal($municipal, $limit, $start){
		$this->db->where('mun', $municipal);
		$this->db->order_by('mid', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('members'); 
		$this->lastQuery = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_barangays($mun_id, $limit, $start){
		$this->db->where('mun_id', $mun_id);
		$this->db->order_by('brgy', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('barangays');
		$barangays = $query->result(); 
		$this->lastQuery = $this->db->last_query();
		$i = 0;
		foreach($barangays as $brgy){
			$return[$i] = $brgy;
			$return[$i]->youth = $this->count_barangay_youth($brgy->brgy_id); 
			$return[$i]->osy = $this->count_barangay_osy($brgy->brgy_id); 
			$return[$i]->osy_m= $this->count_barangay_osy_male($brgy->brgy_id);
			$return[$i]->osy_f = $this->count_barangay_osy_female($brgy->brgy_id);
			$return[$i]->isy = $this->count_barangay_isy($brgy->brgy_id);  
			$return[$i]->isy_m= $this->count_barangay_isy_male($brgy->brgy_id);
			$return[$i]->isy_f = $this->count_barangay_isy_female($brgy->brgy_id);
			$return[$i]->solo = $this->count_barangay_soloparent($brgy->brgy_id); 
			$return[$i]->subs = $this->get_barangay_members($brgy->brgy_id); 
			$i++;
		}
		return $return;
	}

	function get_barangay_members($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members');
		return $query->result();
	}

	function count_barangay_youth($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_osy($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.educStat', 'OSY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_osy_male($brgy_id){
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

	function count_barangay_osy_female($brgy_id){
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

	function count_barangay_isy($brgy_id){
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('attainment', 'attainment.mid = members.mid');
		$this->db->where('members.brgy_id', $brgy_id);
		$this->db->where('attainment.educStat', 'ISY');	
		$query = $this->db->get(); 
		$members = $query->result();
		return count($members);
	}

	function count_barangay_isy_male($brgy_id){
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

	function count_barangay_isy_female($brgy_id){
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

	function count_barangay_soloparent($brgy_id){
		$array = array('brgy_id' => $brgy_id, 'civilStat' => 'Solo Parent');
		$this->db->where($array);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function get_barangays_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	function get_members_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}


	function insert_skills($none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing){
		$query="INSERT INTO skills (none, agri, tech, construct, singing, dancing, carpentry, computer, drawing, dress, sports, arts, music, business, swimming, writing) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing);

		$result = $this->db->query($query, $value);
		if($result){
			return true;
		}else{
			return false;
		}
	}


	function get_member_by_id($id){
		$query = "SELECT * FROM members WHERE mid=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_skills_by_id($id){
		$query = "SELECT * FROM skills WHERE mid=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}


	function update_skills($id, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing){
		$query="UPDATE skills SET none=?, agri=?, tech=?, construct=?, singing=?, dancing=?, carpentry=?, computer=?, drawing=?, dress=?, sports=?, arts=?, music=?, business=?, swimming=?, writing=? WHERE mid=?";
		$value = array($none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing, $id);

		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}


	function insert_education($id ,$ename, $eaddr, $elevel, $estat, $efrom, $eto, $sname, $saddr, $slevel, $sstat, $sfrom, $sto, $tname, $taddr, $tlevel, $tstat, $tfrom, $tto, $cname, $cdegree, $caddr, $clevel, $cstat, $cfrom, $cto){
		$query = "INSERT INTO education (mid, ename, eaddr, elevel, estat, efrom, eto, sname, saddr, slevel, sstat, sfrom, sto, tname, taddr, tlevel, tstat, tfrom, tto, cname, cdegree, caddr, clevel, cstat, cfrom, cto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($id ,$ename, $eaddr, $elevel, $estat, $efrom, $eto, $sname, $saddr, $slevel, $sstat, $sfrom, $sto, $tname, $taddr, $tlevel, $tstat, $tfrom, $tto, $cname, $cdegree, $caddr, $clevel, $cstat, $cfrom, $cto);
		$insert = $this->db->query($query, $value);
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	function verify_education($id){
		$query = "SELECT * FROM education WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() === 1){
			return true;
		}else{
			return false;
		}		
	}

	function get_member_name($id){
		$query = "SELECT fname, mname, lname, ext FROM members WHERE mid=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_dreams_hobbies($id, $prof, $finish, $success, $business, $travel, $pres, $artist, $fashion, $internet, $watch, $sports, $music, $arts, $singing, $dancing){
		$query1 = "UPDATE dreams SET prof=?, finish=?, success=?, business=?, travel=?, pres=?, artist=?, fashion=? WHERE mid=?";
		$value1 = array($prof, $finish, $success, $business, $travel, $pres, $artist, $fashion, $id);
		$result1 = $this->db->query($query1, $value1);
		$query2 = "UPDATE hobbies SET internet=?, watch=?, sports=?, music=?, arts=?, singing=?, dancing=? WHERE mid=?";
		$value2 = array($internet, $watch, $sports, $music, $arts, $singing, $dancing, $id);
		$result2 = $this->db->query($query2, $value2);
		if($result1 && $result2){
			return true;
		}else{
			return false;
		}
	}


	function verify_reasons($id){
		$query = "SELECT * FROM reasons WHERE mid=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() === 1){
			return true;
		}else{
			return false;
		}
	}


	function insert_reasons($id, $finprob, $ninterest, $famprob, $epreg, $hprob){
		$query="INSERT INTO reasons (mid, finprob, ninterest, famprob, epreg, hprob) VALUES (?, ?, ?, ?, ?, ?)";
		$value = array($id, $finprob, $ninterest, $famprob, $epreg, $hprob);
		$result = $this->db->query($query, $value);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function update_reasons($id, $finprob, $ninterest, $famprob, $epreg, $hprob){
		$query="UPDATE reasons SET finprob=?, ninterest=?, famprob=?, epreg=?, hprob=? WHERE mid=?";
		$value = array($finprob, $ninterest, $famprob, $epreg, $hprob, $id);
		$result = $this->db->query($query, $value);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function get_reasons($id){
		$query="SELECT * from reasons WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_municipal($municipal){
		$query = "SELECT * FROM municipals WHERE municipal=?";
		$result = $this->db->query( $query, array($municipal));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_barangay_id($brgy, $mun_id){
		$query = "SELECT * FROM barangays WHERE brgy=? AND mun_id=?";
		$result = $this->db->query( $query, array($brgy, $mun_id));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_identifying_data_by_id($mid){
		$query = "SELECT * FROM members WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_photo_id($mid){
		$query = "SELECT photo FROM members WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_children_by_id($mid){
		$query = "SELECT * FROM children WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function update_identifying_data($brgy_id, $postData, $photo, $mid){
		$query = "UPDATE members SET photo=?, brgy_id=?, fName=?, mName=?, lName=?, ext=?, sex=?, dBirth=?, age=?, civilStat=?, brgy=?, mun=?, prov=?, region=?, bBrgy=?, bMun=?, bProv=?, bRegion=?, religion=?, celNo=?, email=?, fathName=?, fathAge=?, fathOccup=?, fathIncome=?, mothName=?, mothAge=?, mothOccup=?, mothIncome=? WHERE mid=?";
		$value = array($photo, $brgy_id, ucwords($postData['fName']), ucwords($postData['mName']), ucwords($postData['lName']), $postData['ext'], $postData['sex'], $postData['dBirth'], $postData['age'], $postData['civilStat'], ucwords($postData['brgy']), $postData['mun'], $postData['prov'], $postData['region'], ucwords($postData['bBrgy']), ucwords($postData['bMun']), ucwords($postData['bProv']), $postData['bRegion'], ucwords($postData['religion']), $postData['celNo'], $postData['email'], ucwords($postData['fathName']), $postData['fathAge'], ucwords($postData['fathOccup']), $postData['fathIncome'], ucwords($postData['mothName']), $postData['mothAge'], ucwords($postData['mothOccup']), $postData['mothIncome'], $mid);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function get_educational_background_by_id($mid){
		$query = "SELECT * FROM educational_background WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_reasons_by_id($mid){
		$query = "SELECT * FROM reasons WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_educational_background($postData, $mid){
		$query = "UPDATE educational_background SET eName=?, eAddr=?, eLevel=?, eStat=?, eFrom=?, eTo=?, sName=?, sAddr=?, sLevel=?, sStat=?, sFrom=?, sTo=?, cName=?, cAddr=?, cLevel=?, cStat=?, cDegree=?, cFrom=?, cTo=? WHERE mid=?";
		$value = array(ucwords($postData['eName']), ucwords($postData['eAddr']), $postData['eLevel'], $postData['eStat'], $postData['eFrom'], $postData['eTo'], ucwords($postData['sName']), ucwords($postData['sAddr']), $postData['sLevel'], $postData['sStat'], $postData['sFrom'], $postData['sTo'], ucwords($postData['cName']), ucwords($postData['cAddr']), $postData['cLevel'], $postData['cStat'], ucwords($postData['cDegree']), $postData['cFrom'], $postData['cTo'], $mid);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function member_delete($mid){
		$tables = array('members', 'educational_background', 'attainment', 'reasons', 'siblings', 'special_skills', 'interest_hobbies', 'work_experience', 'organizations');
		$this->db->where('mid', $mid);
		$this->db->delete($tables);
		return true;
	}

	function get_member_identifying_data($id){
		$query = "SELECT * FROM members WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_municipal_id($mid){
		$query = "SELECT * FROM members WHERE mid=?";
		$result = $this->db->query($query, array($mid));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	// function get_member_son_daughter($id){
	// 	$query = "SELECT * FROM children WHERE mid=?";
	// 	$result = $this->db->query($query, array($id));
	// 	if($result->num_rows() > 0){
	// 		return $result->result();
	// 	}else{
	// 		return false;
	// 	}
	// }

	function get_member_siblings($id){
		$query = "SELECT * FROM siblings WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_member_education($id){
		$query = "SELECT * FROM educational_background WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_reason_for_dropping($id){
		$query = "SELECT * FROM reasons WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_special_skills($id){
		$query = "SELECT * FROM special_skills WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_interest_hobbies($id){
		$query = "SELECT * FROM interest_hobbies WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function get_member_work_experience($id){
		$query = "SELECT * FROM work_experience WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_member_organization($id){
		$query = "SELECT * FROM organizations WHERE mid=?";
		$result = $this->db->query($query, array($id));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}


}