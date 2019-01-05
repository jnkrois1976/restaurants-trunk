<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Restaurants {
		
		function total_restaurants(){
			$CI =& get_instance();
	        /*$this->load->model('site_model');
	        $allrows = $this->site_model->all_rows();*/
	        $data = array('total_restaurants' => '985');
	        $CI->session->set_userdata($data);
	    } // total_restaurants ends
		
	} // Restaurants class ends

?>