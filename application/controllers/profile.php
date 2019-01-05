<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->browser->browser_detect();
        $this->setlang->set_lang();
        $this->loggedin->is_logged_in();
        $this->restaurants->total_restaurants();
    }
    
    public function user_query(){
        $this->load->model('profile_model');
        $get_user = $this->profile_model->get_user();
        return $get_user;
    }
	            
    public function new_member(){
        $page['main_content'] = 'profile/new_member_view';
        $page_class = "newMember";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function new member ends
    
    public function dashboard(){
        $page['main_content'] = 'profile/dashboard_view';
        $page_class = "dashboard";
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function dashboard ends
    
    public function user(){
        $page['main_content'] = 'profile/user_view';
        $page_class = "user";
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function user ends
    
    public function reservations(){
    	$page['main_content'] = 'profile/reservations_view';
    	$page_class = "reservation";
    	$this->load->model('profile_model');
    	$get_active_reservations = $this->profile_model->get_active_reservations();
    	$get_past_reservations = $this->profile_model->get_past_reservations();
    	$data = array('page_class' => $page_class, 'user_query' => $this->user_query(), 'get_active_reservations' => $get_active_reservations, 'get_past_reservations' => $get_past_reservations);
    	$this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // reservation ends
    
}

