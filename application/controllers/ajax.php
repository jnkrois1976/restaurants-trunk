<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include 'ChromePhp.php';
/*ChromePhp::log('hello world');
ChromePhp::log($_SERVER);

// using labels
foreach ($_SERVER as $key => $value) {
    ChromePhp::log($key, $value);
}

// warnings and errors
ChromePhp::warn('this is a warning');
ChromePhp::error('this is an error');
 * 
 */


    class Ajax extends CI_Controller {
     
        public function __construct() {
        	parent::__construct(); 
        }

        public function get_counties() {
            $this->load->model('ajax_model');
            $get_counties = $this->ajax_model->get_counties();
            if($get_counties){
                $county_names = array();
                foreach($get_counties as $county_name){
                	array_push($county_names, $county_name->canton);
                }
                echo json_encode($county_names);
            }else{
                return FALSE;
            }
        } // get_counties ends
        
        public function get_districts() {
            $this->load->model('ajax_model');
            $get_districts = $this->ajax_model->get_districts();
            if($get_districts){
                $district_names = array();
                foreach($get_districts as $district_name){
                    array_push($district_names, $district_name->distrito);
                }
                echo json_encode($district_names);
            }else{
                return FALSE;
            }
        } // get_districts ends
        
        public function set_location(){
            $user_loggedin = $this->session->userdata('is_logged_in');
            $user_province = $this->input->post('user_province');
            $user_county = $this->input->post('user_county');
            $user_district = $this->input->post('user_district');
            $user_preference = $this->input->post('user_preference');
            $data = array('user_location_set' => TRUE, 'user_province' => $user_province, 'user_county' => $user_county, 'user_district' => $user_district, 'user_preference' => $user_preference);
            if($user_loggedin){
                if($user_preference == 'temporary'){
                    $this->session->set_userdata($data);
                    echo 'success';
                }elseif($user_preference == 'permanent'){
                    $this->load->model('ajax_model');
                    $update_user_location = $this->ajax_model->update_user_location();
                    if($update_user_location){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }
            }else{
                $this->session->set_userdata($data);
                echo 'success';
            }
        } // set location ends
        
        public function get_ajax_calendar(){
        	$restaurant_id = $this->input->post('rest_id');
            $event_type = $this->input->post('event_type');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $this->load->model('ajax_model');
            $generate_ajax_calendar = $this->ajax_model->generate_ajax_calendar($restaurant_id, $event_type, $year, $month, $day);
            if($generate_ajax_calendar){
                echo $generate_ajax_calendar;
            }
        } // get_calendar ends
        
        public function get_ajax_events(){
            $restaurant_id = $this->input->post('rest_id');
            $event_type = $this->input->post('event_type');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $this->load->model('ajax_model');
            $get_ajax_events = $this->ajax_model->get_ajax_events($restaurant_id, $event_type, $year, $month, $day);
            if($get_ajax_events){
                echo $get_ajax_events;
            }else{
                return FALSE;
            }
        } // get_event ends
        
        public function get_current_event(){
            $this->load->model('ajax_model');
            $get_current_event = $this->ajax_model->get_current_event();
            if($get_current_event){
                //ChromePhp::log(json_encode($get_current_event));
                echo json_encode($get_current_event);
            }else{
                return "FALSE";
            }
        } // get_event ends   

        public function get_matched_restaurants(){
        	$this->load->model('ajax_model');
        	$get_matched_restaurants = $this->ajax_model->get_matched_restaurants();
        	if($get_matched_restaurants){
                echo json_encode($get_matched_restaurants);
            }else{
                return FALSE;
            }
        }
        
        public function get_widget_restaurant(){
        	$this->load->model('ajax_model');
        	$get_widget_restaurant = $this->ajax_model->get_widget_restaurant();
        	if($get_widget_restaurant){
        		echo json_encode($get_widget_restaurant);
        	}else{
        		return FALSE;
        	}
        }
        
        public function request_reservation(){
        	$this->load->model('ajax_model');
        	$request_reservation = $this->ajax_model->request_reservation();
        	if($request_reservation){
        		echo "success";
        	}else{
        		echo "failed";
        	}
        }
        
        public function change_reservation(){
        	$this->load->model('ajax_model');
        	$change_reservation = $this->ajax_model->change_reservation();
        	if($change_reservation){
        		echo "success";
        	}else{
        		echo "failed";
        	}
        }
        
        public function cancel_reservation(){
        	$this->load->model('ajax_model');
        	$cancel_reservation = $this->ajax_model->cancel_reservation();
        	if($cancel_reservation){
        		echo "success";
        	}else{
        		echo "failed";
        	}
        }
        
        public function get_search_restaurants(){
        	$this->load->model('ajax_model');
        	$get_search_restaurants = $this->ajax_model->get_search_restaurants();
        	if($get_search_restaurants){
        		$restaurants = array();
        		foreach($get_search_restaurants as $get_search_restaurants_row){
        			array_push($restaurants, $get_search_restaurants_row);
        		}
        		echo json_encode($restaurants);
        	}else{
        		return FALSE;
        	}
        }
        
        public function create_user_review(){
        	$this->load->model('ajax_model');
        	$create_user_review = $this->ajax_model->create_user_review();
        	if($create_user_review){
        		echo "success";
        	}else{
        		echo "failed";
        	}
        } 
        
     
    } // Ajax ends
?>