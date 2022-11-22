<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagemodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function automatic_age_update(){
		$query = $this->db->get('members'); 
		$members = $query->result();
		foreach($members as $member){
			$this->update_member_age($member->mid, $member->dBirth);
		}
	}

	function update_member_age($mid, $birthday){
		$bYear = date('Y', strtotime($birthday));
        $tYear = date('Y');
        $bMonth = date('m', strtotime($birthday));
        $tMonth = date('m');
        $bDate = date('d', strtotime($birthday));
        $tDate = date('d');
        $age = $tYear - $bYear;
        $m = $tMonth - $bMonth;
        if($tMonth < $bMonth || ($tMonth == $bMonth &&  $tDate < $bDate)){
            $age--;
       	}
       	$query = "UPDATE members SET age=? WHERE mid=?";
		$value = array($age, $mid);
		$this->db->query($query, $value);
	}

	function fetch_site_contacts(){
		$result = $this->db->get('contacts');
		if($result->num_rows() == 1){
			return $result->row();
		}else{
			return false;
		}
	}

}