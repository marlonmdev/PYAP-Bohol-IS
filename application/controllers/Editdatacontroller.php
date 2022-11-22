<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editdatacontroller extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('editdatamodel', 'edm');
	}

	function permission() {
        $logged = $this->session->userdata('logged_in');
        $role = $this->session->userdata('role');
        if (isset($logged) && !empty($logged) && isset($role) && $role == 'LGU User') {
            return true;
        }
    }

	function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            header('location:http://'.$_SERVER['SERVER_NAME']);
        }
        exit();
    }

    function edit_identifying_data(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $uid = $this->session->userdata('id');
                $this->load->model('accountmodel', 'acm');
                $data['val'] = $this->acm->fetch_account($uid);
                $data['row'] = $this->edm->get_identifying_data_by_id($mid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/edit_identifying_data', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function update_identifying_data(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $config_image = array();
                $config_image['upload_path'] = './members/';
                $config_image['allowed_types'] = 'jpg|png|gif';
                $config_image['encrypt_name'] = TRUE;
                $municipal = $this->session->userdata('municipal');
                $this->load->model('datamodel', 'dm');
                $mun = $this->dm->get_municipal($municipal);
                $mun_id = $mun->mun_id;
                $brgy = $this->input->post('brgy');
                $barangay = $this->dm->get_barangay_id($brgy, $mun_id);
                $brgy_id = $barangay->brgy_id;
                $postData = $this->input->post();
                $civilStat = $this->input->post('civilStat');
                $this->load->library('upload', $config_image);
                $this->upload->do_upload();
                $data = array('upload_data' => $this->upload->data());
                $this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
                $pic = $data['upload_data']['file_name'];
                $defaultpic_path = './members/thumbs/default.png';
                $result = $this->edm->get_member_photo_id($mid);
                $pic_path = './members/thumbs/'.$result->photo;
                if(empty($pic))
                {
                    $photo = $result->photo;
                }
                else
                {
                    $pic_path = './members/thumbs/'.$result->photo;
                    if($pic_path != $defaultpic_path)
                    {
                        if(file_exists($pic_path))
                        {
                            unlink($pic_path);
                        }
                    }
                    $photo = $data['upload_data']['file_name'];
                }
                $result = $this->edm->update_identifying_data($brgy_id, $postData, $photo, $mid);
                if($result){
                    $mem = $this->edm->get_member_photo_id($mid);
                    $pic_path = './members/'.$mem->photo;
                    $defaultpic_path = './members/default.png';
                    if($pic_path != $defaultpic_path){
                        if(file_exists($pic_path)){
                            unlink($pic_path);
                        }
                    }
                    $arr = array ('success' => 'Successfully updated identifying data');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Unable to update identifying data');
                    $this->session->set_flashdata($arr);
                    $this->redirect_back();
                }
            }
        }
    }

    function image_resize($path, $file){
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['width'] = '225';
        $config_resize['height'] = '215';
        $config_resize['new_image'] = './members/thumbs/'.$file;
        $this->load->library('image_lib', $config_resize);
        $this->image_lib->resize();
    }

    function edit_educational_background(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $uid = $this->session->userdata('id');
                $this->load->model('accountmodel', 'acm');
                $data['val'] = $this->acm->fetch_account($uid);
                $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                $data['row'] = $this->edm->get_educational_background_by_id($mid);
                $data['res']= $this->edm->get_reasons_by_id($mid);
                if(!empty($data['row'])){
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/edit_educational_background', $data);
                    $this->load->view('sPartials/footer');
                }else{
                    $data['id'] = $mid;
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/update_educational_background', $data);
                    $this->load->view('sPartials/footer');
                }
            }
        }
    }

    function update_educational_background(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $eStat = $this->input->post('eStat');
                $sStat = $this->input->post('sStat');
                $cStat = $this->input->post('cStat');
                $postData = $this->input->post();
                $result = $this->edm->update_educational_background($postData, $mid);
                if($result){
                    if($cStat == 'Graduated' || $cStat == 'Graduated' && $sStat == 'Graduated' && $eStat == 'Graduated'){
                        $educStat = 'Graduated';
                        $this->update_col_attainment2($mid, $educStat);
                        $this->update_reasons_for_dropping3($mid);
                    }elseif($cStat == 'Out of School' || $cStat == 'Out of School' && $sStat == 'Out of School' && $eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->update_col_attainment1($mid, $educStat);
                        $this->update_reasons_for_dropping3($mid);
                    }elseif($cStat == 'In School'){
                        $educStat = 'ISY';
                        $this->update_col_attainment1($mid, $educStat);
                    }elseif($sStat == 'Graduated' || $sStat == 'Graduated' && $eStat == 'Graduated'){
                        $educStat = 'OSY';
                        $this->update_hs_attainment2($mid, $educStat);
                    }elseif($sStat == 'Out of School' || $sStat == 'Out of School' && $eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->update_hs_attainment1($mid, $educStat);
                        $this->update_reasons_for_dropping2($mid);
                    }elseif($sStat == 'In School'){
                        $educStat = 'ISY';
                        $this->update_hs_attainment1($mid, $educStat);
                    }elseif($eStat == 'Graduated'){
                        $educStat = 'OSY';
                        $this->update_elem_attainment2($mid, $educStat);
                    }elseif($eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->update_elem_attainment1($mid, $educStat);
                        $this->update_reasons_for_dropping1($mid);
                    }elseif($eStat == 'In School'){
                        $educStat = 'ISY';
                        $this->update_elem_attainment1($mid, $educStat);
                    }
                    $arr = array('success' => 'Successfully updated educational background');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array('error' => 'Unable to update educational background');
                    $this->session->set_flashdata($arr);
                    $this->redirect_back();
                }
            }
        }
    }  

    function update_elem_attainment1($mid, $educStat){
        $elemLevel = 1;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    }

    function update_elem_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 1;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    }

    function update_hs_attainment1($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 1;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    }

    function update_hs_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 1;
        $colLevel = 0;
        $colGrad = 0;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    }

    function update_col_attainment1($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 1;
        $colGrad = 0;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    }

    function update_col_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 1;
        $verified = $this->edm->verify_attainment($mid);
        if($verified){
            $this->edm->update_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }else{
            $this->load->model('datamodel', 'dm');
            $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
        }
    } 

    function update_reasons_for_dropping1($mid){
        $eFinProb = $this->input->post('eFinProb');
        if(empty($eFinProb)){ $eFinProb = 0; }
        $eNInterest = $this->input->post('eNInterest');
        if(empty($eNInterest)){ $eNInterest = 0; }
        $eFamProb = $this->input->post('eFamProb');
        if(empty($eFamProb)){ $eFamProb = 0; }
        $eEPreg = $this->input->post('eEPreg');
        if(empty($eEPreg)){ $eEPreg = 0; }
        $eHProb = $this->input->post('eHProb');
        if(empty($eHProb)){ $eHProb = 0; }
        $this->load->model('datamodel', 'dm');
        $level = 'Elementary';
        $verified = $this->dm->verify_reason_for_dropping($mid);
        if($verified){
            $this->edm->update_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb);
        }else{
            $this->dm->insert_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb);
        }
    }

    function update_reasons_for_dropping2($mid){
        $sFinProb = $this->input->post('sFinProb');
        if(empty($sFinProb)){ $sFinProb = 0; }
        $sNInterest = $this->input->post('sNInterest');
        if(empty($sNInterest)){ $sNInterest = 0; }
        $sFamProb = $this->input->post('sFamProb');
        if(empty($sFamProb)){ $sFamProb = 0; }
        $sEPreg = $this->input->post('sEPreg');
        if(empty($sEPreg)){ $sEPreg = 0; }
        $sHProb = $this->input->post('sHProb');
        if(empty($sHProb)){ $sHProb = 0; }
        $this->load->model('datamodel', 'dm');
        $level = 'Secondary';
        $verified = $this->dm->verify_reason_for_dropping($mid);
        if($verified){
            $this->edm->update_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb);
        }else{
            $this->dm->insert_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb);
        }
    }

    function update_reasons_for_dropping3($mid){
        $cFinProb = $this->input->post('cFinProb');
        if(empty($cFinProb)){ $cFinProb = 0; }
        $cNInterest = $this->input->post('cNInterest');
        if(empty($cNInterest)){ $cNInterest = 0; }
        $cFamProb = $this->input->post('cFamProb');
        if(empty($cFamProb)){ $cFamProb = 0; }
        $cEPreg = $this->input->post('cEPreg');
        if(empty($cEPreg)){ $cEPreg = 0; }
        $cHProb = $this->input->post('cHProb');
        if(empty($cHProb)){ $cHProb = 0; }
        $this->load->model('datamodel', 'dm');
        $level = 'College';
        $verified = $this->dm->verify_reason_for_dropping($mid);
        if($verified){
            $this->edm->update_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb);
        }else{
            $this->dm->insert_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb);
        }
    }

    function save_educational_background(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $eStat = $this->input->post('eStat');
                $sStat = $this->input->post('sStat');
                $cStat = $this->input->post('cStat');
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_educational_background($mid, $postData);
                if($result){
                    if($cStat == 'Graduated' || $cStat == 'Graduated' && $sStat == 'Graduated' && $eStat == 'Graduated'){
                        $educStat = 'Graduated';
                        $this->save_col_attainment2($mid, $educStat);
                        $this->save_reasons_for_dropping3($mid);
                    }elseif($cStat == 'Out of School' || $cStat == 'Out of School' && $sStat == 'Out of School' && $eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->save_col_attainment1($mid, $educStat);
                        $this->save_reasons_for_dropping3($mid);
                    }elseif($cStat == 'In School'){
                        $educStat = 'ISY';
                        $this->save_col_attainment1($mid, $educStat);
                    }elseif($sStat == 'Graduated' || $sStat == 'Graduated' && $eStat == 'Graduated'){
                        $educStat = 'OSY';
                        $this->save_hs_attainment2($mid, $educStat);
                    }elseif($sStat == 'Out of School' || $sStat == 'Out of School' && $eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->save_hs_attainment1($mid, $educStat);
                        $this->save_reasons_for_dropping2($mid);
                    }elseif($sStat == 'In School'){
                        $educStat = 'ISY';
                        $this->save_hs_attainment1($mid, $educStat);
                    }elseif($eStat == 'Graduated'){
                        $educStat = 'OSY';
                        $this->save_elem_attainment2($mid, $educStat);
                    }elseif($eStat == 'Out of School'){
                        $educStat = 'OSY';
                        $this->save_elem_attainment1($mid, $educStat);
                        $this->save_reasons_for_dropping1($mid);
                    }elseif($eStat == 'In School'){
                        $educStat = 'ISY';
                        $this->save_elem_attainment1($mid, $educStat);
                    }
                    $arr = array ('success' => 'Successfully updated educational background');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Unable to update educational background');
                    $this->session->set_flashdata($arr);
                    $this->redirect_back();
                }
            }
        }
    }

    function save_elem_attainment1($mid, $educStat){
        $elemLevel = 1;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_elem_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 1;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_hs_attainment1($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 1;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 0;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_hs_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 1;
        $colLevel = 0;
        $colGrad = 0;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_col_attainment1($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 1;
        $colGrad = 0;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_col_attainment2($mid, $educStat){
        $elemLevel = 0;
        $elemGrad = 0;
        $hsLevel = 0;
        $hsGrad = 0;
        $colLevel = 0;
        $colGrad = 1;
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_attainment($mid, $educStat, $elemLevel, $elemGrad, $hsLevel, $hsGrad, $colLevel, $colGrad);
    }

    function save_reasons_for_dropping1($mid){
        $eFinProb = $this->input->post('eFinProb');
        if(empty($eFinProb)){ $eFinProb = 0; }
        $eNInterest = $this->input->post('eNInterest');
        if(empty($eNInterest)){ $eNInterest = 0; }
        $eFamProb = $this->input->post('eFamProb');
        if(empty($eFamProb)){ $eFamProb = 0; }
        $eEPreg = $this->input->post('eEPreg');
        if(empty($eEPreg)){ $eEPreg = 0; }
        $eHProb = $this->input->post('eHProb');
        if(empty($eHProb)){ $eHProb = 0; }
        $level = 'Elementary';
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_reasons_for_dropping1($mid, $level, $eFinProb, $eNInterest, $eFamProb, $eEPreg, $eHProb);
    }

    function save_reasons_for_dropping2($mid){
        $sFinProb = $this->input->post('sFinProb');
        if(empty($sFinProb)){ $sFinProb = 0; }
        $sNInterest = $this->input->post('sNInterest');
        if(empty($sNInterest)){ $sNInterest = 0; }
        $sFamProb = $this->input->post('sFamProb');
        if(empty($sFamProb)){ $sFamProb = 0; }
        $sEPreg = $this->input->post('sEPreg');
        if(empty($sEPreg)){ $sEPreg = 0; }
        $sHProb = $this->input->post('sHProb');
        if(empty($sHProb)){ $sHProb = 0; }
        $cFinProb = $this->input->post('cFinProb');
        $level = 'Secondary';
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_reasons_for_dropping2($mid, $level, $sFinProb, $sNInterest, $sFamProb, $sEPreg, $sHProb);
    }

    function save_reasons_for_dropping3($mid){
        $cFinProb = $this->input->post('cFinProb');
        if(empty($cFinProb)){ $cFinProb = 0; }
        $cNInterest = $this->input->post('cNInterest');
        if(empty($cNInterest)){ $cNInterest = 0; }
        $cFamProb = $this->input->post('cFamProb');
        if(empty($cFamProb)){ $cFamProb = 0; }
        $cEPreg = $this->input->post('cEPreg');
        if(empty($cEPreg)){ $cEPreg = 0; }
        $cHProb = $this->input->post('cHProb');
        if(empty($cHProb)){ $cHProb = 0; }
        $level = 'College';
        $this->load->model('datamodel', 'dm');
        $this->dm->insert_reasons_for_dropping3($mid, $level, $cFinProb, $cNInterest, $cFamProb, $cEPreg, $cHProb);
    }


    function view_siblings(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                $data['content'] = $this->edm->get_siblings($mid);
                $data['id'] = $mid;
                $this->load->model('accountmodel', 'acm');
                $uid = $this->session->userdata('id');
                $data['row'] = $this->acm->fetch_account($uid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/view_siblings', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function edit_sibling(){
        $id = $this->uri->segment(5);
        if(!is_numeric($id)){
            $this->load->view('partials/header');
            $this->load->view('pages/error');
            $this->load->view('partials/footer');
        }else{
            $data['val'] = $this->edm->get_sibling_by_id($id);
            $this->load->model('accountmodel', 'acm');
            $uid = $this->session->userdata('id');
            $data['row'] = $this->acm->fetch_account($uid);
            $this->load->view('sPartials/header');
            $this->load->view('staff/edit_sibling', $data);
            $this->load->view('sPartials/footer');
        }
    }

    function update_sibling(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(6);
            $mid= $this->input->post('mid');
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $result = $this->edm->update_sibling($postData, $id);
                if($result){
                    $arr = array ('success' => 'Successfully updated sibling');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/siblings/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to update sibling');
                    $this->session->set_flashdata($arr);
                   redirect('/lgu/members/view/siblings/'.$mid);
                }
            }
        }
    }   

    function add_more_siblings(){
         if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $uid = $this->session->userdata('id');
                $this->load->model('accountmodel', 'acm');
                $data['val'] = $this->acm->fetch_account($uid);
                $data['row'] = $this->edm->get_educational_background_by_id($mid);
                $data['id'] = $mid;
                $this->load->view('sPartials/header');
                $this->load->view('staff/update_siblings', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function save_more_siblings(){
         if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(7);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_siblings($mid, $postData);
                if($result){
                    $arr = array ('success' => 'Successfully added sibling/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/siblings/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to add sibling/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/siblings/'.$mid);
                }
            }
        }
    }

    function delete_sibling(){
        $id = $this->uri->segment(5);
        if(!is_numeric($id)){
            $this->load->view('partials/header');
            $this->load->view('pages/error');
            $this->load->view('partials/footer');
        }else{
            $result = $this->edm->delete_sibling($id);
            if($result){
                $arr = array ('success' => 'Sibling deleted successfully');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
            else{
                $arr = array ('error' => 'Sibling delete failed');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
        }
    }

    function edit_special_skills(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $verify = $this->edm->verify_special_skills_by_id($mid);
                if($verify){
                    $data['row'] = $this->edm->get_special_skills_by_id($mid);
                    $this->load->model('accountmodel', 'acm');
                    $uid = $this->session->userdata('id');
                    $data['val'] = $this->acm->fetch_account($uid);
                    $data['id'] = $mid;
                    $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/edit_special_skills', $data);
                    $this->load->view('sPartials/footer');
                }else{
                    $this->load->model('accountmodel', 'acm');
                    $uid = $this->session->userdata('id');
                    $data['val'] = $this->acm->fetch_account($uid);
                    $data['id'] = $mid;
                    $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/update_special_skills', $data);
                    $this->load->view('sPartials/footer');
                }
            }
        }
    }

    function add_special_skills(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $none = $this->input->post('none');
                if(empty($none)){ $none = 0; }
                $agri = $this->input->post('agri');
                if(empty($agri)){ $agri = 0; }
                $tech = $this->input->post('tech');
                if(empty($tech)){ $tech = 0; }
                $construct = $this->input->post('construct');
                if(empty($construct)){ $construct = 0; }
                $singing = $this->input->post('singing');
                if(empty($singing)){ $singing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $carpentry = $this->input->post('carpentry');
                if(empty($carpentry)){ $carpentry = 0; }
                $computer = $this->input->post('computer');
                if(empty($computer)){ $computer = 0; }
                $drawing = $this->input->post('drawing');
                if(empty($drawing)){ $drawing = 0; }
                $dress = $this->input->post('dress');
                if(empty($dress)){ $dress = 0; }
                $sports = $this->input->post('sports');
                if(empty($sports)){ $sports = 0; }
                $arts = $this->input->post('arts');
                if(empty($arts)){ $arts = 0; }
                $music = $this->input->post('music');
                if(empty($music)){ $music = 0; }
                $business = $this->input->post('business');
                if(empty($business)){ $business = 0; }
                $swimming = $this->input->post('swimming');
                if(empty($swimming)){ $swimming = 0; }
                $writing = $this->input->post('writing');
                if(empty($writing)){ $writing = 0; }
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_special_skills($mid, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing);
                if($result){
                    $arr = array ('success' => 'Special skills updated successfully');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Special skills update failed');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }
            }
        }
    }

    function update_special_skills(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(6);
            $mid = $this->input->post('mid');
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $none = $this->input->post('none');
                if(empty($none)){ $none = 0; }
                $agri = $this->input->post('agri');
                if(empty($agri)){ $agri = 0; }
                $tech = $this->input->post('tech');
                if(empty($tech)){ $tech = 0; }
                $construct = $this->input->post('construct');
                if(empty($construct)){ $construct = 0; }
                $singing = $this->input->post('singing');
                if(empty($singing)){ $singing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $carpentry = $this->input->post('carpentry');
                if(empty($carpentry)){ $carpentry = 0; }
                $computer = $this->input->post('computer');
                if(empty($computer)){ $computer = 0; }
                $drawing = $this->input->post('drawing');
                if(empty($drawing)){ $drawing = 0; }
                $dress = $this->input->post('dress');
                if(empty($dress)){ $dress = 0; }
                $sports = $this->input->post('sports');
                if(empty($sports)){ $sports = 0; }
                $arts = $this->input->post('arts');
                if(empty($arts)){ $arts = 0; }
                $music = $this->input->post('music');
                if(empty($music)){ $music = 0; }
                $business = $this->input->post('business');
                if(empty($business)){ $business = 0; }
                $swimming = $this->input->post('swimming');
                if(empty($swimming)){ $swimming = 0; }
                $writing = $this->input->post('writing');
                if(empty($writing)){ $writing = 0; }
                $this->load->model('datamodel', 'dm');
                $result = $this->edm->update_special_skills($id, $none, $agri, $tech, $construct, $singing, $dancing, $carpentry, $computer, $drawing, $dress, $sports, $arts, $music, $business, $swimming, $writing);
                if($result){
                    $arr = array ('success' => 'Special skills updated successfully');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Special skills update failed');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }
            }
        }
    }

    function edit_interest_hobbies(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $verify = $this->edm->verify_interest_hobbies_by_id($mid);
                if($verify){
                    $data['row'] = $this->edm->get_interest_hobbies_by_id($mid);
                    $this->load->model('accountmodel', 'acm');
                    $uid = $this->session->userdata('id');
                    $data['val'] = $this->acm->fetch_account($uid);
                    $data['id'] = $mid;
                    $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/edit_interest_hobbies', $data);
                    $this->load->view('sPartials/footer');
                }else{
                    $this->load->model('accountmodel', 'acm');
                    $uid = $this->session->userdata('id');
                    $data['val'] = $this->acm->fetch_account($uid);
                    $data['id'] = $mid;
                    $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                    $this->load->view('sPartials/header');
                    $this->load->view('staff/update_interest_hobbies', $data);
                    $this->load->view('sPartials/footer');
                }  
            }
        }
    }

    function add_interest_hobbies(){
        if(!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $internet = $this->input->post('internet');
                if(empty($internet)){ $internet = 0; }
                $watch = $this->input->post('watch');
                if(empty($watch)){ $watch = 0; }
                $sports = $this->input->post('sports');
                if(empty($sports)){ $sports = 0; }
                $music = $this->input->post('music');
                if(empty($music)){ $music = 0; }
                $arts = $this->input->post('arts');
                if(empty($arts)){ $arts = 0; }
                $singing = $this->input->post('singing');
                if(empty($singing)){ $singing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_interest_hobbies($mid, $internet, $watch, $sports, $music, $arts, $singing, $dancing);
                if($result){
                    $arr = array ('success' => 'Interest/hobbies updated successfully');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Interest/hobbies updated update failed');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }
            }
        }
    }

    function update_interest_hobbies(){
        if(!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(6);
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $internet = $this->input->post('internet');
                if(empty($internet)){ $internet = 0; }
                $watch = $this->input->post('watch');
                if(empty($watch)){ $watch = 0; }
                $sports = $this->input->post('sports');
                if(empty($sports)){ $sports = 0; }
                $music = $this->input->post('music');
                if(empty($music)){ $music = 0; }
                $arts = $this->input->post('arts');
                if(empty($arts)){ $arts = 0; }
                $singing = $this->input->post('singing');
                if(empty($singing)){ $singing = 0; }
                $dancing = $this->input->post('dancing');
                if(empty($dancing)){ $dancing = 0; }
                $result = $this->edm->update_interest_hobbies($id, $internet, $watch, $sports, $music, $arts, $singing, $dancing);
                if($result){
                    $arr = array ('success' => 'Interest/hobbies updated successfully');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }else{
                    $arr = array ('error' => 'Interest/hobbies updated update failed');
                    $this->session->set_flashdata($arr);
                    redirect('lgu/members');
                }
            }
        }
    }

    function view_work_experience(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $this->load->model('editdatamodel', 'edm');
                $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                $data['content'] = $this->edm->get_work_experience($mid);
                $data['id'] = $mid;
                $this->load->model('accountmodel', 'acm');
                $uid = $this->session->userdata('id');
                $data['row'] = $this->acm->fetch_account($uid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/view_work_experience', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function add_more_work_experience(){
         if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $uid = $this->session->userdata('id');
                $this->load->model('accountmodel', 'acm');
                $data['val'] = $this->acm->fetch_account($uid);
                $this->load->model('editdatamodel', 'edm');
                $data['id'] = $mid;
                $this->load->view('sPartials/header');
                $this->load->view('staff/update_work_experience', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function save_more_work_experience(){
        if(!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(7);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_work_labor_experience($mid, $postData);
                if($result){
                    $arr = array ('success' => 'Successfully added work experience/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/work_experience/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to add work experience/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/work_experience/'.$mid);
                }
            }
        }
    }

    function edit_work_experience(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(5);
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $data['row'] = $this->edm->get_work_experience_by_id($id);
                $this->load->model('accountmodel', 'acm');
                $uid = $this->session->userdata('id');
                $data['val'] = $this->acm->fetch_account($uid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/edit_work_experience', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function update_work_experience(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(6);
            $mid= $this->input->post('mid');
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $result = $this->edm->update_work_experience($postData, $id);
                if($result){
                    $arr = array ('success' => 'Successfully updated work experience');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/work_experience/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to update work experience');
                    $this->session->set_flashdata($arr);
                   redirect('/lgu/members/view/work_experience/'.$mid);
                }
            }
        }
    }   

    function delete_work_experience(){
        $id = $this->uri->segment(5);
        if(!is_numeric($id)){
            $this->load->view('partials/header');
            $this->load->view('pages/error');
            $this->load->view('partials/footer');
        }else{
            $result = $this->edm->delete_work_experience($id);
            if($result){
                $arr = array ('success' => 'Work experience deleted successfully');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
            else{
                $arr = array ('error' => 'Work experience delete failed');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
        }
    }

    function view_member_organization(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{
            $mid = $this->uri->segment(5);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $data['info'] = $this->edm->get_identifying_data_by_id($mid);
                $data['content'] = $this->edm->get_member_organization($mid);
                $data['id'] = $mid;
                $this->load->model('accountmodel', 'acm');
                $uid = $this->session->userdata('id');
                $data['row'] = $this->acm->fetch_account($uid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/view_member_organization', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function add_more_organization(){
        if(!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(6);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $uid = $this->session->userdata('id');
                $this->load->model('accountmodel', 'acm');
                $data['val'] = $this->acm->fetch_account($uid);
                $data['id'] = $mid;
                $this->load->view('sPartials/header');
                $this->load->view('staff/update_member_organization', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function save_more_organization(){
        if(!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $mid = $this->uri->segment(7);
            if(!is_numeric($mid)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $this->load->model('datamodel', 'dm');
                $result = $this->dm->insert_membership_on_organizations($mid, $postData);
                if($result){
                    $arr = array ('success' => 'Successfully added organization/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/member_organization/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to add organization/s');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/member_organization/'.$mid);
                }
            }
        }
    }

    function edit_member_organization(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(5);
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $this->load->model('editdatamodel', 'edm');
                $data['row'] = $this->edm->get_member_organization_by_id($id);
                $this->load->model('accountmodel', 'acm');
                $uid = $this->session->userdata('id');
                $data['val'] = $this->acm->fetch_account($uid);
                $this->load->view('sPartials/header');
                $this->load->view('staff/edit_member_organization', $data);
                $this->load->view('sPartials/footer');
            }
        }
    }

    function update_member_organization(){
        if (!$this->permission()) {
            redirect(base_url().'login');
        }else{  
            $id = $this->uri->segment(6);
            $mid= $this->input->post('mid');
            if(!is_numeric($id)){
                $this->load->view('partials/header');
                $this->load->view('pages/error');
                $this->load->view('partials/footer');
            }else{
                $postData = $this->input->post();
                $result = $this->edm->update_member_organization($postData, $id);
                if($result){
                    $arr = array ('success' => 'Successfully updated member organization');
                    $this->session->set_flashdata($arr);
                    redirect('/lgu/members/view/member_organization/'.$mid);
                }else{
                    $arr = array ('error' => 'Unable to update member organization');
                    $this->session->set_flashdata($arr);
                   redirect('/lgu/members/view/member_organization/'.$mid);
                }
            }
        }
    }

    function delete_member_organization(){
        $id = $this->uri->segment(5);
        if(!is_numeric($id)){
            $this->load->view('partials/header');
            $this->load->view('pages/error');
            $this->load->view('partials/footer');
        }else{
            $result = $this->edm->delete_member_organization($id);
            if($result){
                $arr = array ('success' => 'Member organization deleted successfully');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
            else{
                $arr = array ('error' => 'Member organization delete failed');
                $this->session->set_flashdata($arr);
                $this->redirect_back();
            }
        }
    }


}