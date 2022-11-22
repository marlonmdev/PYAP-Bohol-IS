<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('members_last_24_hours')){
	function members_last_24_hours(){
		$ci = get_instance();
		$time = @strtotime('-1 day', time());
		$mtime = @date('Y-m-d H:i:s', $time);

		$sql = "SELECT count(*) as count FROM members WHERE added_on > '{$mtime}'";
		$result = $ci->db->query($sql);
		$row = $result->row();
		echo $row->count;
	} 
}

if(!function_exists('members_this_month')){
	function members_this_month(){
		$ci = get_instance();
		$time = @strtotime('month', time());
		$mtime = @date('Y-m-d H:i:s', $time);

		$sql = "SELECT count(*) as count FROM members WHERE added_on > '{$mtime}'";
		$result = $ci->db->query($sql);
		$row = $result->row();
		echo $row->count;
	} 
}

if(!function_exists('login_last_24_hours')){
	function login_last_24_hours(){
		$ci = get_instance();
		$time = @strtotime('-1 day', time());
		$mtime = @date('Y-m-d H:i:s', $time);

		$sql = "SELECT count(*) as count FROM logs WHERE logged_on > '{$mtime}'";
		$result = $ci->db->query($sql);
		$row = $result->row();
		echo $row->count;
	} 
}

if(!function_exists('login_this_month')){
	function login_this_month(){
		$ci = get_instance();
		$time = @strtotime('month', time());
		$mtime = @date('Y-m-d H:i:s', $time);

		$sql = "SELECT count(*) as count FROM logs WHERE logged_on > '{$mtime}'";
		$result = $ci->db->query($sql);
		$row = $result->row();
		echo $row->count;
	} 
}


