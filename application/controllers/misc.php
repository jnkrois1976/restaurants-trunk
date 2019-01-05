<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Misc extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->browser->browser_detect();
        $this->setlang->set_lang();
        $this->restaurants->total_restaurants();
    }
    
    public function user_query(){
        $this->load->model('profile_model');
        $get_user = $this->profile_model->get_user();
        return $get_user;
    }
        
    public function locked_profile(){
        $page['main_content'] = 'misc/locked_profile_view';
        $page_class = "profileLocked";
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    }
    
    public function browser_upgrade(){
        /*$this->load->model('site_model');
        $allmakes = $this->site_model->allmakes();
        $this->load->view('misc/browser_upgrade', array('allmakes' => $allmakes));*/
    }
    
    public function pwd_reset(){
        /*$this->load->model('site_model');
        $allmakes = $this->site_model->allmakes();
        $this->load->view('misc/reset_password', array('allmakes' => $allmakes));*/
    }
    
    public function new_password(){
        /*$this->load->model('site_model');
        $allmakes = $this->site_model->allmakes();
        $this->load->view('misc/new_password', array('allmakes' => $allmakes));*/
    }
    
    public function authenticate_account(){
        /*$this->load->model('site_model');
        $allmakes = $this->site_model->allmakes();
        $authenticate;
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(isset($is_logged_in) || $is_logged_in == true){
            $this->load->model('profile_model');
            $authenticate = $this->profile_model->authenticate();
            $this->load->view('misc/authenticate', array('allmakes' => $allmakes, 'authenticate' => $authenticate));
        }else{
            $authenticate == FALSE;
            $this->load->view('misc/authenticate', array('allmakes' => $allmakes, 'authenticate' => $authenticate));
        }*/
    }
    
}

