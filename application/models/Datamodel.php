<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_municipal($municipal){
		$query = "SELECT * FROM municipals WHERE municipal=?";
		$result = $this->db->query( $query, array($municipal));
		if($result->num_rows() == 1){
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

	function verify_member($postData){
		if($postData['ext'] != ''){
			$query = "SELECT fName, mName, lName, ext FROM members WHERE fName=? AND mName=? AND lName=? AND ext=?";
			$value = array($postData['fName'], $postData['mName'], $postData['lName'], $postData['ext']);
			$result = $this->db->query($query, $value);
			if($result->num_rows() == 1){
				return true;
			}else{
				return false;
			}
		}else{
			$query = "SELECT fName, mName, lName FROM members WHERE fName=? AND mName=? AND lName=?";
			$value = array($postData['fName'], $postData['mName'], $postData['lName']);
			$result = $this->db->query($query, $value);
			if($result->num_rows() == 1){
				return true;
			}else{
				return false;
			}
		}
	}

	function insert_identifying_data($brgy_id, $mun_id, $postData, $staff, $photo){
		$query = "INSERT INTO members (photo, brgy_id , mun_id, fName, mName, lName, ext, sex, dBirth, age, civilStat, brgy, mun, prov, region, bBrgy, bMun, bProv, bRegion, religion, celNo, email, fathName, fathAge, fathOccup, fathIncome, mothName, mothAge, mothOccup, mothIncome, added_by, added_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
		$value = array($photo, $brgy_id, $mun_id, ucwords($postData['fName']), ucwords($postData['mName']), ucwords($postData['lName']), $postData['ext'], $postData['sex'], $postData['dBirth'], $postData['age'], $postData['civilStat'], ucwords($postData['brgy']), $postData['mun'], $postData['prov'], $postData['region'], ucwords($postData['bBrgy']), ucwords($postData['bMun']), ucwords($postData['bProv']), $postData['bRegion'], ucwords($postData['religion']), $postData['celNo'], $postData['email'], ucwords($postData['fathName']), $postData['fathAge'], ucwords($postData['fathOccup']), $postData['fathIncome'], ucwords($postData['mothName']), $postData['mothAge'], ucwords($postData['mothOccup']), $postData['mothIncome'], $staff);
		$inserted = $this->db->query($query, $value);
		if($inserted){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	function count_members($brgy_id){
		$this->db->where('brgy_id', $brgy_id);
		$query = $this->db->get('members'); 
		$members = $query->result();
		return count($members);
	}

	function update_barangay_pyap($brgy_id){
		$this->db->query("UPDATE barangays SET wPyap=1, started=DATE_ADD(NOW(), INTERVAL 1 MINUTE) WHERE brgy_id=$brgy_id");
		return true;
	}

	function insert_children($mid, $postData){
		for($i = 0; $i < count($postData['childName']); $i++){
			$batch[] = array(
				'mid' => $mid,
				'childName' => ucwords($postData['childName'][$i]),
				'childSex' => ucwords($postData['childSex'][$i]),
				'childAge' => $postData['childAge'][$i],
			);
		}
		$this->db->insert_batch('children', $batch);
	}

	function insert_siblings($mid, $postData){
		for($i = 0; $i < count($postData['sibName']); $i++){
			$batch[] = array(
				'mid' => $mid,
				'sibName' => ucwords($postData['sibName'][$i]),
				'sibSex' => $postData['sibSex'][$i],
				'sibAge' => $postData['sibAge'][$i],
				'sibOccup' => ucwords($postData['sibOccup'][$i]),
				'sibGrYr' => ucwords($postData['sibGrYr'][$i]),
				'sibIOSY' => $postData['sibIOSY'][$i],
			);
		}
		$inserted = $this->db->insert_batch('siblings', array_filter($batch));
		if($inserted){
			return true;
		}else{
			return false;
		}
	}

	function insert_educational_background($mid, $postData){
		$query = "INSERT INTO educational_background (mid, eName, eAddr, eLevel, eStat, eFrom, eTo, sName, sAddr, sLevel, sStat, sFrom, sTo, cName, cAddr, cLevel, cStat, cDegree, cFrom, cTo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, ucwords($postData['eName']), ucwords($postData['eAddr']), $postData['eLevel'], $postData['eStat'], $postData['eFrom'], $postData['eTo'], ucwords($postData['sName']), ucwords($postData['sAddr']), $postData['sLevel'], $postData['sStat'], $postData['sFrom'], $postData['sTo'], ucwords($postData['cName']), ucwords($postData['cAddr']), $postData['cLevel'], $postData['cStat'], ucwords($postData['cDegree']), $postData['cFrom'], $postData['cTo']);
		$inserted = $this->db->query($query, $value);
		if($inserted){
			return true;
		}else{
			return false;
		}
	}

	function insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad){
		$query = "INSERT INTO attainment(mid, educStat, elemLevel, elemGrad, hsLevel, hsGrad, colLevel, colGrad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
		$this->db->query($query, $value);
	}

	function get_member_ids($mid){
		$query = "SELECT * FROM members WHERE mid=?";
		$result = $this->db->query( $query, array($mid));
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

	function verify_reason_for_dropping($mid){
		$query = "SELECT * FROM reasons WHERE mid=?";
		$result = $this->db->query($query, array($mid));
		if($result->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	function insert_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb){
		$query = "INSERT INTO reasons (mid, level, finProb, nInterest, famProb, ePreg, hProb) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb);
		$this->db->query($query, $value);
	}

	function insert_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb){
		$query = "INSERT INTO reasons (mid, level, finProb, nInterest, famProb, ePreg, hProb) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb);
		$this->db->query($query, $value);
	}

	function insert_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb){
		$query = "INSERT INTO reasons (mid, level, finProb, nInterest, famProb, ePreg, hProb) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb);
		$this->db->query($query, $value);
	}

	function insert_special_skills($mid, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing){
		$query = "INSERT INTO special_skills (mid, none, agri, tech, construct, singing, dancing, carpentry, computer, drawing, dress, sports, arts, music, business, swimming, writing) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing);
		$inserted = $this->db->query($query, $value);
		if($inserted){
			return true;
		}else{
			return false;
		}
	}

	function insert_interest_hobbies($mid, $internet, $watch, $sports, $music, $arts, $singing, $dancing){
		$query = "INSERT INTO interest_hobbies (mid, internet, watch, sports, music, arts, singing, dancing) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$value = array($mid, $internet, $watch, $sports, $music, $arts, $singing, $dancing);
		$inserted = $this->db->query($query, $value);
		if($inserted){
			return true;
		}else{
			return false;
		}
	}
	function insert_work_labor_experience($mid, $postData){
		for($i = 0; $i < count($postData['workDate']); $i++){
			$batch[] = array(
					'mid' => $mid,
					'workDate' => $postData['workDate'][$i],
					'jobTitle' => ucwords($postData['jobTitle'][$i]),
					'monIncome' => $postData['monIncome'][$i],
					'reLeave' => ucwords($postData['reLeave'][$i])
				);
		}
		$inserted = $this->db->insert_batch('work_experience', $batch);
		if($inserted){
			return true;
		}else{
			return false;
		}
	}

	function insert_membership_on_organizations($mid, $postData){
		for($i = 0; $i < count($postData['nameOrg']); $i++){
			$batch[] = array(
					'mid' => $mid,
					'nameOrg' => ucwords($postData['nameOrg'][$i]),
					'posHeld' => ucwords($postData['posHeld'][$i]),
					'orgYear' => $postData['orgYear'][$i]
				);
		}
		$inserted = $this->db->insert_batch('organizations', $batch);
		if($inserted){
			return true;
		}else{
			return false;
		}
	}

}