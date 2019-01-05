<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Site extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->browser->browser_detect();
        $this->setlang->set_lang();
        $this->restaurants->total_restaurants();
    }
        
    public function lang(){
        $choosen_lang = $this->uri->segment(3);
        if($choosen_lang == "es"){
            $data = array('lang' => $choosen_lang);
            $this->session->set_userdata($data);
            $this->lang->load('spanish', 'spanish');
            redirect($this->agent->referrer());
        }elseif(!$current_lang){
            $data = array('lang' => $choosen_lang);
            $this->session->set_userdata($data);
            $this->lang->load('english', 'english');
            redirect($this->agent->referrer());
        }
    }
    
    public function user_query(){
        $this->load->model('profile_model');
        $get_user = $this->profile_model->get_user();
        return $get_user;
    }
        
    public function index(){
        $page['main_content'] = 'site_view';
        $page_class = "homePage";
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
        //$this->load->view('misc/landing_view'); // apply the landing page to the site
    } // function index ends
    
    public function reservations(){
        $this->set_lang();
        $page['main_content'] = 'reservations_view';
        $page_class = "reservations";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' => $data));
        //$this->load->view('misc/landing_view'); // apply the landing page to the site
    } // function reservations ends
    
    function log_out(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
} // class site ends