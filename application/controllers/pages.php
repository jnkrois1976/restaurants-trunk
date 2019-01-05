<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Pages extends CI_Controller {
    
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

    public function newsletter(){
        $page['main_content'] = 'pages/newsletter_view';
        $page_class = "newsletter";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function newsletter ends
    
    public function private_events(){
        $page['main_content'] = 'pages/private_events_view';
        $page_class = "privateEvents";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function private_events ends
    
    public function comments(){
        $page['main_content'] = 'pages/comments_view';
        $page_class = "comments";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function comments ends
    
    public function create(){
        $page['main_content'] = 'pages/create_view';
        $page_class = "create";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function create ends
    
    public function advertise(){
        $page['main_content'] = 'pages/advertise_view';
        $page_class = "advertise";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function advertise ends
    
    public function events(){
        $page['main_content'] = 'pages/events_view';
        $page_class = "events";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function events ends
    
    public function other_services(){
        $page['main_content'] = 'pages/other_services_view';
        $page_class = "otherServices";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function other services ends
    
    public function about(){
        $page['main_content'] = 'pages/about_view';
        $page_class = "about";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function about ends
    
    public function terms(){
        $page['main_content'] = 'pages/terms_view';
        $page_class = "terms";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function terms ends
    
    public function privacy(){
        $page['main_content'] = 'pages/privacy_view';
        $page_class = "privacy";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function privacy ends
    
    public function contact(){
        $page['main_content'] = 'pages/contact_view';
        $page_class = "contact";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function contact ends
    
    
    
} // class page ends