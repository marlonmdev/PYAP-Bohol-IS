<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authmodel extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	function get_login_info($uname){
		$query = "SELECT * FROM accounts WHERE uname = ?";
		$value = array($uname);
		$user = $this->db->query( $query, $value);
		if($user->num_rows() == 1){
			return $user->row();
		}else{
			return false;
		}	
	}

	function insert_log($name, $email, $role, $municipal, $browser, $ip_addr, $os){
		$query = "INSERT INTO logs (name, email, role, municipal, browser, ip_addr, os, logged_on) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
		$value = array($name, $email, $role, $municipal, $browser, $ip_addr, $os);
		$insert = $this->db->query($query, $value);
	}

}