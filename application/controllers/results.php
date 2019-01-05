<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);

class Results extends CI_Controller {
    
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
    
    public function categories(){
        $page['main_content'] = 'results/categories_view';
        $page_class = "ratings";
        $this->load->model('results_model');
        $get_restaurants = $this->results_model->get_restaurants();
        $count_restaurants = $this->results_model->count_restaurants();
        $this->load->library('pagination');
        $config['base_url'] = base_url()."/".$this->uri->segment(1, 0)."/".$this->uri->segment(2, 0)."/";
        $config['total_rows'] = $count_restaurants;
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = 'Anterior';
        $config['next_link'] = 'Siguiente';
        $this->pagination->initialize($config);
        $data = array('page_class' => $page_class, 'get_restaurants' => $get_restaurants, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function ratings ends
    
    public function events(){
    	$all_restaurants = TRUE;
        $page['main_content'] = 'results/events_view';
        $page_class = "events";
        $this->load->model('calendar_model');
        $this->load->model('profile_model');
        $generate_calendar = $this->calendar_model->generate_calendar($all_restaurants);
        $get_events = $this->calendar_model->get_events($all_restaurants);
        $get_user_reservations = $this->profile_model->get_user_reservations();
        //$parse_events = json_encode($get_events); not sure what this is for
        $count_events = $this->calendar_model->count_events();
        $this->load->library('pagination');
        $config['base_url'] = base_url()."/".$this->uri->segment(1, 0)."/".$this->uri->segment(2, 0)."/";
        $config['total_rows'] = $count_events;
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = 'Anterior';
        $config['next_link'] = 'Siguiente';
        $this->pagination->initialize($config);
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query(), 'generate_calendar' => $generate_calendar, 'get_events' => $get_events, 'get_user_reservations' => $get_user_reservations);
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function events ends
    
    public function specials(){
        $page['main_content'] = 'results/specials_view';
        $page_class = "specials";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function specials ends
    
    public function recommendations(){
        $page['main_content'] = 'results/recommendations_view';
        $page_class = "recommendations";
        //$this->load->model('site_model');
        //$total_ads_count = $this->site_model->total_ads_count();
        //anything else that gets called from here from a model goes into the data array
        $data = array('page_class' => $page_class, 'user_query' => $this->user_query());
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function recommendations ends
    
    public function restaurant(){
    	$all_restaurants = FALSE;
        $page['main_content'] = 'results/restaurant_view';
        $page_class = "restaurant";
        $this->load->model('results_model');
        $this->load->model('profile_model');
        $get_restaurant = $this->results_model->get_restaurant();
        $get_user_ratings = $this->results_model->get_user_ratings();
        $count_user_ratings = $this->results_model->count_user_ratings();
        $count_low_user_ratings = $this->results_model->count_low_user_ratings();
        $count_mid_user_ratings = $this->results_model->count_mid_user_ratings();
        $count_high_user_ratings = $this->results_model->count_high_user_ratings();
        $average_user_ratings = $this->results_model->average_user_ratings();
        $get_user_reservations = $this->profile_model->get_user_reservations();
        $this->load->model('calendar_model');
        $generate_calendar = $this->calendar_model->generate_calendar($all_restaurants);
		$get_events = $this->calendar_model->get_events($all_restaurants);
		$this->load->library('pagination');
		$config['base_url'] = base_url()."/".$this->uri->segment(1, 0)."/".$this->uri->segment(2, 0)."/".$this->uri->segment(3, 0)."/";
		$config['total_rows'] = $count_user_ratings;
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$config['uri_segment'] = 5;
		$config['full_tag_open'] = '<div id="pagination" class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['prev_link'] = 'Anterior';
		$config['next_link'] = 'Siguiente';
		$this->pagination->initialize($config);
        $data = array(
        		'page_class' => $page_class, 
        		'user_query' => $this->user_query(), 
        		'get_restaurant' => $get_restaurant, 
        		'generate_calendar' => $generate_calendar, 
        		'get_events' => $get_events, 
        		'get_user_reservations' => $get_user_reservations, 
        		'get_user_ratings' => $get_user_ratings, 
        		'count_user_ratings' => $count_user_ratings,
        		'count_low_user_ratings' => $count_low_user_ratings,
        		'count_mid_user_ratings' => $count_mid_user_ratings,
        		'count_high_user_ratings' => $count_high_user_ratings,
        		'average_user_ratings' => $average_user_ratings
        		
        );
        $this->load->view('includes/template_view', array('page' => $page, 'data' =>$data));
    } // function restaurant ends

} // class results ends