<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editdatamodel extends CI_Model {
	function __construct(){
		parent:: __construct();
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
		$result = $this->db->query($query, array($mid));
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

	function verify_attainment($mid){
		$query = "SELECT * FROM attainment WHERE mid=?";
		$result = $this->db->query($query, array($mid));
		if($result->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad){
		$query = "UPDATE attainment SET educStat=?, elemLevel=?, elemGrad=?, hsLevel=?, hsGrad=?, colLevel=?, colGrad=? WHERE mid=?";
		$value = array($educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad, $mid);
		$this->db->query($query, $value);
	}

	function update_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb){
		$query = "UPDATE reasons SET level=?, finProb=?, nInterest=?, famProb=?, ePreg=?, hProb=? WHERE mid=?";
		$value = array($level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb, $mid);
		$this->db->query($query, $value);
	}

	function update_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb){
		$query = "UPDATE reasons SET level=?, finProb=?, nInterest=?, famProb=?, ePreg=?, hProb=? WHERE mid=?";
		$value = array($level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb, $mid);
		$this->db->query($query, $value);
	}

	function update_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb){
		$query = "UPDATE reasons SET level=?, finProb=?, nInterest=?, famProb=?, ePreg=?, hProb=? WHERE mid=?";
		$value = array($level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb, $mid);
		$this->db->query($query, $value);
	}

	function get_siblings($mid){
		$query = "SELECT * FROM siblings WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_sibling_by_id($id){
		$query = "SELECT * FROM siblings WHERE id=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_sibling($postData, $id){
		$query = "UPDATE siblings SET sibName=?, sibSex=?, sibAge=?, sibOccup=?, sibGrYr=?, sibIOSY=? WHERE id=?";
		$value = array(ucwords($postData['sibName']), $postData['sibSex'], $postData['sibAge'],ucwords($postData['sibOccup']), ucwords($postData['sibGrYr']), $postData['sibIOSY'], $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function delete_sibling($id){
		$query = "DELETE FROM siblings WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function get_special_skills_by_id($mid){
		$query = "SELECT * FROM special_skills WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function verify_special_skills_by_id($mid){
		$query = "SELECT * FROM special_skills WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() === 1){
			return true;
		}else{
			return false;
		}
	}

	function update_special_skills($id, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing){
		$query = "UPDATE special_skills SET none=?, agri=?, tech=?, construct=?, singing=?, dancing=?, carpentry=?, computer=?, drawing=?, dress=?, sports=?, arts=?, music=?, business=?, swimming=?, writing=? WHERE id=?";
		$value = array($none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function get_interest_hobbies_by_id($mid){
		$query = "SELECT * FROM interest_hobbies WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	function verify_interest_hobbies_by_id($mid){
		$query = "SELECT * FROM interest_hobbies WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() === 1){
			return true;
		}else{
			return false;
		}
	}

	function update_interest_hobbies($id, $internet, $watch, $sports, $music, $arts, $singing, $dancing){
		$query = "UPDATE interest_hobbies SET internet=?, watch=?, sports=?, music=?, arts=?, singing=?, dancing=? WHERE id=?";
		$value = array($internet, $watch, $sports, $music, $arts, $singing, $dancing, $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function get_work_experience($mid){
		$query = "SELECT * FROM work_experience WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_work_experience_by_id($id){
		$query = "SELECT * FROM work_experience WHERE id=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_work_experience($postData, $id){
		$query = "UPDATE work_experience SET workDate=?, jobTitle=?, monIncome=?, reLeave=? WHERE id=?";
		$value = array(ucwords($postData['workDate']), $postData['jobTitle'], $postData['monIncome'], ucwords($postData['reLeave']), $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function delete_work_experience($id){
		$query = "DELETE FROM work_experience WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function get_member_organization($mid){
		$query = "SELECT * FROM organizations WHERE mid=?";
		$result = $this->db->query($query, array($mid));
		if($result){
			return $result->result();
		}else{
			return false;
		}
	}

	function get_member_organization_by_id($id){
		$query = "SELECT * FROM organizations WHERE id=?";
		$result = $this->db->query( $query, array($id));
		if($result->num_rows() === 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function update_member_organization($postData, $id){
		$query = "UPDATE organizations SET nameOrg=?, posHeld=?, orgYear=? WHERE id=?";
		$value = array(ucwords($postData['nameOrg']), ucwords($postData['posHeld']), $postData['orgYear'], $id);
		$updated = $this->db->query($query, $value);
		if($updated){
			return true;
		}else{
			return false;
		}
	}

	function delete_member_organization($id){
		$query = "DELETE FROM organizations WHERE id=?";
		$result = $this->db->query($query, array($id));
		if($result){
			return true;
		}else{
			return false;
		}
	}

}